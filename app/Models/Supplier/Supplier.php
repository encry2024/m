<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Supplier\Traits\Attribute\SupplierAttribute;
use App\Models\Supplier\Traits\Relationship\SupplierRelationship;

class Supplier extends Model
{
    use SupplierAttribute,
        SupplierRelationship,
        SoftDeletes;

    //
    protected $fillable = [
        'name',
        'tin',
        'contact_person',
        'contact_number',
        'email',
        'address'
    ];
}
