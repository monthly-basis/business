<?php
namespace MonthlyBasis\Business\Model\Service\Task;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Service as BusinessService;

class RootRelativeCommentUrl
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
    public function getRootRelativeCommentUrl(
        BusinessEntity\Task $taskEntity
    ) : string {
        $businessEntity = $this->businessFactory->buildFromBusinessId(
            $taskEntity->getBusinessId()
        );

        return '/businesses/'
             . $businessEntity->getSlug()
             . '/tasks/'
             . $taskEntity->getTaskId()
             . '/comment';
    }
}
