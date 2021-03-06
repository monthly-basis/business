<?php
namespace MonthlyBasis\Business\Model\Service;

use Generator;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;

class Tasks
{
    /**
     * Construct.
     *
     * @param BusinessFactory\Task $taskFactory
     * @param BusinessTable\Task $taskTable
     */
    public function __construct(
        BusinessFactory\Task $taskFactory,
        BusinessTable\Task $taskTable
    ) {
        $this->taskFactory = $taskFactory;
        $this->taskTable   = $taskTable;
    }

    /**
     * Get
     *
     * Gets tasks for a business.
     *
     * @param BusinessEntity\Business $businessEntity
     * @yield BusinessEntity\Task
     * @return Generator
     */
    public function get(
        BusinessEntity\Business $businessEntity
    ) : Generator {
        $arrays = $this->taskTable->selectWhereBusinessId(
            $businessEntity->getBusinessId()
        );

        foreach ($arrays as $array) {
            yield $this->taskFactory->buildFromArray($array);
        }
    }
}
