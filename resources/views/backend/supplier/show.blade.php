@extends ('backend.layouts.app')

@section ('title', __('labels.backend.suppliers.management') . ' | ' . __('labels.backend.suppliers.view', ['supplier' => $supplier->name]))

@section('breadcrumb-links')
    @include('backend.supplier.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.suppliers.management') }}
                    <small class="text-muted">{{ __('labels.backend.suppliers.view', ['supplier' => $supplier->company_name]) }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <a href="#" class="btn btn-success ml-1" title="Add Branch"
                    data-toggle="modal" data-target="#add_product_modal">Add product <i class="fa fa-plus-circle"></i></a>
                </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fa fa-user"></i> {{ __('labels.backend.suppliers.tabs.titles.overview') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-expanded="true"><i class="fa fa-archive"></i> Inventory</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        @include('backend.supplier.show.tabs.overview')
                    </div><!--tab-->

                    <div class="tab-pane" id="product" role="tabpanel" aria-expanded="true">
                        @include('backend.supplier.show.tabs.inventory')
                    </div><!--tab-->
                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('labels.backend.suppliers.tabs.content.overview.created_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($supplier->created_at)) }},
                    <strong>{{ __('labels.backend.suppliers.tabs.content.overview.updated_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($supplier->updated_at)) }}
                    @if ($supplier->trashed())
                        <strong>{{ __('labels.backend.suppliers.tabs.content.overview.deleted_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($supplier->deleted_at)) }}
                    @endif
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->

<!-- Add Product Modal -->
<form class="modal" tabindex="-1" role="dialog" id="add_product_modal" method="POST" action="{{ route('admin.supplier.product.store', $supplier->id) }}">
    {{ method_field('POST') }}
    {{ csrf_field() }}

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="name" class="col-form-label col-4">Name</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-form-label col-4">Price</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</form>
@endsection
