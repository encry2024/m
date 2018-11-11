<?php

namespace App\Repositories\Backend\Supplier;

use App\Models\Supplier\Supplier;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Supplier\SupplierCreated;
use App\Events\Backend\Supplier\SupplierUpdated;
use App\Events\Backend\Supplier\SupplierRestored;
use App\Events\Backend\Supplier\SupplierDeleted;
use App\Events\Backend\Supplier\SupplierPermanentlyDeleted;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class SupplierRepository.
 */
class SupplierRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Supplier::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getSupplierPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
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
     * @return Supplier
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Supplier
    {
        return DB::transaction(function () use ($data) {
            $supplier = parent::create([
                'name'              =>  $data['name'],
                'tin'               =>  $data['tin'],
                'contact_person'    =>  $data['contact_person'],
                'contact_number'    =>  $data['contact_number'],
                'email'             =>  $data['email'],
                'address'           =>  $data['address']
            ]);

            if ($supplier) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.supplier.show', $supplier->id)."'>".$supplier->name.'</a>';

                event(new SupplierCreated($doer, $model));

                return $supplier;
            }

            throw new GeneralException(__('exceptions.backend.suppliers.create_error', ['customer' => $supplier->name]));
        });
    }

    /**
     * @param Supplier  $supplier
     * @param array $data
     *
     * @return Supplier
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Supplier $supplier, array $data) : Supplier
    {
        return DB::transaction(function () use ($supplier, $data) {
            if ($supplier->update([
                'name'              =>  $data['name'],
                'tin'               =>  $data['tin'],
                'contact_person'    =>  $data['contact_person'],
                'contact_number'    =>  $data['contact_number'],
                'email'             =>  $data['email'],
                'address'           =>  $data['company_address']
            ])) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.supplier.show', $supplier->id)."'>".$supplier->name.'</a>';

                event(new SupplierUpdated($doer, $model));

                return $supplier;
            }

            throw new GeneralException(__('exceptions.backend.suppliers.update_error'));
        });
    }

    /**
     * @param Supplier $supplier
     *
     * @return Supplier
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Supplier $supplier) : Supplier
    {
        if (is_null($supplier->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.suppliers.delete_first'));
        }

        return DB::transaction(function () use ($supplier) {

            if ($supplier->forceDelete()) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.supplier.show', $supplier->id)."'>".$supplier->name.'</a>';

                event(new SupplierPermanentlyDeleted($doer, $model));

                return $supplier;
            }

            throw new GeneralException(__('exceptions.backend.suppliers.delete_error'));
        });
    }

    /**
     * @param Supplier $supplier
     *
     * @return Supplier
     * @throws GeneralException
     */
    public function restore(Supplier $supplier) : Supplier
    {
        if (is_null($supplier->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.suppliers.cant_restore'));
        }

        if ($supplier->restore()) {
            $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $model = "<a href='".route('admin.supplier.show', $supplier->id)."'>".$supplier->name.'</a>';

            event(new SupplierRestored($doer, $model));

            return $supplier;
        }

        throw new GeneralException(__('exceptions.backend.suppliers.restore_error'));
    }
}
