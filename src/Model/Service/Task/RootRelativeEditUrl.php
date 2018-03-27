<?php
namespace LeoGalleguillos\Business\Model\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Service as BusinessService;

class RootRelativeEditUrl
{
    /**
     * Construct.
     *
     * @param BusinessFactory\Business $businessFactory
     */
    public function __construct(
        BusinessFactory\Business $businessFactory
    ) {
        $this->businessFactory = $businessFactory;
    }

    /**
     * Get root relative edit URL.
     *
     * @param BusinessEntity\Task $taskEntity
     * @return string
     */
    public function getRootRelativeEditUrl(
        BusinessEntity\Task $taskEntity
    ) : string {
        $businessEntity = $this->businessFactory->buildFromBusinessId(
            $taskEntity->getBusinessId()
        );

        return '/businesses/'
             . $businessEntity->getSlug()
             . '/tasks/'
             . $taskEntity->getTaskId()
             . '/edit';
    }
}
