<?php
require __DIR__ . '/vendor/autoload.php';

use Libsql\Database;

$db = new Database(":memory:");

$conn = $db->connect();

$createUsers = "
  CREATE TABLE users (id INTEGER PRIMARY KEY, email TEXT);
  INSERT INTO users VALUES (1, 'first@example.com');
  INSERT INTO users VALUES (2, 'second@example.com');
  INSERT INTO users VALUES (3, 'third@example.com');
";

$conn->executeBatch($createUsers);

foreach ($conn->query("select * from users", [1]) as $row) {
    echo "$row->id - $row->email\n";
}

