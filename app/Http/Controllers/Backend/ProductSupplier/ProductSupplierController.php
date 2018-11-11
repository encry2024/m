<?php

namespace App\Http\Controllers\Backend\ProductSupplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Models
use App\Models\ProductSupplier\ProductSupplier;
use App\Models\Supplier\Supplier;
// Repository
use App\Repositories\Backend\Supplier\ProductSupplierRepository;

class ProductSupplierController extends Controller
{
    protected $productSupplierRepository;

    public function __construct(ProductSupplierRepository $productSupplierRepository)
    {
        $this->productSupplierRepository = $productSupplierRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('backend.supplier.index')
    //         ->withProductSuppliers($this->productSupplierRepository->getProductSupplierPaginated());
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('backend.supplier.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Supplier $supplier, Request $request)
    {
        $product_supplier = $this->productSupplierRepository->store($supplier, $request->only(
            'name',
            'price'
        ));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.suppliers.created', ['supplier' => $supplier->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSupplier $supplier)
    {
        return view('backend.supplier.show')->withProductSupplier($supplier);
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
