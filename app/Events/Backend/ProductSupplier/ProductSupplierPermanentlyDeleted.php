<?php

namespace App\Events\Backend\ProductSupplier;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductSupplierPermanentlyDeleted.
 */
class ProductSupplierPermanentlyDeleted
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
