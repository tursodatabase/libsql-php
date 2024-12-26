<?php

declare(strict_types=1);

namespace Libsql;

use FFI\CData;

class Database
{
    protected CData $inner;

    /**
     * Open a database.
     *
     * @param ?string $path Path to the database file (default: null)
     * @param ?string $url Url of the primary (default: null)
     * @param ?string $authToken Auth token (default: null)
     * @param ?string $encryptionKey Key used to de/encrypt the database (default: null)
     * @param int $syncInterval Interval used to sync frames periodicaly with primary (default: 0, sync manually)
     * @param bool $readYourWrites Make writes visible within a sync period (default: true)
     * @param bool $webpki Use Webpki (default: false)
     */
    public function __construct(
        string $path = null,
        string $url = null,
        #[\SensitiveParameter]
        string $authToken = null,
        #[\SensitiveParameter]
        ?string $encryptionKey = null,
        int $syncInterval = 0,
        bool $readYourWrites = true,
        bool $webpki = false,
    ) {
        $ffi = getFFI();

        $boxed = [
            'path' => new CharBox($path),
            'url' => new CharBox($url),
            'authToken' => new CharBox($authToken),
            'encryptionKey' => new CharBox($encryptionKey),
        ];

        $desc = $ffi->new('libsql_database_desc_t');
        $desc->path = $boxed['path']->ptr;
        $desc->url = $boxed['url']->ptr;
        $desc->auth_token = $boxed['authToken']->ptr;
        $desc->encryption_key = $boxed['encryptionKey']->ptr;
        $desc->webpki = $webpki;
        $desc->disable_read_your_writes = !$readYourWrites;

        $db = $ffi->libsql_database_init($desc);

        try {
            errIf($db->err);
        } finally {
            foreach ($boxed as $box) {
                $box->destroy();
            }
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
        getFFI()->libsql_database_deinit($this->inner);
    }

    /**
     * Create connection to libSQL database.
     *
     * @return Connection
     */
    public function connect(): Connection
    {
        $conn = getFFI()->libsql_database_connect($this->inner);
        errIf($conn->err);

        return new Connection($conn);
    }

    /**
     * Sync frames with the primary.
     *
     * @return void
     */
    public function sync(): void
    {
        $sync = getFFI()->libsql_database_sync($this->inner);
        errIf($sync->err);
    }
}
