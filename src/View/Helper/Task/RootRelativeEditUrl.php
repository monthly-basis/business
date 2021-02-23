<?php
namespace LeoGalleguillos\Business\View\Helper\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use Laminas\View\Helper\AbstractHelper;

class RootRelativeEditUrl extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param BusinessService\Task\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        BusinessService\Task\RootRelativeEditUrl $rootRelativeEditUrlService
    ) {
        $this->rootRelativeEditUrlService = $rootRelativeEditUrlService;
    }

    /**
     * Invoke
     *
     * @param BusinessEntity\Task $taskEntity
     * @return string
     */
    public function __invoke(BusinessEntity\Task $taskEntity)
    {
        return $this->rootRelativeEditUrlService->getRootRelativeEditUrl(
            $taskEntity
        );
    }
}
