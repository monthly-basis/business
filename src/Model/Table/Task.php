<?php
namespace LeoGalleguillos\Business\Model\Table;

use Generator;
use Zend\Db\Adapter\Adapter;

class Task
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function insert(
        int $businessId,
        int $userId,
        string $summary,
        string $description
    ) {
        $sql = '
            INSERT
              INTO `task` (
                   `business_id`, `user_id`, `summary`, `description`, `created`
                   )
            VALUES (?, ?, ?, ?, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            $businessId,
            $userId,
            $summary,
            $description,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }

    /**
     * Select count.
     *
     * @return int
     */
    public function selectCount() : int
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `task`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    public function selectCountWhereBusinessId(int $businessId) : int
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `task`
             WHERE `business_id` = :businessId
                 ;
        ';
        $parameters = [
            'businessId' => $businessId,
        ];
        $row = $this->adapter->query($sql)->execute($parameters)->current();
        return (int) $row['count'];
    }

    public function selectWhereBusinessId(int $businessId) : Generator
    {
        $sql = '
            SELECT `task`.`task_id`
                 , `task`.`business_id`
                 , `task`.`user_id`
                 , `task`.`summary`
                 , `task`.`description`
                 , `task`.`task_status_id`
                 , `task`.`views`
                 , `task`.`created`
              FROM `task`
             WHERE `task`.`business_id` = :businessId
             ORDER
                BY `task`.`task_status_id` ASC
                 , `task`.`created` DESC
                 , `task`.`task_id` DESC
             LIMIT 100
                 ;
        ';
        $parameters = [
            'businessId' => $businessId,
        ];
        foreach ($this->adapter->query($sql)->execute($parameters) as $row) {
            yield($row);
        }
    }

    public function selectWhereTaskId(int $taskId) : array
    {
        $sql = '
            SELECT `task_id`
                 , `business_id`
                 , `user_id`
                 , `summary`
                 , `description`
                 , `task_status_id`
                 , `views`
                 , `created`
              FROM `task`
             WHERE `task_id` = :taskId
                 ;
        ';
        $parameters = [
            'taskId' => $taskId,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }

    public function updateViewsWhereTaskId(int $taskId) : bool
    {
        $sql = '
            UPDATE `task`
               SET `task`.`views` = `task`.`views` + 1
             WHERE `task`.`task_id` = ?
                 ;
        ';
        $parameters = [
            $taskId
        ];
        return (bool) $this->adapter->query($sql, $parameters)->getAffectedRows();
    }

    public function updateWhereTaskId(
        string $description,
        int $taskStatusId,
        int $taskId
    ) : bool {
        $sql = '
            UPDATE `task`
               SET `task`.`description` = :description,
                   `task`.`task_status_id` = :taskStatusId
             WHERE `task`.`task_id` = :taskId
                 ;
        ';
        $parameters = [
            'description'  => $description,
            'taskStatusId' => $taskStatusId,
            'taskId'       => $taskId,
        ];
        return (bool) $this->adapter->query($sql, $parameters)->getAffectedRows();
    }
}
