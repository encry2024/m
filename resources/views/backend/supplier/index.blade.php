@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.suppliers.management'))

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
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.supplier.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.suppliers.table.name')</th>
                            <th>@lang('labels.backend.suppliers.table.contact_person')</th>
                            <th>@lang('labels.backend.suppliers.table.contact_number')</th>
                            <th>@lang('labels.backend.suppliers.table.created_at')</th>
                            <th>@lang('labels.backend.suppliers.table.updated_at')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($suppliers) > 0)
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->contact_person }}</td>
                                    <td>{{ $supplier->contact_number }}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($supplier->created_at)) }}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($supplier->updated_at)) }}</td>
                                    <td>{!! $supplier->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">You have no suppliers to display...</td>
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
                    {!! $suppliers->total() !!} {{ trans_choice('labels.backend.suppliers.table.total', $suppliers->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $suppliers->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
