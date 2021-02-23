<?php
namespace LeoGalleguillos\Business\Model\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use MonthlyBasis\User\Model\Entity as UserEntity;

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
        UserEntity\User $userEntity,
        string $summary,
        string $description
    ) : int {
        return $this->taskTable->insert(
            $businessEntity->getBusinessId(),
            $userEntity->getUserId(),
            $summary,
            $description
        );
    }
}
