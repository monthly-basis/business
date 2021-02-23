<?php
namespace MonthlyBasis\Business\Model\Service;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\String\Model\Service as StringService;

class RootRelativeUrl
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    public function getRootRelativeUrl(
        BusinessEntity\Business $businessEntity
    ): string {
        return '/businesses/'
             . $businessEntity->getBusinessId()
             . '/'
             . $this->urlFriendlyService->getUrlFriendly($businessEntity->getName());
    }
}
