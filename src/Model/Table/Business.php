<?php
namespace LeoGalleguillos\Business\Model\Table;

use Generator;
use Zend\Db\Adapter\Adapter;

class Business
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
        int $userId,
        string $name,
        string $description,
        string $website
    ) {
        $sql = '
            INSERT
              INTO `business` (`user_id`, `name`, `description`, `website`, `created`)
            VALUES (?, ?, ?, ?, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            $userId,
            $name,
            $description,
            $website
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }

    public function isUsernameInTable($username)
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `user`
             WHERE `username` = ?
                 ;
        ';
        $row = $this->adapter->query($sql, [$username])->current();
        return (bool) $row['count'];
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `business`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    public function selectOrderByCreatedDesc() : Generator
    {
        $sql = '
            SELECT `user_id`
                 , `username`
                 , `password_hash`
                 , `welcome_message`
                 , `views`
                 , `created`
              FROM `user`
             ORDER
                BY `created` DESC
             LIMIT 100
                 ;
        ';
        foreach ($this->adapter->query($sql)->execute() as $row) {
            yield($row);
        }
    }

    public function selectRow($usernameOrEmail)
    {
        $sql = '
            SELECT `user`.`user_id`
                 , `user`.`username`
                 , `user`.`password_hash`
              FROM `user`
              JOIN `user_email`
             USING (`user_id`)
             WHERE `user`.`username` = ?
                OR `user_email`.`address` = ?
             LIMIT 1
                 ;
        ';
        $parameters = [
            $usernameOrEmail,
            $usernameOrEmail
        ];
        $row = $this->adapter->query($sql, $parameters)->current();

        if (empty($row)) {
            return false;
        }

        return (array) $row;
    }

    public function selectWhereUserId(int $userId) : array
    {
        $sql = '
            SELECT `user_id`
                 , `username`
                 , `password_hash`
                 , `welcome_message`
                 , `views`
                 , `created`
              FROM `user`
             WHERE `user_id` = ?
                 ;
        ';
        return $this->adapter->query($sql)->execute([$userId])->current();
    }

    public function selectWhereUsername(string $username) : ArrayObject
    {
        $sql = '
            SELECT `user_id`
                 , `username`
                 , `password_hash`
                 , `welcome_message`
                 , `views`
                 , `created`
              FROM `user`
             WHERE `username` = ?
                 ;
        ';
        $arrayObject = $this->adapter->query($sql, [$username])->current();
        return $arrayObject;
    }

    public function updateViewsWhereUserId(int $userId) : bool
    {
        $sql = '
            UPDATE `user`
               SET `user`.`views` = `user`.`views` + 1
             WHERE `user`.`user_id` = ?
                 ;
        ';
        $parameters = [
            $userId
        ];
        return (bool) $this->adapter->query($sql, $parameters)->getAffectedRows();
    }

    public function updateWhereUserId(ArrayObject $arrayObject, int $userId) : bool
    {
        $sql = '
            UPDATE `user`
               SET `user`.`welcome_message` = ?
             WHERE `user`.`user_id` = ?
                 ;
        ';
        $parameters = [
            $arrayObject['welcome_message'],
            $userId
        ];
        return (bool) $this->adapter->query($sql, $parameters)->getAffectedRows();
    }
}
