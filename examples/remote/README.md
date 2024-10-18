# Remote

This example demonstrates how to use libSQL with a remote database.

## Install Dependencies

```bash
composer install
```

## Running

Execute the example:

```bash
TURSO_DATABASE_URL="..." TURSO_AUTH_TOKEN="..." php index.php
```

This will connect to a remote SQLite database, insert some data, and then query the results.
