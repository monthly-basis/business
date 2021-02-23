<?php
namespace LeoGalleguillos\BusinessTest\View\Helper\TaskStatus\TaskStatuses;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\View\Helper as BusinessHelper;
use MonthlyBasis\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;

class SelectHtmlTest extends TestCase
{
    protected function setUp(): void
    {
        $this->getServiceMock = $this->createMock(
            BusinessService\TaskStatus\TaskStatuses\Get::class
        );
        $this->escapeHelperMock = $this->createMock(
            StringHelper\Escape::class
        );
        $this->selectHtmlHelper = new BusinessHelper\TaskStatus\TaskStatuses\SelectHtml(
            $this->getServiceMock,
            $this->escapeHelperMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessHelper\TaskStatus\TaskStatuses\SelectHtml::class,
            $this->selectHtmlHelper
        );
    }

    public function testInvoke__()
    {
        $this->getServiceMock->method('get')->willReturn(
            $this->yieldTaskStatusEntities()
        );
        $string = $this->selectHtmlHelper->__invoke();
        $this->assertIsString(
            $string
        );
    }

    protected function yieldTaskStatusEntities()
    {
        $taskStatusEntity = new BusinessEntity\TaskStatus();
        $taskStatusEntity->setName('Open')
                         ->setTaskStatusId(1);
        yield $taskStatusEntity;
    }
}
