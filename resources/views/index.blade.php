@extends('layout')

@section('content')
<div class="row mt-4 mx-2">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> CRUD For Test </h2>
        </div>
        <div class="row align-items-center mb-4">

            <div class="col-md-6">
                <form action="{{ route('product.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search by name" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <div class="col-md-6 text-end">
                <a class="btn btn-success" href="{{ route('product.create') }}">New Product</a>
            </div>

        </div>

    </div>
</div>


<div class=" m-2">
    <div class="btn-group" role="group">

        <a href="{{ route('product.index') }}" class="btn btn-outline-primary {{ !request('type') ? 'active' : '' }}">
            <i class="bi bi-list"></i> All
        </a>

        <a href="{{ route('product.index', ['type' => 'Snack']) }}" class="btn btn-outline-primary {{ request('type') == 'Snack' ? 'active' : '' }}">
            <i class="bi bi-cupcake"></i> Snack
        </a>
        <a href="{{ route('product.index', ['type' => 'Drink']) }}" class="btn btn-outline-primary {{ request('type') == 'Drink' ? 'active' : '' }}">
            <i class="bi bi-cup"></i> Drink
        </a>
        <a href="{{ route('product.index', ['type' => 'Rice']) }}" class="btn btn-outline-primary {{ request('type') == 'Rice' ? 'active' : '' }}">
            <i class="bi bi-box"></i> Rice
        </a>
        <a href="{{ route('product.index', ['type' => 'Ice Cream']) }}" class="btn btn-outline-primary {{ request('type') == 'Ice Cream' ? 'active' : '' }}">
            <i class="bi bi-cone"></i> Ice Cream
        </a>
        <a href="{{ route('product.index', ['type' => 'Household Item']) }}" class="btn btn-outline-primary {{ request('type') == 'Household Item' ? 'active' : '' }}">
            <i class="bi bi-house"></i> Household
        </a>

    </div>
</div>

<table class="table table-striped mx-2 text-center">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Last Update</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->updated_at->format('Y-m-d') }}</td>
            <td>
                <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection