<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\Traits\Relationship\CustomerRelationship;
use App\Models\Customer\Traits\Attribute\CustomerAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use CustomerRelationship,
        CustomerAttribute,
        SoftDeletes;

    protected $fillable = [
        'tin',
        'company_name',
        'contact_person',
        'contact_number',
        'email',
        'company_address'
    ];
}
