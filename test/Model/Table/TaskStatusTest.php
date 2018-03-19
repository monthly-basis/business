<?php
namespace LeoGalleguillos\BusinessTest\Model\Table;

use Generator;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\BusinessTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class TaskStatusTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/task/';

    protected function setUp()
    {
        $configArray     = require($_SERVER['PWD'] . '/config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);
        $this->taskStatusTable = new BusinessTable\TaskStatus($this->adapter);

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
            BusinessTable\TaskStatus::class,
            $this->taskStatusTable
        );
    }
}