<?php
namespace MonthlyBasis\BusinessTest\Model\Table;

use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\LaminasTest\TableTestCase;

class TaskStatusTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->dropAndCreateTable('task_status');
        $this->taskStatusTable = new BusinessTable\TaskStatus($this->getAdapter());
    }

    public function testSelectWhereTaskStatusId()
    {
        $this->taskStatusTable->insert(
            'Open'
        );
        $this->taskStatusTable->insert(
            'In Progress'
        );

        $array = $this->taskStatusTable->selectWhereTaskStatusId(1);
        $this->assertSame(
            '1',
            $array['task_status_id']
        );
        $this->assertSame(
            'Open',
            $array['name']
        );

        $array = $this->taskStatusTable->selectWhereTaskStatusId(2);
        $this->assertSame(
            '2',
            $array['task_status_id']
        );
        $this->assertSame(
            'In Progress',
            $array['name']
        );
    }
}
