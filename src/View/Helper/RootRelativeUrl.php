<?php
namespace LeoGalleguillos\Business\View\Helper;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use Zend\View\Helper\AbstractHelper;

class RootRelativeUrl extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param BusinessService\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        BusinessService\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    /**
     * Invoke
     *
     * @param BusinessEntity\Business $businessEntity
     * @return string
     */
    public function __invoke(BusinessEntity\Business $businessEntity)
    {
        return $this->rootRelativeUrlService->getRootRelativeUrl(
            $businessEntity
        );
    }
}
