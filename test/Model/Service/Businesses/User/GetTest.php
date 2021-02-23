<?php
namespace LeoGalleguillos\BusinessTest\Model\Entity\Businesses\User;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use MonthlyBasis\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
    protected function setUp(): void
    {
        $this->businessFactoryMock = $this->createMock(
            BusinessFactory\Business::class
        );
        $this->businessTableMock = $this->createMock(
            BusinessTable\Business::class
        );
        $this->getUserBusinessesService = new BusinessService\Businesses\User\Get(
            $this->businessFactoryMock,
            $this->businessTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Businesses\User\Get::class,
            $this->getUserBusinessesService
        );
    }

    public function testGetNewest()
    {
        $userEntity = new UserEntity\User();
        $userEntity->setUserId(123);
        $this->businessTableMock->method('selectWhereUserId')->willReturn(
            $this->yieldArrays()
        );
        foreach ($this->getUserBusinessesService->get($userEntity) as $businessEntity) {
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
