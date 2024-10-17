<?php

declare(strict_types=1);

namespace Libsql\Tests;

use PHPUnit\Framework\TestCase;
use Libsql\Database;
use Libsql\Blob;

final class Test extends TestCase
{
    public function testSelect1(): void
    {
        $db = new Database();
        $conn = $db->connect();

        $this->assertSame($conn->query('select 1')->next()->get(0), 1);
    }

    public function testBatch(): void
    {
        $db = new Database();
        $conn = $db->connect();

        $conn->executeBatch("
            create table test (i integer);
            insert into test values (1);
            insert into test values (2);
            insert into test values (3);
        ");

        $this->assertSame($conn->query("select * from test")->fetchArray(), [
            [ "i" => 1 ],
            [ "i" => 2 ],
            [ "i" => 3 ],
        ]);

    }

    public function testSelectAll(): void
    {
        $db = new Database();
        $conn = $db->connect();

        $conn->execute('create table test (i integer, r real, t text)');

        $max = 100;

        foreach (range(0, $max - 1) as $i) {
            $stmt = $conn->prepare('insert into test values (:a, :b, :c)');
            $stmt->bind([
                ":a" => $i,
                ":b" => exp($i / 10),
                ":c" => strval(exp($i / 10))
            ]);
            $stmt->execute();
        }

        foreach ($conn->query('select * from test') as $i => $row) {
            $this->assertSame($row->get(0), $i);
            $this->assertSame($row->get(1), exp($i / 10));
            $this->assertSame($row->get(2), strval(exp($i / 10)));
        }
    }

    public function testNull(): void
    {
        $db = new Database();
        $conn = $db->connect();

        $rows = $conn->query('select ?, ?', [1, null]);
        $row = $rows->next();

        $this->assertSame(1, $row->get(0));
        $this->assertSame(null, $row->get(1));

        $rows = $conn->query('select :a, :b', [":a" => 1, ":b" => null]);
        $row = $rows->next();

        $this->assertSame(1, $row->get(0));
        $this->assertSame(null, $row->get(1));

        $rows = $conn->query('select :a, :b', [":a" => null, ":b" => null]);
        $row = $rows->next();

        $this->assertSame(null, $row->get(0));
        $this->assertSame(null, $row->get(1));
    }

    public function testEmbeddedReplica(): void
    {
        $db = new Database(
            path: 'test.db',
            url: getenv('TURSO_URL'),
            authToken: getenv('TURSO_AUTH_TOKEN'),
            syncInterval: 100,
        );
        $conn = $db->connect();

        $conn->execute('drop table if exists test');
        $conn->execute('create table test (i integer, r real, t text)');

        $max = 20;

        foreach (range(0, $max - 1) as $i) {
            $stmt = $conn->prepare('insert into test values (:a, :b, :c)');
            $stmt->bind([
                ":a" => $i,
                ":b" => exp($i / 10),
                ":c" => strval(exp($i / 10))
            ]);
            $stmt->execute();
        }

        foreach ($conn->query('select * from test') as $i => $row) {
            $this->assertSame($row->i, $i);
            $this->assertSame($row->r, exp($i / 10));
            $this->assertSame($row->t, strval(exp($i / 10)));
        }
    }

    public function testBlob(): void
    {
        $db = new Database();
        $conn = $db->connect();

        $result = $conn->query('select ?', [new Blob("\0\1\2")])->fetchArray();
        $this->assertEquals(new Blob("\0\1\2"), $result[0]["?"]);
    }

    public function testTransactions(): void
    {
        $db = new Database(
            path: 'test.db',
            url: getenv('TURSO_URL'),
            authToken: getenv('TURSO_AUTH_TOKEN'),
            syncInterval: 100,
        );
        $conn = $db->connect();

        $conn->execute('create table if not exists test_transaction(i integer)');

        $tx = $conn->transaction();
        $tx->execute('insert into test_transaction values (?)', [1]);
        $tx->execute('insert into test_transaction values (?)', [2]);
        $tx->execute('insert into test_transaction values (?)', [3]);
        $tx->rollback();

        $this->assertEquals($conn->query('select * from test_transaction')->next(), null);
    }
}
