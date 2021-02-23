<?php
namespace MonthlyBasis\Business\Model\Service\Task;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Table as BusinessTable;

class NumberOfTasks
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
     * Get number of tasks.
     *
     * @param BusinessEntity\Business $businessEntity
     * @return int
     */
    public function getNumberOfTasks(
        BusinessEntity\Business $businessEntity
    ) : int {
        return $this->taskTable->selectCountWhereBusinessId(
            $businessEntity->getBusinessId()
        );
    }
}
