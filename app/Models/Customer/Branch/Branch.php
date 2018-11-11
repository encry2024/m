<?php

namespace App\Models\Customer\Branch;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\Branch\Traits\Relationship\BranchRelationship;
use App\Models\Customer\Branch\Traits\Attribute\BranchAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    //
    use BranchRelationship,
        BranchAttribute,
        SoftDeletes;

    protected $fillable =
    [
        'customer_id',
        'name',
        'contact_person',
        'contact_number',
        'tin',
        'email',
        'address'
    ];
}
