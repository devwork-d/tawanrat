@extends('layout')

@section('content')

<div class="row d-flex justify-content-center my-4">
    <form action="{{ route('product.store') }}" method="POST" class="col-md-6 p-4 bg-light shadow rounded">
        @csrf
        <h3 class="text-center mb-4">Add New Product</h3>

        <div class="form-group mb-3">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter product name">
        </div>

        <div class="form-group mb-3">
            <strong>Type</strong>
            <select name="type" class="form-control">
                <option value="" disabled selected>Select Type</option>
                <option value="Snack" {{ old('type') == 'Snack' ? 'selected' : '' }}>Snack</option>
                <option value="Drink" {{ old('type') == 'Drink' ? 'selected' : '' }}>Drink</option>
                <option value="Rice" {{ old('type') == 'Rice' ? 'selected' : '' }}>Rice</option>
                <option value="Ice Cream" {{ old('type') == 'Ice Cream' ? 'selected' : '' }}>Ice Cream</option>
                <option value="Household Item" {{ old('type') == 'Household Item' ? 'selected' : '' }}>Household Item</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <strong>Price</strong>
            <input type="number" name="price" class="form-control" placeholder="Enter price">
        </div>

        <div class="form-group mb-3">
            <strong>Amount</strong>
            <input type="number" name="amount" class="form-control" placeholder="Enter amount">
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary w-50">Submit</button>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</div>

@endsection