<?php

declare(strict_types=1);

namespace Libsql\Tests;

use PHPUnit\Framework\TestCase;
use Libsql\Libsql;

final class Test extends TestCase
{
    public function testSelect1(): void
    {
        $libsql = new Libsql();
        $db = $libsql->openLocal(path: ":memory:");
        $conn = $db->connect();

        $this->assertSame($conn->query('select 1')->next()->get(0), 1);
    }

    public function testBatch(): void
    {
        $libsql = new Libsql();
        $db = $libsql->openLocal(path: ":memory:");
        $conn = $db->connect();

        $conn->execute_batch("
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
        $libsql = new Libsql();
        $db = $libsql->openLocal(path: ":memory:");
        $conn = $db->connect();

        $conn->execute('create table test (i integer, r real, t text)');

        $max = 100;

        for ($i = 0; $i < $max; $i++) {
            $stmt = $conn->prepare('insert into test values (:a, :b, :c)');
            $stmt->bind([
                ":a" => $i,
                ":b" => exp($i / 10),
                ":c" => strval(exp($i / 10))
            ]);
            $stmt->execute();
        }

        $rows = $conn->query('select * from test');

        $i = 0;
        foreach ($rows->iterator() as $row) {
            $this->assertSame($row->get(0), $i);
            $this->assertSame($row->get(1), exp($i / 10));
            $this->assertSame($row->get(2), strval(exp($i / 10)));
            $i++;
        }
    }
}
