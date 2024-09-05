<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Turso\Libsql\Libsql;

final class Test extends TestCase
{
    public function testSelect1(): void {
        $libsql = new Libsql();
        $db = $libsql->openLocal(path: ":memory:");
        $conn = $db->connect();

        $this->assertSame($conn->query('select 1')->next()->getInt(0), 1);
    }

    public function testSelectAll(): void {
        $libsql = new Libsql();
        $db = $libsql->openLocal(path: ":memory:");
        $conn = $db->connect();

        $conn->execute('create table test (i integer, r real, t text)');

        $max = 1000;

        for ($i = 0; $i < $max; $i++) {
            $stmt = $conn->prepare('insert into test values (?, ?, ?)');
            $stmt->bind($i, exp($i), strval($i));
            $stmt->execute();
        }

        $rows = $conn->query('select * from test');

        $i = 0;
        foreach ($rows->iterator() as $row) {
            $this->assertSame($row->get(0), $i);
            $this->assertSame($row->get(1), exp($i));
            $this->assertSame($row->get(2), strval($i));
            $i++;
        }
    }
}

