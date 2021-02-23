<?php
namespace MonthlyBasis\BusinessTest\Model\Entity;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Service as BusinessService;
use MonthlyBasis\Business\Model\Table as BusinessTable;
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
