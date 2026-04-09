@extends('layouts.app')

@section('content')

<h3>Farmer Dashboard</h3>


<div class="row mt-4">

    <div class="col-md-3">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5>📦Total Products</h5>
                <h2>{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>📊Total Requests</h5>
                <h2>{{ $totalRequests }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-dark bg-warning mb-3">
            <div class="card-body">
                <h5>⏳Pending</h5>
                <h2>{{ $pendingRequests }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>✅ Accepted</h5>
                <h2>{{ $acceptedRequests }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5>❌Rejected</h5>
                <h2>{{ $rejectedRequests }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="card text-white bg-primary mb-3">
        <div class="card-body">
            <h5>💰Total Revenue</h5>
            <h2>₹ {{ $totalRevenue }}</h2>
        </div>
    </div>
</div>
@if($topProduct)
<div class="col-md-3">
    <div class="card text-white bg-dark mb-3">
        <div class="card-body">
            <h5>🏆 Top Selling Product</h5>
            <h4>{{ $topProduct->product->product_name }}</h4>
            <small>Sold: {{ $topProduct->total_sold }}</small>
            
        </div>
    </div>
</div>
@endif
<hr class="mt-5">

<h4 class="mb-3">Recent Orders</h4>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Buyer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @forelse($recentOrders as $order)
        <tr>
            <td>{{ $order->user->name ?? 'Guest User' }}</td>
            <td>{{ $order->product->product_name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>₹ {{ $order->total_price }}</td>
            <td>{{ $order->created_at->format('d-m-Y') }}</td>
            <td>
                <span class="badge
                    @if($order->status=='accepted') bg-success
                    @elseif($order->status=='rejected') bg-danger
                    @else bg-warning text-dark
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No orders found</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>

<div class="d-flex gap-3 mt-4 flex-wrap">

    <a href="{{ route('products.create') }}" class="btn btn-success">
    Add New Product
</a>

    <a href="{{ route('products.index') }}" class="btn btn-info text-white">
        My Products
    </a>

    <a href="{{ route('farmer.orders') }}" class="btn btn-secondary">
        Order History
    </a>

</div>


@endsection
