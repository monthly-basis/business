<?php
namespace MonthlyBasis\BusinessTest\Model\Factory;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\Flash\Model\Service as FlashService;
use PHPUnit\Framework\TestCase;

class TaskStatusTest extends TestCase
{
    protected function setUp(): void
    {
        $this->taskStatusTableMock = $this->createMock(
            BusinessTable\TaskStatus::class
        );
        $this->taskStatusFactory = new BusinessFactory\TaskStatus(
            $this->taskStatusTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessFactory\TaskStatus::class,
            $this->taskStatusFactory
        );
    }
}
