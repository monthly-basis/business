<?php
namespace LeoGalleguillos\BusinessTest\View\Helper\TaskStatus\TaskStatuses;

use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\View\Helper as BusinessHelper;
use LeoGalleguillos\String\View\Helper as StringHelper;
use PHPUnit\Framework\TestCase;

class SelectHtmlTest extends TestCase
{
    protected function setUp()
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
}
