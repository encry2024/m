<?php

namespace App\Models\Supplier\ProductSupplier\Traits\Relationship;

use App\Models\Supplier\Supplier;

/**
 * Class ProductSupplierRelationship.
 */
trait ProductSupplierRelationship
{
    /**
     * @return mixed
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
