<?php
require __DIR__ . '/vendor/autoload.php';

use Libsql\Database;

$db = new Database(
    path: 'local.db',
    url: getenv('TURSO_DATABASE_URL'),
    authToken: getenv('TURSO_AUTH_TOKEN'),
    syncInterval: 1000
);

$conn = $db->connect();

$createUsers = "
  CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, email TEXT);
  INSERT INTO users (email) VALUES ('first@example.com');
  INSERT INTO users (email) VALUES ('second@example.com');
  INSERT INTO users (email) VALUES ('third@example.com');
";

$conn->executeBatch($createUsers);

foreach ($conn->query("select * from users", [1]) as $row) {
    echo "$row->id - $row->email\n";
}
