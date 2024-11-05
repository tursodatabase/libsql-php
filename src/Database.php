<?php

declare(strict_types=1);

namespace Libsql;

use ffi\libsql_config_t;
use ffi\libsql_database_desc_t;
use ffi\libsql_database_t;
use ffi\string_;

class Database
{
    protected libsql_database_t $inner;

    /**
     * Open a database.
     *
     * @param ?string $path           Path to the database file (default: null)
     * @param ?string $url            Url of the primary (default: null)
     * @param ?string $authToken      Auth token (default: null)
     * @param ?string $encryptionKey  Key used to de/encrypt the database (default: null)
     * @param int     $syncInterval   Interval used to sync frames periodicaly with primary (default: 0, sync manually)
     * @param bool    $readYourWrites Make writes visible within a sync period (default: true)
     * @param bool    $webpki         Use Webpki (default: false)
     */
    public function __construct(
        ?string $path = null,
        ?string $url = null,
        #[\SensitiveParameter]
        ?string $authToken = null,
        #[\SensitiveParameter]
        ?string $encryptionKey = null,
        int $syncInterval = 0,
        bool $readYourWrites = true,
        bool $webpki = false,
    ) {
        $unsafes = [];
        $config = newCType(libsql_config_t::class);
        $unsafes[] = $config->version = string_::persistentZero('php-libsql');
        libsqlFFI()->libsql_setup($config);
        $desc = newCType(libsql_database_desc_t::class);
        if ($path) {
            $unsafes[] = $desc->path = string_::persistentZero($path);
        }
        if ($url) {
            $unsafes[] = $desc->url = string_::persistentZero($url);
        }
        if ($authToken) {
            $unsafes[] = $desc->auth_token = string_::persistentZero($authToken);
        }
        if ($encryptionKey) {
            $unsafes[] = $desc->encryption_key = string_::persistentZero($encryptionKey);
        }
        $desc->sync_interval = $syncInterval;
        $desc->webpki = (int) $webpki;
        $desc->disable_read_your_writes = (int) !$readYourWrites;

        $db = libsqlFFI()->libsql_database_init($desc);
        try {
            errorIf($db->err);
        } finally {
            freeUnsafe($unsafes);
        }

        $this->inner = $db;
    }

    /**
     * @internal
     *
     * @return void
     */
    public function __destruct()
    {
        libsqlFFI()->libsql_database_deinit($this->inner);
    }

    /**
     * Create connection to libSQL database.
     */
    public function connect(): Connection
    {
        $conn = libsqlFFI()->libsql_database_connect($this->inner);
        errorIf($conn->err);

        return new Connection($conn);
    }

    /**
     * Sync frames with the primary.
     */
    public function sync(): void
    {
        $sync = libsqlFFI()->libsql_database_sync($this->inner);
        errorIf($sync->err);
    }
}
