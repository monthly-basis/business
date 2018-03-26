<?php
namespace LeoGalleguillos\Business\Model\Service\TaskStatus\TaskStatuses;

use Generator;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Factory as BusinessFactory;
use LeoGalleguillos\Business\Model\Table as BusinessTable;

class Get
{
    /**
     * Construct.
     *
     * @param BusinessFactory\TaskStatus $taskStatusFactory
     * @param BusinessTable\TaskStatus $taskStatusTable
     */
    public function __construct(
        BusinessFactory\TaskStatus $taskStatusFactory,
        BusinessTable\TaskStatus $taskStatusTable
    ) {
        $this->taskStatusFactory = $taskStatusFactory;
        $this->taskStatusTable   = $taskStatusTable;
    }

    /**
     * Get.
     *
     * Gets all task statuses.
     *
     * @yield BusinessEntity\TaskStatus
     * @return Generator
     */
    public function get(
    ) : Generator {
        $arrays = $this->taskStatusTable->select();

        foreach ($arrays as $array) {
            yield $this->taskStatusFactory->buildFromArray($array);
        }
    }
}
