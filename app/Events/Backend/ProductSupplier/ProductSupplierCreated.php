<?php

namespace App\Events\Backend\ProductSupplier;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductSupplierCreated.
 */
class ProductSupplierCreated
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
