<?php
namespace LeoGalleguillos\BusinessTest\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    protected function setUp()
    {
        $this->taskTableMock = $this->createMock(
            BusinessTable\Task::class
        );
        $this->createService = new BusinessService\Task\Create(
            $this->taskTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Task\Create::class,
            $this->createService
        );
    }

    public function testCreate()
    {
        $this->taskTableMock->method('insert')->willReturn(456);

        $businessEntity = new BusinessEntity\Business();
        $businessEntity->setBusinessId(123);

        $this->assertSame(
            456,
            $this->createService->create(
                $businessEntity,
                'summary',
                'description'
            )
        );
    }
}
