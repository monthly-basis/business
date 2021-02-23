<?php
namespace MonthlyBasis\Business\Model\Service;

use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\String\Model\Service as StringService;

class Create
{
    /**
     * Construct.
     *
     * @param BusinessTable\Business $businessTable,
     * @param StringService\UrlFriendly $urlFriendlyService
     */
    public function __construct(
        BusinessTable\Business $businessTable,
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->businessTable      = $businessTable;
        $this->urlFriendlyService = $urlFriendlyService;
    }

    /**
     * Create
     *
     * @param int $userId,
     * @param string $name,
     * @param string $description,
     * @param string $website
     * @return int
     */
    public function create(
        int $userId,
        string $name,
        string $description,
        string $website
    ) : int {
        return $this->businessTable->insert(
            $userId,
            $name,
            $description,
            $website
        );
    }
}
