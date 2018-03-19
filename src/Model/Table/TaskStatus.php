<?php
namespace LeoGalleguillos\Business\Model\Table;

use Generator;
use Zend\Db\Adapter\Adapter;

class TaskStatus
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
}
