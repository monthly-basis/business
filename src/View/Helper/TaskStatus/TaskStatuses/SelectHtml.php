<?php
namespace LeoGalleguillos\Business\View\Helper\TaskStatus\TaskStatuses;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use MonthlyBasis\String\View\Helper as StringHelper;
use Laminas\View\Helper\AbstractHelper;

class SelectHtml extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param BusinessService\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        BusinessService\TaskStatus\TaskStatuses\Get $getService,
        StringHelper\Escape $escapeHelper
    ) {
        $this->getService   = $getService;
        $this->escapeHelper = $escapeHelper;
    }

    /**
     * Invoke
     *
     * @param BusinessEntity\TaskStatus|null $currentTaskStatusEntity
     * @return string
     */
    public function __invoke(
        BusinessEntity\TaskStatus $currentTaskStatusEntity = null
    ) : string {
        $string = '<select name="task_status_id">' . "\n";
        foreach ($this->getService->get() as $taskStatusEntity) {
            $optionValueEscaped = $this->escapeHelper->__invoke(
                $taskStatusEntity->getTaskStatusId()
            );
            $optionInnerHtmlEscaped = $this->escapeHelper->__invoke(
                $taskStatusEntity->getName()
            );
            $optionHtml  = '<option value="'
                         . $optionValueEscaped
                         . '"';
            if ($taskStatusEntity == $currentTaskStatusEntity) {
                $optionHtml .= ' selected';
            }
            $optionHtml .= '>'
                         . $optionInnerHtmlEscaped
                         . '</option>';
            $string .= $optionHtml . "\n";
        }
        $string .= '</select>';
        return $string;
    }
}
