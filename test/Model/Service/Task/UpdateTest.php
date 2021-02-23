<?php
namespace MonthlyBasis\BusinessTest\Service\Task;

use Exception;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Service as BusinessService;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\Flash\Model\Service as FlashService;
use MonthlyBasis\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    protected function setUp(): void
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

    public function testUpdate()
    {
        $taskEntity = new BusinessEntity\Task();

        $_POST = [];
        try {
            $this->updateService->update($taskEntity);
            $this->fail();
        } catch (Exception $exception) {
            $this->assertSame(
                'Invalid form input.',
                $exception->getMessage()
            );
        }
    }
}
