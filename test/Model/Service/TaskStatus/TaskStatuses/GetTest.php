<?php
namespace LeoGalleguillos\BusinessTest\Model\Service\TaskStatus\TaskStatuses;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
    protected function setUp(): void
    {
        $this->taskStatusFactoryMock = $this->createMock(
            BusinessFactory\TaskStatus::class
        );
        $this->taskStatusTableMock = $this->createMock(
            BusinessTable\TaskStatus::class
        );
        $this->getService = new BusinessService\TaskStatus\TaskStatuses\Get(
            $this->taskStatusFactoryMock,
            $this->taskStatusTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\TaskStatus\TaskStatuses\Get::class,
            $this->getService
        );
    }
}
