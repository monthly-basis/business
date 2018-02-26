<?php
namespace LeoGalleguillos\BusinessTest\Model\Table;

use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\BusinessTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class BusinessTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/business/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);
        $this->businessTable = new BusinessTable\Business($this->adapter);

        //$this->dropTable();
        //$this->createTable();
    }

    /**
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
    */

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessTable\Business::class,
            $this->businessTable
        );
    }
}
