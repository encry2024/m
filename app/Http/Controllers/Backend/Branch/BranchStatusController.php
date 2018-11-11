<?php

namespace App\Http\Controllers\Backend\Branch;

use App\Models\Customer\Branch\Branch;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Branch\BranchRepository;

/**
 * Class BranchStatusController.
 */
class BranchStatusController extends Controller
{
    /**
     * @var BranchRepository
     */
    protected $branchRepository;

    /**
     * @param BranchRepository $branchRepository
     */
    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    /**
     * @param ManageBranchRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageBranchRequest $request)
    {
        return view('backend.branch.deleted')
            ->withUsers($this->branchRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageBranchRequest $request
     * @param User              $deletedUser
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageBranchRequest $request, User $deletedUser)
    {
        $this->branchRepository->forceDelete($deletedUser);

        return redirect()->route('admin.branch.deleted')->withFlashSuccess(__('alerts.backend.branches.deleted_permanently'));
    }

    /**
     * @param ManageBranchRequest $request
     * @param User              $deletedUser
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageBranchRequest $request, User $deletedUser)
    {
        $this->branchRepository->restore($deletedUser);

        return redirect()->route('admin.branch.index')->withFlashSuccess(__('alerts.backend.branches.restored'));
    }
}
