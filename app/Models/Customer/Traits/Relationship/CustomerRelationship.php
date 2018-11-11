<?php

namespace App\Models\Customer\Traits\Relationship;

use App\Models\Customer\Branch\Branch;


/**
 * Class CustomerRelationship.
 */
trait CustomerRelationship
{
    /**
     * @return mixed
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
