<?php

namespace App\Events\Backend\Branch;

use Illuminate\Queue\SerializesModels;

/**
 * Class BranchRestored.
 */
class BranchRestored
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
