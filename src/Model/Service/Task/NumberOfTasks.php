<?php
namespace LeoGalleguillos\Business\Model\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Table as BusinessTable;

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
