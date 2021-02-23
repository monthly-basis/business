<?php
namespace LeoGalleguillos\BusinessTest\Model\Entity;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use PHPUnit\Framework\TestCase;

class NewestTest extends TestCase
{
    protected function setUp(): void
    {
        $this->businessFactoryMock = $this->createMock(
            BusinessFactory\Business::class
        );
        $this->businessTableMock = $this->createMock(
            BusinessTable\Business::class
        );
        $this->newestService = new BusinessService\Newest(
            $this->businessFactoryMock,
            $this->businessTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Newest::class,
            $this->newestService
        );
    }

    public function testGetNewest()
    {
        $this->businessTableMock->method('selectOrderByCreatedDesc')->willReturn(
            $this->yieldArrays()
        );
        foreach ($this->newestService->getNewest() as $businessEntity) {
            $this->assertInstanceOf(
                BusinessEntity\Business::class,
                $businessEntity
            );
        }
    }

    public function yieldArrays()
    {
        yield [];
        yield [];
    }
}
