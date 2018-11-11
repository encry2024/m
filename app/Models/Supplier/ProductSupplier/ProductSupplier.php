<?php

namespace App\Models\Supplier\ProductSupplier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Supplier\ProductSupplier\Traits\Attribute\ProductSupplierAttribute;
use App\Models\Supplier\ProductSupplier\Traits\Relationship\ProductSupplierRelationship;

class ProductSupplier extends Model
{
    //
    use ProductSupplierAttribute,
        ProductSupplierRelationship,
        SoftDeletes;

    protected $fillable = ['supplier_id', 'name', 'price'];
}
