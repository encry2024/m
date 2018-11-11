<?php

namespace App\Http\Controllers\Backend\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Models
use App\Models\Supplier\Supplier;
// Repository
use App\Repositories\Backend\Supplier\SupplierRepository;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.supplier.index')
            ->withSuppliers($this->supplierRepository->getSupplierPaginated());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = $this->supplierRepository->create($request->only(
            'name',
            'tin',
            'contact_person',
            'contact_number',
            'email',
            'address'
        ));

        return redirect()->route('admin.supplier.index')->withFlashSuccess(__('alerts.backend.suppliers.created', ['supplier' => $supplier->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('backend.supplier.show')->withSupplier($supplier);
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
}
