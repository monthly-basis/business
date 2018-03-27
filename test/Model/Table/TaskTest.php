<?php
namespace LeoGalleguillos\BusinessTest\Model\Table;

use Generator;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\BusinessTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class TaskTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/task/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);
        $this->taskTable = new BusinessTable\Task($this->adapter);

        $this->dropTable();
        $this->createTable();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessTable\Task::class,
            $this->taskTable
        );
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
