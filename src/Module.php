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
                BusinessFactory\Task::class => function ($serviceManager) {
                    return new BusinessFactory\Task(
                        $serviceManager->get(BusinessTable\Task::class)
                    );
                },
                BusinessService\Create::class => function ($serviceManager) {
                    return new BusinessService\Create(
                        $serviceManager->get(BusinessTable\Business::class),
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                BusinessService\Task\Create::class => function ($serviceManager) {
                    return new BusinessService\Task\Create(
                        $serviceManager->get(BusinessTable\Task::class)
                    );
                },
                BusinessService\Newest::class => function ($serviceManager) {
                    return new BusinessService\Newest(
                        $serviceManager->get(BusinessFactory\Business::class),
                        $serviceManager->get(BusinessTable\Business::class)
                    );
                },
                BusinessService\Tasks::class => function ($serviceManager) {
                    return new BusinessService\Tasks(
                        $serviceManager->get(BusinessFactory\Task::class),
                        $serviceManager->get(BusinessTable\Task::class)
                    );
                },
                BusinessTable\Business::class => function ($serviceManager) {
                    return new BusinessTable\Business(
                        $serviceManager->get('main')
                    );
                },
                BusinessTable\Task::class => function ($serviceManager) {
                    return new BusinessTable\Task(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
