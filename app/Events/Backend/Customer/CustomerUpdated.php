<?php

namespace App\Events\Backend\Customer;

use Illuminate\Queue\SerializesModels;

/**
 * Class CustomerUpdated.
 */
class CustomerUpdated
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
