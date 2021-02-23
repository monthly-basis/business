<?php
namespace MonthlyBasis\Business\Model\Service;

use Generator;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;

class Newest
{
    /**
     * Construct.
     *
     @ @param BusinessFactory\Business $businessFactory
     * @param BusinessTable\Business $businessTable
     */
    public function __construct(
        BusinessFactory\Business $businessFactory,
        BusinessTable\Business $businessTable
    ) {
        $this->businessFactory = $businessFactory;
        $this->businessTable   = $businessTable;
    }

    /**
     * Get newest.
     *
     * @yield BusinessEntity\Business
     * @return Generator
     */
    public function getNewest() : Generator
    {
        foreach ($this->businessTable->selectOrderByCreatedDesc() as $array) {
            yield $this->businessFactory->buildFromArray($array);
        }
    }
}
