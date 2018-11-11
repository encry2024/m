<?php

namespace App\Models\Supplier\Traits\Relationship;

use App\Models\Supplier\ProductSupplier\ProductSupplier;

/**
 * Class SupplierRelationship.
 */
trait SupplierRelationship
{
    /**
     * @return mixed
     */
    public function product_suppliers()
    {
        return $this->hasMany(ProductSupplier::class);
    }
}