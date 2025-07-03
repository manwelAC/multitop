@if($products->count() > 0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Supplier</th>
                <th>Stock Level</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->type === 'Others' ? $product->type_other : $product->type }}</td>
                <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                <td>{{ $product->stock_level }}</td>
                <td>{{ $product->regular_price ? number_format($product->regular_price, 2) : 'N/A' }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">No products found</div>
