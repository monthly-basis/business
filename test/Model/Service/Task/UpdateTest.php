<?php
namespace LeoGalleguillos\BusinessTest\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    protected function setUp()
    {
        $this->taskTableMock = $this->createMock(
            BusinessTable\Task::class
        );
        $this->flashServiceMock = $this->createMock(
            FlashService\Flash::class
        );
        $this->updateService = new BusinessService\Task\Update(
            $this->taskTableMock,
            $this->flashServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Task\Update::class,
            $this->updateService
        );
    }
}
