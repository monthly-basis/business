<?php
namespace MonthlyBasis\Business\Model\Service\Task;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\String\Model\Service as StringService;

class Slug
{
    /**
     * Construct.
     *
     * @param StringService\UrlFriendly $urlFriendlyService
     */
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    /**
     * Get slug.
     *
     * @param BusinessEntity\Task $taskEntity
     * @return string
     */
    public function getSlug(
        BusinessEntity\Task $taskEntity
    ) : string {
        return $this->urlFriendlyService->getUrlFriendly(
            $taskEntity->getSummary()
        );
    }
}
