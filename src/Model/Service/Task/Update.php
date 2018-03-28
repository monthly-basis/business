<?php
namespace LeoGalleguillos\Business\Model\Service\Task;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Table as BusinessTable;
use LeoGalleguillos\Flash\Model\Service as FlashService;

class Update
{
    /**
     * Construct.
     *
     * @param BusinessTable\Task $taskTable
     */
    public function __construct(
        BusinessTable\Task $taskTable,
        FlashService\Flash $flashService
    ) {
        $this->taskTable    = $taskTable;
        $this->flashService = $flashService;
    }

    /**
     * Update
     *
     * @param BusinessEntity\Business $businessEntity
     * @return bool
     */
    public function update(
        BusinessEntity\Business $businessEntity
    ) : bool {
        $errors = [];
        if (empty($_POST['description'])) {
            $errors[]  = 'Invalid description';
        }
        if (empty($_POST['status_entity_id'])) {
            $errors[]  = 'Invalid status.';
        }

        if ($errors) {
            $this->flashService->set('errors', $errors);
            throw new Exception('Invalid form input.');
        }

        return true;
    }
}
