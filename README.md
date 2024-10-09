<p align="center">
  <img src="/.github/cover.png" alt="libSQL PHP" />
  <h1 align="center">libSQL PHP</h1>
</p>

<p align="center">
  Databases for PHP multi-tenant AI Apps.
</p>

<p align="center">
  <a href="https://turso.tech"><strong>Turso</strong></a> ·
  <a href="https://docs.turso.tech"><strong>Docs</strong></a> ·
  <a href="https://docs.turso.tech/sdk/php/quickstart"><strong>Quickstart</strong></a> ·
  <a href="https://docs.turso.tech/sdk/php/reference"><strong>SDK Reference</strong></a> ·
  <a href="https://blog.turso.tech/"><strong>Blog &amp; Tutorials</strong></a>
</p>

<p align="center">
  <a href="LICENSE">
    <picture>
      <img src="https://img.shields.io/github/license/tursodatabase/libsql-php?color=0F624B" alt="MIT License" />
    </picture>
  </a>
  <a href="https://tur.so/discord-php">
    <picture>
      <img src="https://img.shields.io/discord/4B5D7hYwub?color=0F624B" alt="Discord" />
    </picture>
  </a>
  <a href="#contributors">
    <picture>
      <img src="https://img.shields.io/github/contributors/tursodatabase/libsql-php?color=0F624B" alt="Contributors" />
    </picture>
  </a>
  <a href="https://packagist.org/packages/turso/libsql">
    <picture>
      <img src="https://img.shields.io/packagist/dt/turso/libsql?color=0F624B" alt="Total downloads" />
    </picture>
  </a>
  <a href="/examples">
    <picture>
      <img src="https://img.shields.io/badge/browse-examples-0F624B" alt="Examples" />
    </picture>
  </a>
</p>

## Features

- 🔌 Works offline with [Embedded Replicas](https://docs.turso.tech/features/embedded-replicas/introduction)
- 🌎 Works with remote Turso databases
- ✨ Works with Turso [AI & Vector Search](https://docs.turso.tech/features/ai-and-embeddings)
- 🐘 Works PHP PDO

## Install

```bash
composer require turso/libsql
```

## Quickstart

The example below uses Embedded Replicas and syncs data every 1000ms from Turso.

```php
<?php

use Libsql\Database;

$db = new Database(
    path: 'test.db',
    url: getenv('TURSO_URL'),
    authToken: getenv('TURSO_AUTH_TOKEN')
    syncInterval: 1000
);

$conn = $db->connect();

$createUsers = "
  CREATE TABLE IF NOT EXISTS users (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      name TEXT
  );
  INSERT INTO users (name) VALUES ('Iku');
";

$db->executeBatch($createUsers);

$db->query("SELECT * FROM users WHERE id = ?", [1])->fetchArray();
```

## Documentation

Visit our [official documentation](https://docs.turso.tech/sdk/php). Security related bugs can be [reported via email](mailto:security@turso.tech).

## Support

Join us [on Discord](https://tur.so/discord-php) to get help using this SDK.

## Contributing
