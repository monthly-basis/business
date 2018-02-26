<?php
namespace LeoGalleguillos\Business\Model\Entity;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;

class Business
{
    protected $created;
    protected $description;
    protected $name;
    protected $userId;
    protected $views;
    protected $website;

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getViews() : int
    {
        return $this->views;
    }

    public function getWebsite() : string
    {
        return $this->website;
    }

    public function setCreated(DateTime $created) : BusinessEntity\Business
    {
        $this->created = $created;
        return $this;
    }

    public function setDescription(string $description) : BusinessEntity\Business
    {
        $this->description = $description;
        return $this;
    }

    public function setName(string $name) : BusinessEntity\Business
    {
        $this->name = $name;
        return $this;
    }

    public function setUserId(int $userId) : BusinessEntity\Business
    {
        $this->userId = $userId;
        return $this;
    }

    public function setViews(int $views) : BusinessEntity\Business
    {
        $this->views = $views;
        return $this;
    }

    public function setWebsite(string $website) : BusinessEntity\Business
    {
        $this->website = $website;
        return $this;
    }
}