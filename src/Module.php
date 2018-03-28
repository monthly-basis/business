<?php
namespace LeoGalleguillos\Business;

use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Business\View\Helper as BusinessHelper;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\String\View\Helper as StringHelper;
use LeoGalleguillos\User\Model\Factory as UserFactory;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getBusinessRootRelativeUrl' => BusinessHelper\RootRelativeUrl::class,
                    'getTaskRootRelativeEditUrl' => BusinessHelper\Task\RootRelativeEditUrl::class,
                    'getTaskRootRelativeUrl' => BusinessHelper\Task\RootRelativeUrl::class,
                    'getTaskStatusesSelectHtml' => BusinessHelper\TaskStatus\TaskStatuses\SelectHtml::class,
                ],
                'factories' => [
                    BusinessHelper\RootRelativeUrl::class => function ($serviceManager) {
                        return new BusinessHelper\RootRelativeUrl(
                            $serviceManager->get(BusinessService\RootRelativeUrl::class)
                        );
                    },
                    BusinessHelper\Task\RootRelativeEditUrl::class => function ($serviceManager) {
                        return new BusinessHelper\Task\RootRelativeEditUrl(
                            $serviceManager->get(BusinessService\Task\RootRelativeEditUrl::class)
                        );
                    },
                    BusinessHelper\Task\RootRelativeUrl::class => function ($serviceManager) {
                        return new BusinessHelper\Task\RootRelativeUrl(
                            $serviceManager->get(BusinessService\Task\RootRelativeUrl::class)
                        );
                    },
                    BusinessHelper\TaskStatus\TaskStatuses\SelectHtml::class => function ($serviceManager) {
                        $viewHelperManager = $serviceManager->get('ViewHelperManager');
                        return new BusinessHelper\TaskStatus\TaskStatuses\SelectHtml(
                            $serviceManager->get(BusinessService\TaskStatus\TaskStatuses\Get::class),
                            $viewHelperManager->get(StringHelper\Escape::class)
                        );
                    },
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
                        $serviceManager->get(BusinessFactory\TaskStatus::class),
                        $serviceManager->get(BusinessTable\Task::class),
                        $serviceManager->get(UserFactory\User::class)
                    );
                },
                BusinessFactory\TaskStatus::class => function ($serviceManager) {
                    return new BusinessFactory\TaskStatus(
                        $serviceManager->get(BusinessTable\TaskStatus::class)
                    );
                },
                BusinessService\Businesses\User\Count::class => function ($serviceManager) {
                    return new BusinessService\Businesses\User\Count(
                        $serviceManager->get(BusinessTable\Business::class)
                    );
                },
                BusinessService\Businesses\User\Get::class => function ($serviceManager) {
                    return new BusinessService\Businesses\User\Get(
                        $serviceManager->get(BusinessFactory\Business::class),
                        $serviceManager->get(BusinessTable\Business::class)
                    );
                },
                BusinessService\TaskStatus\TaskStatuses\Get::class => function ($serviceManager) {
                    return new BusinessService\TaskStatus\TaskStatuses\Get(
                        $serviceManager->get(BusinessFactory\TaskStatus::class),
                        $serviceManager->get(BusinessTable\TaskStatus::class)
                    );
                },
                BusinessService\Create::class => function ($serviceManager) {
                    return new BusinessService\Create(
                        $serviceManager->get(BusinessTable\Business::class),
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                BusinessService\RootRelativeUrl::class => function ($serviceManager) {
                    return new BusinessService\RootRelativeUrl();
                },
                BusinessService\Task\NumberOfTasks::class => function ($serviceManager) {
                    return new BusinessService\Task\NumberOfTasks(
                        $serviceManager->get(BusinessTable\Task::class)
                    );
                },
                BusinessService\Task\Create::class => function ($serviceManager) {
                    return new BusinessService\Task\Create(
                        $serviceManager->get(BusinessTable\Task::class)
                    );
                },
                BusinessService\Task\RootRelativeEditUrl::class => function ($serviceManager) {
                    return new BusinessService\Task\RootRelativeEditUrl(
                        $serviceManager->get(BusinessFactory\Business::class)
                    );
                },
                BusinessService\Task\RootRelativeUrl::class => function ($serviceManager) {
                    return new BusinessService\Task\RootRelativeUrl(
                        $serviceManager->get(BusinessFactory\Business::class),
                        $serviceManager->get(BusinessService\Task\Slug::class)
                    );
                },
                BusinessService\Task\Slug::class => function ($serviceManager) {
                    return new BusinessService\Task\Slug(
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                BusinessService\Task\Update::class => function ($serviceManager) {
                    return new BusinessService\Task\Update(
                        $serviceManager->get(BusinessTable\Task::class),
                        $serviceManager->get(FlashService\Flash::class)
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
                BusinessTable\TaskStatus::class => function ($serviceManager) {
                    return new BusinessTable\TaskStatus(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
