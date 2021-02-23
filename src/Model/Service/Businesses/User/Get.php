<?php
namespace MonthlyBasis\Business\Model\Service\Businesses\User;

use Generator;
use MonthlyBasis\Business\Model\Factory as BusinessFactory;
use MonthlyBasis\Business\Model\Table as BusinessTable;
use MonthlyBasis\User\Model\Entity as UserEntity;

class Get
{
    /**
     * Construct.
     *
     * @param BusinessFactory\Business $businessFactory
     * @param BusinessTable\Business $businessTable
     */
    public function __construct(
        BusinessFactory\Business $businessFactory,
        BusinessTable\Business $businessTable
    ) {
        $this->businessFactory = $businessFactory;
        $this->businessTable   = $businessTable;
    }

    /**
     * Get businesses owned by user.
     *
     * @param UserEntity\User $userEntity
     * @yield BusinessEntity\Business
     * @return Generator
     */
    public function get(UserEntity\User $userEntity) : Generator
    {
        $generator = $this->businessTable->selectWhereUserId($userEntity->getUserId());
        foreach ($generator as $array) {
            yield $this->businessFactory->buildFromArray($array);
        }
    }
}
