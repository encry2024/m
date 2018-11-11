<?php

namespace App\Repositories\Backend\Supplier;

use App\Models\Supplier\ProductSupplier\ProductSupplier;
use App\Models\Supplier\Supplier;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\ProductSupplier\ProductSupplierCreated;
use App\Events\Backend\ProductSupplier\ProductSupplierUpdated;
use App\Events\Backend\ProductSupplier\ProductSupplierRestored;
use App\Events\Backend\ProductSupplier\ProductSupplierDeleted;
use App\Events\Backend\ProductSupplier\ProductSupplierPermanentlyDeleted;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ProductSupplierRepository.
 */
class ProductSupplierRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ProductSupplier::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getProductSupplierPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
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
     * @return ProductSupplier
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(Supplier $supplier, array $data) : ProductSupplier
    {
        return DB::transaction(function () use ($supplier, $data) {
            $product_supplier = parent::create([
                'supplier_id'   =>  $supplier->id,
                'name'          =>  $data['name'],
                'price'         =>  $data['price']
            ]);

            if ($product_supplier) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.supplier.product.show', [$supplier->id, $product_supplier->id])."'>".$product_supplier->name.'</a>';

                event(new ProductSupplierCreated($doer, $model));

                return $product_supplier;
            }

            throw new GeneralException(__('exceptions.backend.suppliers.create_error', ['product_supplier' => $product_supplier->name]));
        });
    }

    /**
     * @param ProductSupplier  $product_supplier
     * @param array $data
     *
     * @return ProductSupplier
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(ProductSupplier $product_supplier, array $data) : ProductSupplier
    {
        return DB::transaction(function () use ($product_supplier, $data) {
            if ($product_supplier->update([
                'name'  =>  $data['name'],
                'price' =>  $data['price']
            ])) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.supplier.product.show', $product_supplier->id)."'>".$product_supplier->name.'</a>';

                event(new ProductSupplierUpdated($doer, $model));

                return $product_supplier;
            }

            throw new GeneralException(__('exceptions.backend.suppliers.update_error'));
        });
    }

    /**
     * @param ProductSupplier $product_supplier
     *
     * @return ProductSupplier
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(ProductSupplier $product_supplier) : ProductSupplier
    {
        if (is_null($product_supplier->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.suppliers.delete_first'));
        }

        return DB::transaction(function () use ($product_supplier) {

            if ($product_supplier->forceDelete()) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.supplier.product.show', $product_supplier->id)."'>".$product_supplier->name.'</a>';

                event(new ProductSupplierPermanentlyDeleted($doer, $model));

                return $product_supplier;
            }

            throw new GeneralException(__('exceptions.backend.suppliers.delete_error'));
        });
    }

    /**
     * @param ProductSupplier $product_supplier
     *
     * @return ProductSupplier
     * @throws GeneralException
     */
    public function restore(ProductSupplier $product_supplier) : ProductSupplier
    {
        if (is_null($product_supplier->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.suppliers.cant_restore'));
        }

        if ($product_supplier->restore()) {
            $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $model = "<a href='".route('admin.supplier.product.show', $product_supplier->id)."'>".$product_supplier->name.'</a>';

            event(new ProductSupplierRestored($doer, $model));

            return $product_supplier;
        }

        throw new GeneralException(__('exceptions.backend.suppliers.restore_error'));
    }
}
