<?php
namespace LeoGalleguillos\Business;

use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Business\View\Helper as BusinessHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                BusinessTable\Business::class => function ($serviceManager) {
                    return new BusinessTable\Business(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
