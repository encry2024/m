<div class="col-6">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Branch Name</th>
                </tr>
            </thead>

            <tbody>
                @if (count($customer->branches))
                    @foreach ($customer->branches as $branch)
                        <tr>
                            <td>
                                {{ $branch->name }}
                                <span class="float-right">
                                    <a href="{{ route('admin.customer.branch.deliver', [$customer->id, $branch->id]) }}" class="btn btn-primary btn-sm" title="Deliver"><i class="fa fa-bus"></i></a>
                                    <a href="{{ route('admin.customer.branch.product.assign_product_pricing', ['customer' => $customer->id, 'branch' => $branch->id]) }}" data-placement="top" data-title="Assign Product Pricing" class="btn btn-primary btn-sm"><i class="fas fa-list"></i></a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center">This customer does not have any branches...</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div><!--table-responsive-->