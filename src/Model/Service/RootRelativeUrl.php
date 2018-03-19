<?php
namespace LeoGalleguillos\Business\Model\Service;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;

class RootRelativeUrl
{
    /**
     * Get root relative URL.
     *
     * @param BusinessEntity\Business $businessEntity
     * @return string
     */
    public function getRootRelativeUrl(
        BusinessEntity\Business $businessEntity
    ) : string {
        return '/businesses/'
             . $businessEntity->getSlug();
    }
}
