<?php
namespace LeoGalleguillos\BusinessTest\Model\Entity;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    protected function setUp(): void
    {
        $this->taskEntity = new BusinessEntity\Task();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessEntity\Task::class,
            $this->taskEntity
        );
    }

    public function testGettersAndSetters()
    {
        $businessId = 123;
        $this->assertSame(
            $this->taskEntity,
            $this->taskEntity->setBusinessId($businessId)
        );
        $this->assertSame(
            $businessId,
            $this->taskEntity->getBusinessId()
        );

        $created = new DateTime();
        $this->assertSame(
            $this->taskEntity,
            $this->taskEntity->setCreated($created)
        );
        $this->assertSame(
            $created,
            $this->taskEntity->getCreated()
        );

        $taskId = 987;
        $this->assertSame(
            $this->taskEntity,
            $this->taskEntity->setTaskId($taskId)
        );
        $this->assertSame(
            $taskId,
            $this->taskEntity->getTaskId()
        );

        $taskStatusEntity = new BusinessEntity\TaskStatus();
        $this->assertSame(
            $this->taskEntity,
            $this->taskEntity->setTaskStatusEntity($taskStatusEntity)
        );
        $this->assertSame(
            $taskStatusEntity,
            $this->taskEntity->getTaskStatusEntity()
        );

        $userId = 123;
        $this->assertSame(
            $this->taskEntity,
            $this->taskEntity->setUserId($userId)
        );
        $this->assertSame(
            $userId,
            $this->taskEntity->getUserId()
        );
    }
}
