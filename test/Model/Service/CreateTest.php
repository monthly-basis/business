<?php
namespace LeoGalleguillos\BusinessTest\Model\Service;

use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    protected function setUp()
    {
        $this->businessTableMock = $this->createMock(
            BusinessTable\Business::class
        );
        $this->urlFriendlyServiceMock = $this->createMock(
            StringService\UrlFriendly::class
        );
        $this->createService = new BusinessService\Create(
            $this->businessTableMock,
            $this->urlFriendlyServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            BusinessService\Create::class,
            $this->createService
        );
    }

    public function testCreate()
    {
        $this->urlFriendlyServiceMock->method('getUrlFriendly')->willReturn('slug');
        $this->businessTableMock->method('insert')->willReturn(456);

        $this->assertSame(
            456,
            $this->createService->create(
                123,
                'name',
                'description',
                'website'
            )
        );
    }
}
