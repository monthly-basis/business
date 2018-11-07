<?php
namespace LeoGalleguillos\BusinessTest\Model\Factory;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
    {
        $this->businessTableMock = $this->createMock(
            BusinessTable\Business::class
        );
        $this->businessFactory = new BusinessFactory\Business(
            $this->businessTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessFactory\Business::class,
            $this->businessFactory
        );
    }

    public function testBuildFromArray()
    {
        $array = [
            'business_id' => '1',
            'user_id'     => '123',
            'name'        => 'name',
            'description' => 'description',
            'website'     => 'website',
            'views'       => '0',
            'created'     => '2018-02-26 16:21:19',
        ];

        $businessEntity = new BusinessEntity\Business();
        $businessEntity->setBusinessId($array['business_id'])
                       ->setCreated(new DateTime($array['created']))
                       ->setDescription($array['description'])
                       ->setName($array['name'])
                       ->setUserId($array['user_id'])
                       ->setWebsite($array['website']);

        $this->assertEquals(
            $businessEntity,
            $this->businessFactory->buildFromArray($array)
        );
    }
}
