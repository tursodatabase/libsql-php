<?php

require __DIR__ . "/vendor/autoload.php";

use Libsql\Database;

$db = new Database(":memory:");
$conn = $db->connect();

$conn->executeBatch("
    create table users(id integer primary key autoincrement, name text);
    insert into users (name) values ('Iku Turso');
");

$forenames = ["John", "Mary", "Alice", "Mark"];
$surnames = ["Doe", "Smith", "Jones", "Taylor"];

foreach ($forenames as $forename) {
    foreach ($surnames as $surname) {
        $conn->execute(
            "insert into users (name) values (?)",
            ["$forename $surname"]
        );
    }
}

foreach ($conn->query("select * from users", [1]) as $row) {
    echo "$row->id $row->name\n";
}

