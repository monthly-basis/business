<?php
namespace MonthlyBasis\Business\Model\Factory;

use DateTime;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\User\Model\Factory as UserFactory;

class Task
{
    /**
     * Construct.
     */
    public function __construct(
        BusinessFactory\TaskStatus $taskStatusFactory,
        BusinessTable\Task $taskTable,
        UserFactory\User $userFactory
    ) {
        $this->taskStatusFactory = $taskStatusFactory;
        $this->taskTable         = $taskTable;
        $this->userFactory       = $userFactory;
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
                   ->setTaskId($array['task_id'])
                   ->setViews((int) $array['views']);

        $taskEntity->setUserEntity(
            $this->userFactory->buildFromUserId($array['user_id'])
        );

        if (!empty($array['task_status_id'])) {
            $taskStatusEntity = $this->taskStatusFactory->buildFromTaskStatusId(
                $array['task_status_id']
            );
            $taskEntity->setTaskStatusEntity($taskStatusEntity);
        }

        return $taskEntity;
    }
}
