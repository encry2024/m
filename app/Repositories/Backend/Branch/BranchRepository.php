<?php

namespace App\Repositories\Backend\Branch;

use App\Models\Customer\Branch\Branch;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Branch\BranchCreated;
use App\Events\Backend\Branch\BranchUpdated;
use App\Events\Backend\Branch\BranchRestored;
use App\Events\Backend\Branch\BranchDeleted;
use App\Events\Backend\Branch\BranchPermanentlyDeleted;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BranchRepository.
 */
class BranchRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Branch::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getBranchPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
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
     * @return Branch
     * @throws \Exception
     * @throws \Throwable
     */
    public function store($customer, array $data) : Branch
    {
        return DB::transaction(function () use ($customer, $data) {
            $branch = parent::create([
                'customer_id'       =>  $customer->id,
                'tin'               =>  $data['tin'],
                'name'              =>  $data['name'],
                'contact_person'    =>  $data['contact_person'],
                'contact_number'    =>  $data['contact_number'],
                'email'             =>  $data['email'] ? $data['email'] : 'N/A',
                'address'           =>  $data['address'] ? $data['address'] : 'N/A'
            ]);

            if ($branch) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.customer.branch.show', [$branch->id, $branch->id])."'>".$branch->name.'</a>';

                event(new BranchCreated($doer, $model));

                return $branch;
            }

            throw new GeneralException(__('exceptions.backend.branches.create_error', ['branch' => $branch->name]));
        });
    }

    /**
     * @param Branch  $branch
     * @param array $data
     *
     * @return Branch
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Branch $branch, array $data) : Branch
    {
        return DB::transaction(function () use ($branch, $data) {
            if ($branch->update([
                'tin'               =>  $data['tin'],
                'name'              =>  $data['name'],
                'contact_person'    =>  $data['contact_person'],
                'contact_number'    =>  $data['contact_number'],
                'email'             =>  $data['email'] ? $data['email'] : 'N/A',
                'address'   =>  $data['company_address'] ? $data['company_address'] : 'N/A'
            ])) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.branch.branch.show', [$branch->id, $branc->id])."'>".$branch->name.'</a>';

                event(new BranchUpdated($doer, $model));

                return $branch;
            }

            throw new GeneralException(__('exceptions.backend.branches.update_error'));
        });
    }

    /**
     * @param Branch $branch
     *
     * @return Branch
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Branch $branch) : Branch
    {
        if (is_null($branch->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.branches.delete_first'));
        }

        return DB::transaction(function () use ($branch) {

            if ($branch->forceDelete()) {
                $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
                $model = "<a href='".route('admin.branch.branch.show', [$branch->id, $branc->id])."'>".$branch->name.'</a>';

                event(new BranchPermanentlyDeleted($doer, $model));

                return $branch;
            }

            throw new GeneralException(__('exceptions.backend.branches.delete_error'));
        });
    }

    /**
     * @param Branch $branch
     *
     * @return Branch
     * @throws GeneralException
     */
    public function restore(Branch $branch) : Branch
    {
        if (is_null($branch->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.branches.cant_restore'));
        }

        if ($branch->restore()) {
            $doer  = "<a href='".route('admin.auth.user.show', auth()->id())."'>".Auth::user()->full_name.'</a>';
            $model = "<a href='".route('admin.branch.branch.show', [$branch->id, $branc->id])."'>".$branch->name.'</a>';

            event(new BranchRestored($doer, $model));

            return $branch;
        }

        throw new GeneralException(__('exceptions.backend.branches.restore_error'));
    }
}
