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
        string $summary,
        string $description
    ) {
        $sql = '
            INSERT
              INTO `task` (
                   `business_id`, `summary`, `description`, `created`
                   )
            VALUES (?, ?, ?, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            $businessId,
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

    public function selectWhereBusinessId(int $businessId) : Generator
    {
        $sql = '
            SELECT `task_id`
                 , `business_id`
                 , `summary`
                 , `description`
                 , `views`
                 , `created`
              FROM `task`
             WHERE `business_id` = :businessId
             ORDER
                BY `created` DESC
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
                 , `summary`
                 , `description`
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
}
