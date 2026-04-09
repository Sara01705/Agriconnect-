@extends('layouts.app')

@section('content')

<h3>Edit Product</h3>

<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="product_name"
               value="{{ $product->product_name }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category"
               value="{{ $product->category }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="text" name="price"
               value="{{ $product->price }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="text" name="quantity"
               value="{{ $product->quantity }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Unit</label>
        <input type="text" name="unit"
               value="{{ $product->unit }}"
               class="form-control">
    </div>
    <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="available"
            {{ $product->status == 'available' ? 'selected' : '' }}>
            Available
        </option>

        <option value="unavailable"
            {{ $product->status == 'unavailable' ? 'selected' : '' }}>
            Unavailable
        </option>
    </select>
</div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description"
                  class="form-control">{{ $product->description }}</textarea>
    </div>


    <button class="btn btn-success">Update</button>
    <a href="{{ route('farmer.dashboard') }}" class="btn btn-secondary">
        Cancel
    </a>

</form>

@endsection
