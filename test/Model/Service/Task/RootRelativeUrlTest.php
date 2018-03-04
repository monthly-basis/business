<?php
namespace LeoGalleguillos\BusinessTest\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class RootRelativeUrlTest extends TestCase
{
    protected function setUp()
    {
        $this->businessFactoryMock = $this->createMock(
            BusinessFactory\Business::class
        );
        $this->slugService = $this->createMock(
            BusinessService\Task\Slug::class
        );
        $this->rootRelativeUrlService = new BusinessService\Task\RootRelativeUrl(
            $this->businessFactoryMock,
            $this->slugService
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Task\RootRelativeUrl::class,
            $this->rootRelativeUrlService
        );
    }
}
