<?php
namespace MonthlyBasis\Business\Model\Service\Task;

use Exception;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\Flash\Model\Service as FlashService;

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
     * @param BusinessEntity\Task $taskEntity
     * @return bool
     */
    public function update(
        BusinessEntity\Task $taskEntity
    ) : bool {
        $errors = [];
        if (empty($_POST['description'])) {
            $errors[]  = 'Invalid description';
        }
        if (empty($_POST['task_status_id'])) {
            $errors[]  = 'Invalid status.';
        }

        if ($errors) {
            $this->flashService->set('errors', $errors);
            throw new Exception('Invalid form input.');
        }

        if ($this->taskTable->updateWhereTaskId(
            $_POST['description'],
            $_POST['task_status_id'],
            $taskEntity->getTaskId()
        )) {
            $this->flashService->set('success', 'Task successfully updated.');
            return true;
        }

        return false;
    }
}
