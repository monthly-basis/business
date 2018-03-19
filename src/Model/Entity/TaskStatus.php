<?php
namespace LeoGalleguillos\Business\Model\Entity;

use LeoGalleguillos\Business\Model\Entity as BusinessEntity;

class TaskStatus
{
    protected $taskStatusId;
    protected $name;

    public function getTaskStatusId() : int
    {
        return $this->taskStatusId;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setTaskStatusId(int $taskStatusId) : BusinessEntity\TaskStatus
    {
        $this->taskStatusId = $taskStatusId;
        return $this;
    }

    public function setName(string $name) : BusinessEntity\TaskStatus
    {
        $this->name = $name;
        return $this;
    }
}
