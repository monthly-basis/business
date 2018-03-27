<?php
namespace LeoGalleguillos\BusinessTest\Model\Factory;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\User\Model\Factory as UserFactory;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    protected function setUp()
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
            'description' => 'description',
            'summary'     => 'summary',
            'views'       => '0',
            'created'     => '2018-02-26 16:21:19',
            'task_id' => '1',
        ];

        $taskEntity = new BusinessEntity\Task();
        $taskEntity->setBusinessId($array['business_id'])
                   ->setCreated(new DateTime($array['created']))
                   ->setDescription($array['description'])
                   ->setSummary($array['summary'])
                   ->setTaskId($array['task_id']);

        $this->assertEquals(
            $taskEntity,
            $this->taskFactory->buildFromArray($array)
        );
    }
}
