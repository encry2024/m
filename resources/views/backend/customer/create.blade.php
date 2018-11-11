@extends ('backend.layouts.app')

@section ('title', __('labels.backend.customers.management') . ' | ' . __('labels.backend.customers.create'))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->form('POST', route('admin.customer.store'))->class('form-horizontal')->open() }}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.customers.management') }}
                    <small class="text-muted">{{ __('labels.backend.customers.create') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr />

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.customer.company_name'))
                    ->class('col-md-2 form-control-label')
                    ->for('company_name') }}

                    <div class="col-md-10">
                        {{
                            html()->text('company_name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.customer.company_name'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus()
                        }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.customer.tin'))->class('col-md-2 form-control-label')->for('tin') }}

                    <div class="col-sm-10">
                        {{
                            html()->text('tin')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.customer.tin'))
                            ->attribute('maxlength', 191)
                            ->required()
                        }}
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.customer.contact_person'))->class('col-md-2 form-control-label')->for('contact_person') }}

                    <div class="col-sm-10">
                        {{
                            html()->text('contact_person')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.customer.contact_person'))
                            ->attribute('maxlength', 191)
                            ->required()
                        }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.customer.contact_number'))->class('col-md-2 form-control-label')->for('contact_number') }}

                    <div class="col-md-10">
                        {{ html()->text('contact_number')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.customer.contact_number'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.customer.email'))
                    ->class('col-md-2 form-control-label')
                    ->for('email') }}

                    <div class="col-md-10">
                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.customer.email'))
                            ->attribute('maxlength', 191) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.customer.company_address'))
                    ->class('col-md-2 form-control-label')
                    ->for('company_address') }}

                    <div class="input-group col-md-10">
                        {{ html()->text('company_address')
                            ->class('form-control numeric-input')
                            ->placeholder(__('validation.attributes.backend.customer.company_address'))
                            ->attribute('maxlength', 191) }}
                    </div><!--col-->
                </div><!--form-group-->

            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer clearfix">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.customer.index'), __('buttons.general.cancel')) }}
            </div><!--col-->

            <div class="col text-right">
                {{ form_submit(__('buttons.general.crud.create')) }}
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
{{ html()->form()->close() }}
@endsection