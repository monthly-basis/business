<?php
namespace MonthlyBasis\Business\Model\Service\Businesses\User;

use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\User\Model\Entity as UserEntity;

class Count
{
    /**
     * Construct.
     *
     * @param BusinessTable\Business $businessTable
     */
    public function __construct(
        BusinessTable\Business $businessTable
    ) {
        $this->businessTable   = $businessTable;
    }

    /**
     * Get count of businesses owned by user.
     *
     * @param UserEntity\User $userEntity
     * @return int
     */
    public function getCount(UserEntity\User $userEntity) : int
    {
        return $this->businessTable->selectCountWhereUserId(
            $userEntity->getUserId()
        );
    }
}
