<?php
namespace LeoGalleguillos\BusinessTest\Model\Entity;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use PHPUnit\Framework\TestCase;

class BusinessTest extends TestCase
{
    protected function setUp()
    {
        $this->businessEntity = new BusinessEntity\Business();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessEntity\Business::class,
            $this->businessEntity
        );
    }

    public function testGettersAndSetters()
    {
        $userId = 123;
        $this->assertSame(
            $this->businessEntity,
            $this->businessEntity->setUserId($userId)
        );
        $this->assertSame(
            $userId,
            $this->businessEntity->getUserId()
        );

        $created = new DateTime();
        $this->assertSame(
            $this->businessEntity,
            $this->businessEntity->setCreated($created)
        );
        $this->assertSame(
            $created,
            $this->businessEntity->getCreated()
        );

        $website = 'https://www.example.com/';
        $this->assertSame(
            $this->businessEntity,
            $this->businessEntity->setWebsite($website)
        );
        $this->assertSame(
            $website,
            $this->businessEntity->getWebsite()
        );
    }
}
