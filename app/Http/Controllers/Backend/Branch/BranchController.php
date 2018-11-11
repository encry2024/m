<?php

namespace App\Http\Controllers\Backend\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Customer\Branch\Branch;
use App\Models\Product\Product;
use App\Repositories\Backend\Branch\BranchRepository;

class BranchController extends Controller
{
    protected $branchRepository;

    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.branch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('backend.branch.create')->withCustomer($customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Customer $customer, Request $request)
    {
        $branch = $this->branchRepository->store($customer, $request->only(
            'name',
            'tin',
            'contact_person',
            'contact_number',
            'email',
            'address'
        ));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.branches.created', ['branch' => $branch->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Branch $branch)
    {
        return view('backend.branch.show')->withCustomer($customer)->withBranch($branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show Deliver page for Branch
     *
     * @param   int     $id Customer ID
     * @param   int     $id Branch ID
     *
     * @return \Illuminate\Http\Response
     */
    public function deliver(Customer $customer, Branch $branch)
    {
        return view('backend.customer.branch.deliver')->withBranch($branch)->withCustomer($customer);
    }

    /**
     * Show Assign Product Pricing page for Branch
     *
     * @param   int     $id Customer ID
     * @param   int     $id Branch ID
     *
     * @return \Illuminate\Http\Response
     */
    public function assign_product_pricing(Customer $customer, Branch $branch)
    {
        $products = Product::all();

        return view('backend.customer.branch.assign_product')
            ->withBranch($branch)
            ->withCustomer($customer)
            ->withProducts($products);
    }
}
