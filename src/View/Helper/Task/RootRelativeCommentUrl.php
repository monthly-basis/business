<?php
namespace MonthlyBasis\Business\View\Helper\Task;

use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Service as BusinessService;
use Laminas\View\Helper\AbstractHelper;

class RootRelativeCommentUrl extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param BusinessService\Task\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        BusinessService\Task\RootRelativeCommentUrl $rootRelativeCommentUrlService
    ) {
        $this->rootRelativeCommentUrlService = $rootRelativeCommentUrlService;
    }

    /**
     * Invoke
     *
     * @param BusinessEntity\Task $taskEntity
     * @return string
     */
    public function __invoke(BusinessEntity\Task $taskEntity)
    {
        return $this->rootRelativeCommentUrlService->getRootRelativeCommentUrl(
            $taskEntity
        );
    }
}
