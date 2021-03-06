<?php

namespace App\Events\Backend\Supplier;

use Illuminate\Queue\SerializesModels;

/**
 * Class SupplierPermanentlyDeleted.
 */
class SupplierPermanentlyDeleted
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
