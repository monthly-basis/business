<?php
namespace LeoGalleguillos\Business\Model\Service;

use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\String\Model\Service as StringService;

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
     */
    public function create(
        int $userId,
        string $name,
        string $description,
        string $website
    ) {
        $slug = $this->urlFriendlyService->getUrlFriendly($name);

        $businessId = $this->businessTable->insert(
            $userId,
            $name,
            $slug,
            $description,
            $website
        );
    }
}
