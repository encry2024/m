@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.customers.management'))

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
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.customer.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.customers.table.company_name')</th>
                            <th>@lang('labels.backend.customers.table.tin')</th>
                            <th>@lang('labels.backend.customers.table.contact_person')</th>
                            <th>@lang('labels.backend.customers.table.contact_number')</th>
                            <th>@lang('labels.backend.customers.table.created_at')</th>
                            <th>@lang('labels.backend.customers.table.updated_at')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($customers) > 0)
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->company_name }}</td>
                                    <td>{{ $customer->tin }}</td>
                                    <td>{{ $customer->contact_person }}</td>
                                    <td>{{ $customer->contact_number }}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($customer->created_at)) }}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($customer->updated_at)) }}</td>
                                    <td>{!! $customer->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">You have no customers to display...</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $customers->total() !!} {{ trans_choice('labels.backend.customers.table.total', $customers->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $customers->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
