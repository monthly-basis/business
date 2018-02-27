<?php
namespace LeoGalleguillos\Business\Model\Factory;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;
use LeoGalleguillos\Business\Model\Table as BusinessTable;

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

    public function buildFromSlug(string $slug)
    {
        $array = $this->businessTable->selectWhereSlug(
            $slug
        );

        return $this->buildFromArray($array);
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
}