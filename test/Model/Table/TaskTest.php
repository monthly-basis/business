<?php
namespace MonthlyBasis\BusinessTest\Model\Table;

use Generator;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\LaminasTest\TableTestCase;

class TaskTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->dropAndCreateTable('task');

        $this->taskTable = new BusinessTable\Task($this->getAdapter());
    }

    public function testInsert()
    {
        $this->taskTable->insert(
            123,
            456,
            'summary',
            'description'
        );

        $this->taskTable->insert(
            456,
            789,
            'summary',
            'description'
        );

        $this->assertSame(
            2,
            $this->taskTable->selectCount()
        );
    }

    public function testSelectCount()
    {
        $this->assertSame(
            0,
            $this->taskTable->selectCount()
        );
    }

    public function testSelectCountWhereBusinessId()
    {
        $this->assertSame(
            0,
            $this->taskTable->selectCountWhereBusinessId(123)
        );
        $this->taskTable->insert(
            123,
            456,
            'summary1',
            'description1'
        );
        $this->assertSame(
            1,
            $this->taskTable->selectCountWhereBusinessId(123)
        );
        $this->taskTable->insert(
            123,
            456,
            'summary1',
            'description1'
        );
        $this->assertSame(
            2,
            $this->taskTable->selectCountWhereBusinessId(123)
        );
        $this->taskTable->insert(
            456,
            789,
            'summary1',
            'description1'
        );
        $this->assertSame(
            2,
            $this->taskTable->selectCountWhereBusinessId(123)
        );
    }

    public function testSelectWhereBusinessId()
    {
        $this->taskTable->insert(
            123,
            456,
            'summary1',
            'description1'
        );
        $this->taskTable->insert(
            456,
            789,
            'summary2',
            'description2'
        );
        $this->taskTable->insert(
            123,
            456,
            'summary3',
            'description3'
        );

        $generator = $this->taskTable->selectWhereBusinessId(123);
        $this->assertInstanceOf(
            Generator::class,
            $generator
        );

        $this->assertSame(
            'summary3',
            $generator->current()['summary']
        );

        $generator->next();
        $this->assertSame(
            'summary1',
            $generator->current()['summary']
        );
    }

    public function testSelectWhereTaskId()
    {
        $this->taskTable->insert(
            123,
            456,
            'summary1',
            'description1'
        );
        $this->assertSame(
            '1',
            $result = $this->taskTable->selectWhereTaskId(1)['task_id']
        );
        $this->assertSame(
            'summary1',
            $result = $this->taskTable->selectWhereTaskId(1)['summary']
        );
    }
}
