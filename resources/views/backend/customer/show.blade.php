@extends ('backend.layouts.app')

@section ('title', __('labels.backend.customers.management') . ' | ' . __('labels.backend.customers.view', ['customer' => $customer->company_name]))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.customers.management') }}
                        <small class="text-muted">{{ __('labels.backend.customers.view', ['customer' => $customer->company_name]) }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="#" class="btn btn-success ml-1" title="Add Branch"
                        data-toggle="modal" data-target="#add_branch_modal"><i class="fa fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fa fa-user"></i> {{ __('labels.backend.customers.tabs.titles.overview') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#branches" role="tab" aria-controls="branches" aria-expanded="true"><i class="fa fa-city"></i> Branches</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                            @include('backend.customer.show.tabs.overview')
                        </div><!--tab-->

                        <div class="tab-pane" id="branches" role="tabpanel" aria-expanded="true">
                            @include('backend.customer.show.tabs.branches')
                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>{{ __('labels.backend.customers.tabs.content.overview.created_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($customer->created_at)) }},
                        <strong>{{ __('labels.backend.customers.tabs.content.overview.updated_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($customer->updated_at)) }}
                        @if ($customer->trashed())
                            <strong>{{ __('labels.backend.customers.tabs.content.overview.deleted_at') }}:</strong> {{ date('F d, Y (h:i A)', strtotime($customer->deleted_at)) }}
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->

    <!-- Add Branch Modal -->
    <form class="modal" tabindex="-1" role="dialog" id="add_branch_modal" method="POST" action="{{ route('admin.customer.branch.store', $customer->id) }}">
        {{ method_field('POST') }}
        {{ csrf_field() }}

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Branch</h5>
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
                        <label for="tin" class="col-form-label col-4">TIN</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tin" name="tin" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_person" class="col-form-label col-4">Contact Person</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_number" class="col-form-label col-4">Contact Number</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-form-label col-4">E-mail</label>

                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-form-label col-4">Address</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address">
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
