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
            BusinessTable\Business::class,
            $this->businessTable
        );
    }

    public function testInsert()
    {
        $this->businessTable->insert(
            123,
            'name',
            'slug',
            'description',
            'website'
        );

        $this->businessTable->insert(
            456,
            'name',
            'slug',
            'description',
            'website'
        );

        $this->assertSame(
            2,
            $this->businessTable->selectCount()
        );
    }

    public function testSelectCount()
    {
        $this->assertSame(
            0,
            $this->businessTable->selectCount()
        );
    }

    public function testSelectWhereBusinessId()
    {
        $this->businessTable->insert(
            123,
            'name',
            'slug',
            'description',
            'website'
        );
        $array = [
            'business_id' => '1',
            'user_id' => '123',
            'name' => 'name',
            'slug' => 'slug',
            'description' => 'description',
            'website' => 'website',
            'views' => '0',
            'created' => '2018-02-26 16:21:19',
        ];

        $this->assertSame(
            $array['business_id'],
            $this->businessTable->selectWhereBusinessId(1)['business_id']
        );
        $this->assertSame(
            $array['user_id'],
            $this->businessTable->selectWhereBusinessId(1)['user_id']
        );
        $this->assertSame(
            $array['name'],
            $this->businessTable->selectWhereBusinessId(1)['name']
        );
        $this->assertSame(
            $array['views'],
            $this->businessTable->selectWhereBusinessId(1)['views']
        );
    }
}
