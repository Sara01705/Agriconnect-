@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width:1200px;">

<div class="card shadow-sm p-4">

<div class="row align-items-center">

    <!-- Product Image -->
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/'.$product->image) }}"
     class="img-fluid rounded"
     style="width:100%; height:320px; object-fit:cover;">
    </div>

    <!-- Product Details -->
    <div class="col-md-7">

        <h3 class="fw-bold">{{ $product->name }}</h3>

        <p class="text-muted">
            Category: {{ $product->category }}
        </p>

        <h4 class="text-success">
            ₹ {{ number_format($product->price,2) }} / {{ $product->unit }}
        </h4>

        <p>
            <strong>Available Quantity:</strong>
            {{ $product->quantity }} {{ $product->unit }}
        </p>

        <p>
            <strong>Farmer:</strong> {{ $product->farmer->name }}
        </p>

        <div class="mt-3">

 <a href="{{ route('buy.request', $product->id) }}" class="btn btn-primary">
Contact Farmer
</a>
            <a href="tel:{{ $product->farmer->phone }}" class="btn btn-success">
                📞 Call Farmer
            </a>

            <a href="https://wa.me/{{ $product->farmer->phone }}" class="btn btn-success">
                WhatsApp
            </a>

        </div>

    </div>

</div>

</div>


{{-- Customers Also Bought Section --}}

@if($alsoBought->count() > 0)

<hr class="mt-5">

<h4 class="text-success fw-bold mb-3">
 Frequently Bought Together
</h4>

<div class="row g-3">

@foreach($alsoBought as $item)

<div class="col-md-3">

    <div class="card h-100 shadow-sm text-center">

        <img src="{{ asset('storage/'.$item->image) }}"
     class="card-img-top"
     style="height:200px; object-fit:cover;">

        <div class="card-body">

            <h6 class="fw-bold">
                {{ $item->name }}
            </h6>

            <p class="text-success">
                ₹ {{ number_format($item->price,2) }} / {{ $item->unit }}
            </p>

            <a href="{{ route('products.show',$item->id) }}"
               class="btn btn-outline-success btn-sm">
               View
            </a>

        </div>

    </div>

</div>

@endforeach

</div>

@endif

</div>

@endsection