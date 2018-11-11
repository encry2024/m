<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.name') }}</th>
                <td>{{ $customer->company_name }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.contact_person') }}</th>
                <td>{{ $customer->contact_person }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.contact_number') }}</th>
                <td>{{ $customer->contact_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.email') }}</th>
                <td>{{ $customer->email }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.address') }}</th>
                <td>{{ $customer->company_address }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.created_at') }}</th>
                <td>{{ date('F d, Y h:i A', strtotime($customer->created_at)) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.updated_at') }}</th>
                <td>{{ date('F d, Y h:i A', strtotime($customer->updated_at)) }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->