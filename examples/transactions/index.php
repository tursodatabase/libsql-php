<?php

require __DIR__ . "/vendor/autoload.php";

use Libsql\Database;

$db = new Database(path: ':memory:');
$conn = $db->connect();

$conn->executeBatch("
    CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT);
    INSERT INTO users (name) VALUES ('First Iku Turso');
");

$tx = $conn->transaction();

$fullnames=["John Doe", "Mary Smith", "Alice Jones", "Mark Taylor"];

foreach ($fullnames as $fullname) {
    $tx->execute(
        "insert into users (name) values (?)",
        ["$fullname"]
    );
}

$tx->rollback(); // Discards all inserts

$conn->executeBatch("
    insert into users (name) values ('Second Iku Turso');
");

// Only returns "First Iku turso" and "Second Iku Turso" since the transaction was rollbacked.
foreach ($conn->query("select * from users", [1]) as $row) {
    echo "$row->id $row->name\n";
}

