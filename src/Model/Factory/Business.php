<?php
namespace MonthlyBasis\Business\Model\Factory;

use DateTime;
use MonthlyBasis\Business\Model\Entity as BusinessEntity;
use MonthlyBasis\Business\Model\Table as BusinessTable;

class Business
{
    /**
     * Construct.
     *
     * @param BusinessTable\Business $businessTable
     */
    public function __construct(
        BusinessTable\Business $businessTable
    ) {
        $this->businessTable = $businessTable;
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
                       ->setCreated(new DateTime($array['created']))
                       ->setDescription($array['description'])
                       ->setName($array['name'])
                       ->setUserId($array['user_id'])
                       ->setWebsite($array['website']);

        return $businessEntity;
    }

    /**
     * Build from business ID.
     *
     * @param int $businessId
     * @return BusinessEntity\Business
     */
    public function buildFromBusinessId(int $businessId)
    {
        $array = $this->businessTable->selectWhereBusinessId(
            $businessId
        );

        return $this->buildFromArray($array);
    }
}
