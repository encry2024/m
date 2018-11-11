<?php

namespace App\Repositories\Backend\Customer;

use App\Models\Customer\Customer;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Customer\CustomerCreated;
use App\Events\Backend\Customer\CustomerUpdated;
use App\Events\Backend\Customer\CustomerRestored;
use App\Events\Backend\Customer\CustomerDeleted;
use App\Events\Backend\Customer\CustomerPermanentlyDeleted;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CustomerRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getCustomerPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return Customer
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Customer
    {
        return DB::transaction(function () use ($data) {
            $customer = parent::create([
                'tin'               =>  $data['tin'],
                'company_name'      =>  $data['company_name'],
                'contact_person'    =>  $data['contact_person'],
                'contact_number'    =>  $data['contact_number'],
                'email'             =>  $data['email'] ? $data['email'] : 'N/A',
                'company_address'   =>  $data['company_address'] ? $data['company_address'] : 'N/A'
            ]);

            if ($customer) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.customer.show', $customer->id)."'>".$customer->name.'</a>';

                event(new CustomerCreated($doer, $model));

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.customers.create_error', ['customer' => $customer->company_name]));
        });
    }

    /**
     * @param Customer  $customer
     * @param array $data
     *
     * @return Customer
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Customer $customer, array $data) : Customer
    {
        return DB::transaction(function () use ($customer, $data) {
            if ($customer->update([
                'tin'               =>  $data['tin'],
                'company_name'      =>  $data['company_name'],
                'contact_person'    =>  $data['contact_person'],
                'contact_number'    =>  $data['contact_number'],
                'email'             =>  $data['email'] ? $data['email'] : 'N/A',
                'company_address'   =>  $data['company_address'] ? $data['company_address'] : 'N/A'
            ])) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.customer.show', $customer->id)."'>".$customer->name.'</a>';

                event(new CustomerUpdated($doer, $model));

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.customers.update_error'));
        });
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Customer $customer) : Customer
    {
        if (is_null($customer->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.customers.delete_first'));
        }

        return DB::transaction(function () use ($customer) {

            if ($customer->forceDelete()) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.customer.show', $customer->id)."'>".$customer->name.'</a>';

                event(new CustomerPermanentlyDeleted($doer, $model));

                return $customer;
            }

            throw new GeneralException(__('exceptions.backend.customers.delete_error'));
        });
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws GeneralException
     */
    public function restore(Customer $customer) : Customer
    {
        if (is_null($customer->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.customers.cant_restore'));
        }

        if ($customer->restore()) {
            $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $model = "<a href='".route('admin.customer.show', $customer->id)."'>".$customer->name.'</a>';

            event(new CustomerRestored($doer, $model));

            return $customer;
        }

        throw new GeneralException(__('exceptions.backend.customers.restore_error'));
    }
}
