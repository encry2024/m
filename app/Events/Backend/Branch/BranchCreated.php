<?php

namespace App\Events\Backend\Branch;

use Illuminate\Queue\SerializesModels;

/**
 * Class BranchCreated.
 */
class BranchCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $doer;
    public $model;

    /**
     * @param $model
     */
    public function __construct($doer, $model)
    {
        $this->doer  = $doer;
        $this->model = $model;
    }
}
