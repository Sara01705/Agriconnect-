@extends('layouts.app')

@section('content')

<style>
/* ================= BACKGROUND ANIMATION ================= */
body{
    background: linear-gradient(-45deg, #e9f5ec, #f4f9ff, #e6f4ea, #ffffff);
    background-size: 400% 400%;
    animation: gradientBG 8s ease infinite;
}

@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ================= PARTICLES ================= */
.particles{
    position:fixed;
    width:100%;
    height:100%;
    top:0;
    left:0;
    overflow:hidden;
    z-index:-1;
}

.particles span{
    position:absolute;
    display:block;
    width:20px;
    height:20px;
    background:rgba(40,167,69,0.25);
    border-radius:50%;
    animation: move 18s linear infinite;
    bottom:-150px;
}

/* positions */
.particles span:nth-child(1){ left:10%; animation-delay:0s; }
.particles span:nth-child(2){ left:25%; animation-delay:3s; width:25px;height:25px; }
.particles span:nth-child(3){ left:50%; animation-delay:6s; }
.particles span:nth-child(4){ left:70%; animation-delay:2s; width:15px;height:15px; }
.particles span:nth-child(5){ left:90%; animation-delay:5s; }

@keyframes move{
    0%{ transform:translateY(0) scale(1); opacity:1; }
    100%{ transform:translateY(-1000px) scale(0.5); opacity:0; }
}

/* ================= CONTENT ABOVE PARTICLES ================= */
.container{
    position:relative;
    z-index:1;
}

/* ================= SECTION SPACING ================= */
h4{ margin-top:30px; margin-bottom:15px; }
.row{ margin-top:15px; }

/* ================= PRODUCT CARD ================= */
.product-card{
    border-radius:15px;
    box-shadow:0 6px 16px rgba(0,0,0,0.08);
    transition:0.3s;
    overflow:hidden;
    border:none;
    background:white;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 35px rgba(0,0,0,0.15);
}

.product-card h6{ font-size:16px; }

/* ================= IMAGE ================= */
.product-img{
    height:200px;
    width:100%;
    object-fit:cover;
    border-radius:12px;
    transition:0.3s;
}

.product-img:hover{
    transform:scale(1.05);
}

/* ================= CARD BODY ================= */
.card-body{
    padding-bottom:15px;
}

/* ================= GLASS EFFECT ================= */
.card{
    backdrop-filter: blur(6px);
}

/* ================= PRICE ================= */
.product-price{
    font-size:17px;
    font-weight:600;
    color:#198754;
}

/* ================= BADGE ================= */
.border-success{
    border:2px solid #28a745 !important;
}

/* ================= PAGINATION ================= */
.pagination{
    margin-top:40px;
}
</style>

<div class="particles">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

<div class="container mt-4">

<h3 class="fw-bold mb-4" text-sucess>🌿Fresh Farm Products</h3>

{{-- SEARCH + FILTER --}}
<div class="card shadow-sm p-3 mb-4">
<form method="GET" action="{{ route('products.index') }}" class="row g-3">

<div class="col-md-4">
<label class="form-label fw-semibold">Search</label>
<input type="text" name="search" class="form-control"
placeholder="Search product name" value="{{ request('search') }}">
</div>

<div class="col-md-3">
<label class="form-label fw-semibold">Category</label>
<select name="category" class="form-select">
<option value="">All Categories</option>
@foreach($categories as $cat)
<option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
{{ ucfirst($cat) }}
</option>
@endforeach
</select>
</div>

<div class="col-md-3">
<label class="form-label fw-semibold">Sort By</label>
<select name="sort" class="form-select">
<option value="">Sort By</option>
<option value="latest" {{ request('sort')=='latest' ? 'selected':'' }}>
Newest First
</option>
<option value="price_low" {{ request('sort')=='price_low' ? 'selected':'' }}>
Price: Low → High
</option>
<option value="price_high" {{ request('sort')=='price_high' ? 'selected':'' }}>
Price: High → Low
</option>
</select>
</div>

<div class="col-md-2 d-flex align-items-end gap-2">
<button class="btn btn-primary w-100"> Search </button>
<a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100"> Reset </a>
</div>

</form>
</div>

{{-- AI RECOMMENDED --}}
@if(isset($recommendedProducts) && $recommendedProducts->count() > 0)

<h4 class="text-success"> 🔥 Recommended For You </h4>
<div style="
    background:#e8f5e9;
    border-left:5px solid #28a745;
    padding:12px 16px;
    border-radius:10px;
    margin-bottom:15px;
">
    🤖 <strong>AI Insight:</strong> Users with similar purchase patterns also bought these products
</div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4 mb-4">

@foreach($recommendedProducts as $product)

<div class="col">
<div class="card product-card border-success h-100 p-2">

<img src="{{ asset('storage/'.$product->image) }}" class="card-img-top product-img">

<div class="card-body text-center">

<span class="badge bg-success mb-2"> 🤖 AI Recommended </span>

<h6 class="fw-bold">
{{ ucfirst($product->product_name) }}
</h6>

<p class="product-price">
₹ {{ $product->price }} / {{ $product->unit }}
</p>

<a href="{{ route('products.show',$product->id) }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
View Details
</a>

@if(session()->has('farmer_id') && session('farmer_id') == $product->farmer_id)

<a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning btn-sm w-100 mb-2">
Edit Product
</a>

<form action="{{ route('products.destroy',$product->id) }}" method="POST">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm w-100"> Delete </button>
</form>

@else

<a href="{{ route('buy.request',$product->id) }}" class="btn btn-success w-100 fw-bold">
🛒 Buy Now
</a>

@endif

</div>
</div>
</div>

@endforeach
</div>

<hr class="my-4">

@endif

{{-- ALL PRODUCTS --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">

@forelse($products as $product)

<div class="col">
<div class="card product-card h-100 p-2">

@if($product->image)
<img src="{{ asset('storage/'.$product->image) }}" class="card-img-top product-img">
@else
<img src="https://via.placeholder.com/300" class="card-img-top product-img">
@endif

<div class="card-body">

<h6 class="fw-bold">
{{ ucfirst($product->product_name) }}
</h6>

<p class="text-muted mb-1">
{{ ucfirst($product->category) }}
</p>

<p class="product-price">
₹ {{ $product->price }} / {{ $product->unit }}
</p>

<p class="mb-2">
Farmer: {{ $product->farmer->name ?? '' }}
@if($product->farmer->verified)
    <span class="badge bg-success">✔ Verified</span>
@endif
</p>
@if($product->farmer->availability == 'available')
    <span class="badge bg-success">🟢 Available</span>
@elseif($product->farmer->availability == 'busy')
    <span class="badge bg-warning">🟡 Busy</span>
@else
    <span class="badge bg-danger">🔴 Offline</span>
@endif
<span class="badge bg-success mb-2"> In Stock </span>

<a href="{{ route('products.show',$product->id) }}" class="btn btn-outline-success btn-sm w-100 mb-2">
View Details
</a>

@if(session()->has('farmer_id') && session('farmer_id') == $product->farmer_id)

<a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning btn-sm w-100 mb-2">
Edit Product
</a>

<form action="{{ route('products.destroy',$product->id) }}" method="POST">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm w-100"> Delete </button>
</form>

@else

<a href="{{ route('buy.request',$product->id) }}" class="btn btn-success w-100 fw-bold">
🛒 Buy Now
</a>

@endif

</div>
</div>
</div>

@empty

<div class="col-12 text-center text-muted">
No products found
</div>

@endforelse
</div>

{{-- PAGINATION --}}
<div class="mt-5 d-flex justify-content-center">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
<script>
function toggleChat(){
let chat=document.getElementById("chatbox");
if(chat.style.display==="none"){
chat.style.display="flex";
}else{
chat.style.display="none";
}
}

function sendMessage(){
let input=document.getElementById("chat-input");
let message=input.value.trim();
if(message==="") return;

let body=document.getElementById("chat-body");

/* USER MESSAGE */
body.innerHTML += `
<div style="text-align:right;margin-bottom:10px">
<span style="background:#28a745;color:white;padding:6px 10px;border-radius:10px">
${message}
</span>
</div>
`;

input.value="";

/* SEND MESSAGE TO LARAVEL */
fetch("/chatbot",{
method:"POST",
headers:{
"Content-Type":"application/json",
"X-CSRF-TOKEN":"{{ csrf_token() }}"
},
body:JSON.stringify({ message:message })
})
.then(response => response.json())
.then(data => {
body.innerHTML += `
<div style="text-align:left;margin-bottom:10px">
<span style="background:#eee;padding:6px 10px;border-radius:10px">
${data.reply}
</span>
</div>
`;
body.scrollTop = body.scrollHeight;
})
.catch(error => {
console.log(error);
body.innerHTML += "<div style='color:red'>Server error</div>";
});
}
</script>

</div>

<!-- CHAT WINDOW -->
<div id="chatbox" style="
display:none;
position:fixed;
bottom:100px;
right:25px;
width:320px;
height:420px;
background:white;
border-radius:12px;
box-shadow:0 5px 25px rgba(0,0,0,0.3);
z-index:9999;
flex-direction:column;
overflow:hidden;
">

<div style="background:#28a745;color:white;padding:10px;font-weight:bold;text-align:center">
AgriConnect AI Assistant
</div>

<div id="chat-body" style="flex:1;padding:10px;overflow-y:auto;background:#f8f9fa"></div>

<div style="padding:10px;border-top:1px solid #ddd">
<input type="text" id="chat-input" class="form-control" placeholder="Ask something...">
<button onclick="sendMessage()" class="btn btn-success w-100 mt-2"> Send </button>
</div>

</div>

<script>
function toggleChat(){
let chat=document.getElementById("chatbox");
if(chat.style.display==="none"){
chat.style.display="flex";
}else{
chat.style.display="none";
}
}
</script>

<!-- CHATBOT BUTTON -->
<div onclick="toggleChat()" style="
position:fixed;
bottom:25px;
right:25px;
width:65px;
height:65px;
background:#28a745;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:28px;
cursor:pointer;
box-shadow:0 8px 20px rgba(0,0,0,0.3);
z-index:9999;
">
🤖
</div>

@endsection