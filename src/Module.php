<?php
namespace LeoGalleguillos\Business;

use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Business\View\Helper as BusinessHelper;
use LeoGalleguillos\String\Model\Service as StringService;

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
                BusinessFactory\Business::class => function ($serviceManager) {
                    return new BusinessFactory\Business(
                        $serviceManager->get(BusinessTable\Business::class)
                    );
                },
                BusinessService\Create::class => function ($serviceManager) {
                    return new BusinessService\Create(
                        $serviceManager->get(BusinessTable\Business::class),
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                BusinessService\Newest::class => function ($serviceManager) {
                    return new BusinessService\Newest(
                        $serviceManager->get(BusinessFactory\Business::class),
                        $serviceManager->get(BusinessTable\Business::class)
                    );
                },
                BusinessTable\Business::class => function ($serviceManager) {
                    return new BusinessTable\Business(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
