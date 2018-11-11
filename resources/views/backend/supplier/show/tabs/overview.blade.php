<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.name') }}</th>
                <td>{{ $supplier->name }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.tin') }}</th>
                <td>{{ $supplier->tin }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.contact_person') }}</th>
                <td>{{ $supplier->contact_person }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.contact_number') }}</th>
                <td>{{ $supplier->contact_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.email') }}</th>
                <td>{{ $supplier->email }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.address') }}</th>
                <td>{{ $supplier->company_address }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.created_at') }}</th>
                <td>{{ date('F d, Y h:i A', strtotime($supplier->created_at)) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.suppliers.tabs.content.overview.updated_at') }}</th>
                <td>{{ date('F d, Y h:i A', strtotime($supplier->updated_at)) }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->