<?php
namespace MonthlyBasis\Business\Model\Service\Task;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Table as BusinessTable;

class IncrementViews
{
    /**
     * Construct.
     *
     * @param BusinessTable\Task $taskTable
     */
    public function __construct(
        BusinessTable\Task $taskTable
    ) {
        $this->taskTable = $taskTable;
    }

    /**
     * Increment views.
     *
     * @param BusinessEntity\Task $taskEntity
     * @return bool
     */
    public function incrementViews(BusinessEntity\Task $taskEntity)
    {
        return $this->taskTable->updateViewsWhereTaskId(
            $taskEntity->getTaskId()
        );
    }
}
