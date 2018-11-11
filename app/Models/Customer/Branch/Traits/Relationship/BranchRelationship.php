<?php

namespace App\Models\Customer\Branch\Traits\Relationship;

use App\Models\Customer\Customer;

/**
 * Class BranchRelationship.
 */
trait BranchRelationship
{
    /**
     * @return mixed
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
