<?php
namespace MonthlyBasis\Business\Model\Service\TaskStatus\TaskStatuses;

use Generator;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;

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
