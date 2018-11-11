<?php

namespace App\Models\Customer\Branch\Traits\Attribute;

/**
 * Trait BranchAttribute.
 */
trait BranchAttribute
{
    /**
     * @return string
     */
    public function getDeliverButtonAttribute()
    {
        return '<a href="'.route('admin.customer.branch.deliver', $this).'" data-toggle="tooltip" data-placement="top" title="Deliver" class="btn btn-info"><i class="fas fa-bus"></i></a>';
    }

    /**
     * @return string
     * '.route('admin.customer.branch.assign_product_pricing', $this).'
     */
    public function getAssignProductPricingButtonAttribute()
    {
        return '<a href="#" data-toggle="tooltip" data-placement="top" title="Assign Product Pricing" class="btn btn-info"><i class="fas fa-list"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.customer.branch.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.customer.branch.destroy', $this).'"
                data-method="delete"
                data-trans-button-cancel="'.__('buttons.general.cancel').'"
                data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                class="dropdown-item">'.__('buttons.general.crud.delete').'</a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.customer.branch.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.customer.branch.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fas fa-refresh" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.restore_user').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
				<div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
                    '.$this->restore_button.'
                    '.$this->delete_permanently_button.'
				</div>';
        }

        return
        '
            <div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
                '.$this->deliver_button.'
                '.$this->edit_button.'
                '.$this->delete_button.'
            </div>
        ';
    }
}
