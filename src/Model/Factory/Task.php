<?php
namespace LeoGalleguillos\Business\Model\Factory;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Table as BusinessTable;

class Task
{
    /**
     * Construct.
     *
     * @param BusinessTable\Task $taskTable
     */
    public function __construct(
        BusinessFactory\TaskStatus $taskStatusFactory,
        BusinessTable\Task $taskTable
    ) {
        $this->taskStatusFactory = $taskStatusFactory;
        $this->taskTable         = $taskTable;
    }

    public function buildFromTaskId(int $taskId)
    {
        $array = $this->taskTable->selectWhereTaskId(
            $taskId
        );

        return $this->buildFromArray($array);
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return BusinessEntity\Business
     */
    public function buildFromArray(array $array) : BusinessEntity\Task
    {
        $taskEntity = new BusinessEntity\Task();
        $taskEntity->setBusinessId($array['business_id'])
                   ->setCreated(new DateTime($array['created']))
                   ->setDescription($array['description'])
                   ->setSummary($array['summary'])
                   ->setTaskId($array['task_id']);

        return $taskEntity;
    }
}
