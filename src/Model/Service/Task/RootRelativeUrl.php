<?php
namespace LeoGalleguillos\Business\Model\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;

class RootRelativeUrl
{
    public function __construct(
        BusinessFactory\Business $businessFactory,
        BusinessService\Task\Slug $slugService
    ) {
        $this->businessFactory = $businessFactory;
        $this->slugService     = $slugService;
    }

    /**
     * Get root relative URL.
     *
     * @param BusinessEntity\Task $taskEntity
     * @return string
     */
    public function getRootRelativeUrl(
        BusinessEntity\Task $taskEntity
    ) : string {
        $businessEntity = $this->businessFactory->buildFromBusinessId(
            $taskEntity->getBusinessId()
        );

        return '/businesses/'
             . $businessEntity->getSlug()
             . '/tasks/'
             . $taskEntity->getTaskId()
             . '/'
             . $this->slugService->getSlug($taskEntity);
    }
}
