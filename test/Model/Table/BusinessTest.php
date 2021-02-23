<?php
namespace LeoGalleguillos\BusinessTest\Model\Table;

use Generator;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use MonthlyBasis\LaminasTest\TableTestCase;

class BusinessTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->businessTable = new BusinessTable\Business($this->getAdapter());

        $this->dropTable('business');
        $this->createTable('business');
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
            'description',
            'website'
        );

        $this->businessTable->insert(
            456,
            'name',
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

    public function testSelectCountWhereUserId()
    {
        $this->assertSame(
            0,
            $this->businessTable->selectCountWhereUserId(123)
        );

        $this->businessTable->insert(
            123,
            'name',
            'description',
            'website'
        );
        $this->businessTable->insert(
            123,
            'name2',
            'description2',
            'website2'
        );
        $this->assertSame(
            2,
            $this->businessTable->selectCountWhereUserId(123)
        );
    }

    public function testSelectWhereBusinessId()
    {
        $this->businessTable->insert(
            123,
            'name',
            'description',
            'website'
        );
        $array = [
            'business_id' => '1',
            'user_id' => '123',
            'name' => 'name',
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

    public function testSelectWhereUserId()
    {
        $this->businessTable->insert(
            123,
            'name',
            'description',
            'website'
        );
        $this->businessTable->insert(
            123,
            'name2',
            'description2',
            'website2'
        );

        $generator = $this->businessTable->selectWhereUserId(123);
        $this->assertInstanceOf(
            Generator::class,
            $generator
        );

        $array = $generator->current();
        $this->assertSame(
            '1',
            $array['business_id']
        );
        $generator->next();
        $array = $generator->current();
        $this->assertSame(
            '2',
            $array['business_id']
        );
        $generator->next();
        $this->assertNull(
            $generator->current()
        );
    }
}
