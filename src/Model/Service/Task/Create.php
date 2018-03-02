<?php
namespace LeoGalleguillos\Business\Model\Service\Task;

use LeoGalleguillos\Business\Model\Table as BusinessTable;

class Create
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
     * Create
     *
     * @param BusinessEntity\Business $businessEntity
     * @param string $summary
     * @param string $description
     * @return int
     */
    public function create(
        BusinessEntity\Business $businessEntity,
        string $summary,
        string $description
    ) : int {
        return $this->taskTable->insert(
            $businessEntity->getBusinessId(),
            $summary,
            $description
        );
    }
}
