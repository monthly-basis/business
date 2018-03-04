<?php
namespace LeoGalleguillos\Business\View\Helper\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use Zend\View\Helper\AbstractHelper;

class RootRelativeUrl extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param BusinessService\Task\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        BusinessService\Task\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    /**
     * Invoke
     *
     * @param BusinessEntity\Task $taskEntity
     * @return string
     */
    public function __invoke(BusinessEntity\Task $taskEntity)
    {
        return $this->rootRelativeUrlService->getRootRelativeUrl(
            $taskEntity
        );
    }
}
