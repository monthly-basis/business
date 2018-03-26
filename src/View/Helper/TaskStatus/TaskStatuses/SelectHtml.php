<?php
namespace LeoGalleguillos\Business\View\Helper\TaskStatus\TaskStatuses;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use LeoGalleguillos\String\View\Helper as StringHelper;
use Zend\View\Helper\AbstractHelper;

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
     * @param BusinessEntity\TaskStatus|null $taskStatusEntity
     * @return string
     */
    public function __invoke(
        BusinessEntity\TaskStatus $taskStatusEntity = null
    ) : string {
        $string = '<select name="task_status_id">';
        foreach ($this->getService->get() as $taskStatusEntity) {
            $string .= '<option value="hello">Hello</option>';
        }
        $string .= '</select>';
        return $string;
    }
}
