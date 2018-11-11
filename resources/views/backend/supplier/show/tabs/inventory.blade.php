<div class="col-6">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if (count($supplier->product_suppliers))
                    @foreach ($supplier->product_suppliers as $product)
                        <tr>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                PHP {{ number_format($product->price, 2) }}
                            </td>
                            <td>
                                <a href="{{ route('admin.supplier.product.show', [$supplier->id, $product->id]) }}" class="btn btn-info btn-sm" title="View"><i class="fa fa-search"></i></a>
                                <a href="{{ route('admin.supplier.product.edit', [$supplier->id, $product->id]) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.supplier.product.delete', [$supplier->id, $product->id]) }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="3">This supplier does not have any product to display...</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div><!--table-responsive-->