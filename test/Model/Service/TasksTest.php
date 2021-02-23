<?php
namespace MonthlyBasis\BusinessTest\Model\Service;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Service as BusinessService;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use PHPUnit\Framework\TestCase;

class TasksTest extends TestCase
{
    protected function setUp(): void
    {
        $this->taskFactoryMock = $this->createMock(
            BusinessFactory\Task::class
        );
        $this->taskTableMock = $this->createMock(
            BusinessTable\Task::class
        );
        $this->tasksService = new BusinessService\Tasks(
            $this->taskFactoryMock,
            $this->taskTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Tasks::class,
            $this->tasksService
        );
    }

    public function testGet()
    {
        $this->taskTableMock->method('selectWhereBusinessId')->willReturn(
            $this->yieldArrays()
        );
        $businessEntity = new BusinessEntity\Business();
        $businessEntity->setBusinessId(123);

        foreach ($this->tasksService->get($businessEntity) as $taskEntity) {
            $this->assertInstanceOf(
                BusinessEntity\Task::class,
                $taskEntity
            );
        }
    }

    public function yieldArrays()
    {
        yield [];
        yield [];
    }
}
