@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 style="margin-bottom:20px;">My Orders</h2>

    {{-- 🔹 DATE SEARCH BOX --}}
    <form method="GET" action="{{ url('/my-orders') }}" style="margin-bottom:20px;">

        <input type="date" name="date" 
            value="{{ request('date') }}"
            style="padding:8px; border-radius:5px; border:1px solid #ccc;">

        <button type="submit" style="
            padding:8px 15px;
            background:#28a745;
            color:white;
            border:none;
            border-radius:5px;
        ">
            Search
        </button>

        <a href="{{ url('/my-orders') }}" style="
            margin-left:10px;
            text-decoration:none;
            color:red;
            font-weight:bold;
        ">
            Reset
        </a>

    </form>

    {{-- 🔹 SHOW SELECTED DATE --}}
    @if(request('date'))
        <div style="
            margin-bottom:15px;
            padding:10px;
            background:#e9f7ef;
            border-left:5px solid #28a745;
            border-radius:5px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">
            <span>
                Showing results for: 
                <b>{{ \Carbon\Carbon::parse(request('date'))->format('d M Y') }}</b>
            </span>

            <a href="{{ url('/my-orders') }}" style="
                color:red;
                text-decoration:none;
                font-weight:bold;
            ">
                Clear ✖
            </a>
        </div>
    @endif

    {{-- 🔹 EMPTY MESSAGE --}}
    @if($orders->isEmpty())
        <p style="text-align:center; color:gray;">No orders found</p>
    @endif

    {{-- 🔹 ORDER LIST --}}
    @foreach($orders as $order)

    <div style="
        background:#ffffff;
        padding:20px;
        margin-bottom:20px;
        border-radius:10px;
        box-shadow:0px 4px 10px rgba(0,0,0,0.1);
    ">

        {{-- Product Name --}}
        <h4 style="color:#28a745;">
            {{ $order->product_name }}
        </h4>

        {{-- Order ID --}}
        <p><b>Order ID:</b> {{ $order->id }}</p>

        {{-- Quantity --}}
        <p><b>Quantity:</b> {{ $order->quantity }}</p>

        {{-- Total Price --}}
        <p>
            <b>Total Price:</b> 
            ₹{{ number_format($order->total_price, 2) }}
        </p>

        {{-- Date --}}
        <p style="color:gray;">
            <b>Date:</b> 
            {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A') }}
        </p>

        {{-- Status --}}
        @php
            $color = 'red';
            if ($order->status == 'accepted') $color = 'green';
            elseif ($order->status == 'pending') $color = 'orange';
        @endphp

        <p>
            <b>Status:</b> 
            <span style="
                background: {{ $color }};
                color:white;
                padding:5px 10px;
                border-radius:5px;
                font-weight:bold;
            ">
                {{ ucfirst($order->status) }}
            </span>
        </p>

    </div>

    @endforeach

</div>

@endsection