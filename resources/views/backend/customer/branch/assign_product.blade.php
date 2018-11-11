@extends ('backend.layouts.app')

@section ('title', __('labels.backend.branches.view', ['branch' => $branch->name]) . ' | ' . __('labels.backend.branches.deliver', ['branch' => $branch->name]))

@section('breadcrumb-links')
    @include('backend.customer.branch.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.branches.management') }}
                <small class="text-muted">{{ __('labels.backend.branches.assign_product') }}</small>
            </h4>
        </div>
    </div>
    <hr>

    <div class="row mt-4 mb-4">
        <!-- BRANCH COLUMN -->
        <div class="col-3">
            <div class="card">
                <div class="card-body" id="customer_column">
                    <div class="form-group ">
                        <label>Branch Name:</label>
                        <input type="text" class="form-control" value="{{ $branch->name }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>TIN Number:</label>
                        <input type="text" class="form-control" value="{{ $branch->tin }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>Branch Contact Person:</label>
                        <input type="text" class="form-control" value="{{ $branch->contact_person }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>Branch Contact Number:</label>
                        <input type="text" class="form-control" value="{{ $branch->contact_number }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>Branch Address:</label>
                        <input type="text" class="form-control" value="{{ $branch->address }}" readonly>
                    </div>

                    <hr>

                    <div class="form-group ">
                        <label>Company Name:</label>
                        <input type="text" class="form-control" value="{{ $customer->company_name }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>Company Address:</label>
                        <input type="text" class="form-control" value="{{ $customer->company_address }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>Company Contact Person:</label>
                        <input type="text" class="form-control" value="{{ $customer->contact_person }}" readonly>
                    </div>

                    <div class="form-group ">
                        <label>Company Contact Number:</label>
                        <input type="text" class="form-control" value="{{ $customer->contact_number }}" readonly>
                    </div>
                </div>
            </div>
        </div><!--col-->

        <!-- INVOICE COLUMN -->
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="payment_type">Product</label>
                        <select type="text" class="form-control" name="payment_type" id="payment_type" onchange="showDaysTermField($(this).val())" data-placeholder="Select a Product">
                            <option value=""></option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div> <!-- form-group -->

                    <div class="form-group" id="dt_div">

                    </div> <!-- form-group -->

                    <div class="form-group">

                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label for="payment_type">Collection Date</label>
                        <input class="form-control" name="collection_date" id="collection_date" readonly>
                    </div> <!-- form-group -->
                </div>
            </div>
        </div><!--col-->

        <!-- TOTAL COLUMN -->
        <div class="col-3">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div><!--col-->
    </div><!--row-->

    <script>
        $('select').chosen();
    </script>
@endsection
