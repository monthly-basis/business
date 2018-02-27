<?php
namespace LeoGalleguillos\Business\Model\Factory;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Table as BusinessTable;

class Business
{
    public function __construct(BusinessTable\Business $businessTable)
    {
        $this->businessTable = $businessTable;
    }

    public function buildFromUserId(int $userId)
    {
        $array = $this->userTable->selectWhereUserId(
            $userId
        );

        return $this->buildFromArrayObject($array);
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return BusinessEntity\Business
     */
    public function buildFromArray(array $array) : BusinessEntity\Business
    {
        $businessEntity = new BusinessEntity\Business();

        $businessEntity->setBusinessId($array['business_id'])
                       ->setName($array['name']);

        return $businessEntity;
    }

    /**
     * Build from array object.
     *
     * @param ArrayObject $arrayObject
     * @return UserEntity\User
     * @deprecated Start using $this->buildFromArray(...) method instead
     */
    public function buildFromArrayObject($arrayObject)
    {
        $userEntity = new UserEntity();

        $userEntity->userId   = $arrayObject['user_id'];
        $userEntity->username = $arrayObject['username'];

        if (isset($arrayObject['created'])) {
            $userEntity->setCreated(
                new DateTime($arrayObject['created'])
            );
        }

        $userEntity->setViews(
            (int) ($arrayObject['views'] ?? 0)
        );
        $userEntity->setWelcomeMessage(
            (string) ($arrayObject['welcome_message'] ?? '')
        );

        return $userEntity;
    }

    /**
     * Build from username.
     *
     * @param string $username
     * @return UserEntity\User
     */
    public function buildFromUsername(string $username)
    {
        $arrayObject = $this->userTable->selectWhereUsername(
            $username
        );

        if (empty($arrayObject)) {
            return false;
        }

        return $this->buildFromArrayObject($arrayObject);
    }
}
