<p align="center">
  <a href="https://tur.so/turso-php">
    <picture>
      <img src="/.github/cover.png" alt="libSQL PHP" />
    </picture>
  </a>
  <h1 align="center">libSQL PHP</h1>
</p>

<p align="center">
  Databases for PHP multi-tenant AI Apps.
</p>

<p align="center">
  <a href="https://tur.so/turso-php"><strong>Turso</strong></a> ·
  <a href="https://docs.turso.tech"><strong>Docs</strong></a> ·
  <a href="https://docs.turso.tech/sdk/php/quickstart"><strong>Quickstart</strong></a> ·
  <a href="https://docs.turso.tech/sdk/php/reference"><strong>SDK Reference</strong></a> ·
  <a href="https://turso.tech/blog"><strong>Blog &amp; Tutorials</strong></a>
</p>

<p align="center">
  <a href="LICENSE">
    <picture>
      <img src="https://img.shields.io/github/license/tursodatabase/libsql-php?color=0F624B" alt="MIT License" />
    </picture>
  </a>
  <a href="https://tur.so/discord-php">
    <picture>
      <img src="https://img.shields.io/discord/933071162680958986?color=0F624B" alt="Discord" />
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

> [!WARNING]
> This SDK is currently in technical preview. <a href="https://tur.so/discord-php">Join us in Discord</a> to report any issues.

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
    path: 'local.db',
    url: getenv('TURSO_DATABASE_URL'),
    authToken: getenv('TURSO_AUTH_TOKEN'),
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

$conn->executeBatch($createUsers);

$conn->query("SELECT * FROM users WHERE id = ?", [1])->fetchArray();
```

## Documentation

Visit our [official documentation](https://docs.turso.tech/sdk/php).

## Support

Join us [on Discord](https://tur.so/discord-php) to get help using this SDK. Report security issues [via email](mailto:security@turso.tech).

## Contributors

See the [contributing guide](CONTRIBUTING.md) to learn how to get involved.

![Contributors](https://contrib.nn.ci/api?repo=tursodatabase/libsql-php)

<a href="https://github.com/tursodatabase/libsql-php/issues?q=is%3Aopen+is%3Aissue+label%3A%22good+first+issue%22">
  <picture>
    <img src="https://img.shields.io/github/issues-search/tursodatabase/libsql-php?label=good%20first%20issue&query=label%3A%22good%20first%20issue%22%20&color=0F624B" alt="good first issue" />
  </picture>
</a>
