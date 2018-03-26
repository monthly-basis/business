<?php
namespace LeoGalleguillos\Business\View\Helper\TaskStatus\TaskStatuses;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Service as BusinessService;
use Zend\View\Helper\AbstractHelper;

class SelectHtml extends AbstractHelper
{
    /**
     * Construct.
     *
     * @param BusinessService\RootRelativeUrl $rootRelativeUrlService
     */
    public function __construct(
        BusinessService\TaskStatus\TaskStatuses\Get $getService
    ) {
        $this->getService = $getService;
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

        $string .= '</select>';
        return $string;
    }
}