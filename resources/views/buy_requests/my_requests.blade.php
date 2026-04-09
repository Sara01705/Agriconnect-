@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">My Buy Requests</h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- No Requests --}}
    @if($requests->isEmpty())
        <div class="alert alert-info">
            You have not made any requests yet.
        </div>
    @else

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th width="30%">Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @foreach($requests as $request)
            <tr>

                {{-- PRODUCT NAME ONLY --}}
                <td>
                    @if($request->product_name)
                        {{ ucfirst($request->product_name) }}
                    @elseif($request->product)
                        {{ ucfirst($request->product->product_name) }}
                    @else
                        <span class="text-danger">Product Deleted</span>
                    @endif
                </td>

                {{-- QUANTITY --}}
                <td>{{ $request->quantity }}</td>

                {{-- TOTAL PRICE --}}
                <td>₹ {{ number_format($request->total_price, 2) }}</td>

                {{-- STATUS --}}
                <td>
                    @if($request->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($request->status == 'accepted')
                        <span class="badge bg-success">Accepted</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>

                {{-- DATE --}}
                <td>{{ $request->created_at->format('d M Y') }}</td>

            </tr>
            @endforeach
        </tbody>

    </table>

    @endif

</div>

@endsection