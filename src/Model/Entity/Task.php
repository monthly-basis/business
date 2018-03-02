<?php
namespace LeoGalleguillos\Business\Model\Entity;

use DateTime;
use LeoGalleguillos\Business\Model\Entity as BusinessEntity;

class Task
{
    protected $businessId;
    protected $created;
    protected $description;
    protected $summary;
    protected $userId;
    protected $views;

    public function getBusinessId() : int
    {
        return $this->businessId;
    }

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getSummary() : string
    {
        return $this->summary;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function getViews() : int
    {
        return $this->views;
    }

    public function setBusinessId(int $businessId) : BusinessEntity\Task
    {
        $this->businessId = $businessId;
        return $this;
    }

    public function setCreated(DateTime $created) : BusinessEntity\Task
    {
        $this->created = $created;
        return $this;
    }

    public function setDescription(string $description) : BusinessEntity\Task
    {
        $this->description = $description;
        return $this;
    }

    public function setName(string $name) : BusinessEntity\Task
    {
        $this->name = $name;
        return $this;
    }

    public function setSummary(string $summary) : BusinessEntity\Task
    {
        $this->summary = $summary;
        return $this;
    }

    public function setTaskId(int $taskId) : BusinessEntity\Task
    {
        $this->taskId = $taskId;
        return $this;
    }

    public function setUserId(int $userId) : BusinessEntity\Task
    {
        $this->userId = $userId;
        return $this;
    }

    public function setViews(int $views) : BusinessEntity\Task
    {
        $this->views = $views;
        return $this;
    }
}