<?php
namespace MonthlyBasis\BusinessTest\Model\Factory;

use DateTime;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\Flash\Model\Service as FlashService;
use MonthlyBasis\User\Model\Entity as UserEntity;
use MonthlyBasis\User\Model\Factory as UserFactory;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    protected function setUp(): void
    {
        $this->taskStatusFactoryMock = $this->createMock(
            BusinessFactory\TaskStatus::class
        );
        $this->taskTableMock = $this->createMock(
            BusinessTable\Task::class
        );
        $this->userFactoryMock = $this->createMock(
            UserFactory\User::class
        );
        $this->taskFactory = new BusinessFactory\Task(
            $this->taskStatusFactoryMock,
            $this->taskTableMock,
            $this->userFactoryMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessFactory\Task::class,
            $this->taskFactory
        );
    }

    public function testBuildFromArray()
    {
        $array = [
            'business_id' => '2',
            'user_id'     => '3',
            'description' => 'description',
            'summary'     => 'summary',
            'views'       => '0',
            'created'     => '2018-02-26 16:21:19',
            'task_id' => '1',
        ];
        $userEntity = new UserEntity\User();

        $taskEntity = new BusinessEntity\Task();
        $taskEntity->setBusinessId($array['business_id'])
                   ->setCreated(new DateTime($array['created']))
                   ->setDescription($array['description'])
                   ->setSummary($array['summary'])
                   ->setTaskId($array['task_id'])
                   ->setUserEntity($userEntity);

        $this->userFactoryMock->method('buildFromUserId')->willReturn(
            $userEntity
        );

        $this->assertEquals(
            $taskEntity,
            $this->taskFactory->buildFromArray($array)
        );
    }
}
