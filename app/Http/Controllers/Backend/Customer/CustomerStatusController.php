<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Models\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Customer\CustomerRepository;

/**
 * Class CustomerStatusController.
 */
class CustomerStatusController extends Controller
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageUserRequest $request)
    {
        return view('backend.customer.deleted')
            ->withUsers($this->customerRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $deletedUser
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageUserRequest $request, User $deletedUser)
    {
        $this->customerRepository->forceDelete($deletedUser);

        return redirect()->route('admin.customer.deleted')->withFlashSuccess(__('alerts.backend.customers.deleted_permanently'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $deletedUser
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageUserRequest $request, User $deletedUser)
    {
        $this->customerRepository->restore($deletedUser);

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.customers.restored'));
    }
}
