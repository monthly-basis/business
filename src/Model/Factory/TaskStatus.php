<?php
namespace LeoGalleguillos\Business\Model\Factory;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Table as BusinessTable;

class TaskStatus
{
    /**
     * Construct.
     *
     * @param BusinessTable\Task $taskTable
     */
    public function __construct(
        BusinessTable\TaskStatus $taskStatusTable
    ) {
        $this->taskStatusTable = $taskStatusTable;
    }

    public function buildFromTaskStatusId(int $taskStatusId)
    {
        $array = $this->taskStatusTable->selectWhereTaskStatusId(
            $taskStatusId
        );

        return $this->buildFromArray($array);
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return BusinessEntity\TaskStatus
     */
    public function buildFromArray(array $array) : BusinessEntity\TaskStatus
    {
        $taskStatusEntity = new BusinessEntity\TaskStatus();
        $taskStatusEntity->setTaskStatusId($array['task_status_id'])
                         ->setName($array['name']);

        return $taskStatusEntity;
    }
}
