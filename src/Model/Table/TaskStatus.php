<?php
namespace LeoGalleguillos\Business\Model\Table;

use Generator;
use Zend\Db\Adapter\Adapter;

class TaskStatus
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function selectWhereTaskStatusId(int $taskStatusId) : array
    {
        $sql = '
            SELECT `task_status`.`task_status_id`
                 , `task_status`.`name`
              FROM `task_status`
             WHERE `task_status`.`task_status_id` = :taskStatusId
                 ;
        ';
        $parameters = [
            'taskStatusId' => $taskStatusId,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }
}
