@extends('layouts.app')

@section('content')

<div class="container" style="max-width:800px;">



    <!-- HEADER -->
    <div class="card-header bg-success text-white text-center rounded-top-4">
        <h4 class="mb-0">🌾 Add New Product</h4>
    </div>

    <!-- BODY -->
    <div class="card-body p-4">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <label class="form-label fw-bold">
    Product Name <span class="text-danger">*</span>
</label>

<div class="input-group mb-3">
    <span class="input-group-text">📦</span>

    <input type="text" name="product_name" id="product_name"
           class="form-control"
           placeholder="Enter product name"
           required onkeyup="checkPrice()">
</div>
            <!-- CATEGORY -->
            <label class="form-label fw-bold">
    Category <span class="text-danger">*</span>
</label>

<div class="input-group mb-3">
    <span class="input-group-text">🏷️</span>

    <select name="category" class="form-select" required>
        <option value="">-- Select Category --</option>

        <option value="Vegetables" {{ old('category')=='Vegetables'?'selected':'' }}>
            🥦 Vegetables
        </option>

        <option value="Fruits" {{ old('category')=='Fruits'?'selected':'' }}>
            🍎 Fruits
        </option>

        <option value="Dairy Products" {{ old('category')=='Dairy Products'?'selected':'' }}>
            🥛 Dairy Products
        </option>

        <option value="Animal Products" {{ old('category')=='Animal Products'?'selected':'' }}>
            🐄 Animal Products
        </option>

        <option value="Cash Crop" {{ old('category')=='Cash Crop'?'selected':'' }}>
            🌾 Cash Crop
        </option>

    </select>
</div>

            <!-- DESCRIPTION -->
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control mb-3"
                      rows="3" placeholder="Enter product details"></textarea>

        <!-- PRICE -->
<div class="row">
    <div class="col-md-6">
        <label class="form-label fw-bold">
            Price (₹) <span class="text-danger">*</span>
        </label>

        <div class="input-group mb-3">
            <span class="input-group-text">₹</span>
            <input type="number" name="price" id="price" class="form-control"
       placeholder="Enter price" required>
        </div>

        <!-- AI Price Suggestion -->
<div id="aiResult"
style="
background:#f1f8e9;
border-left:5px solid #2e7d32;
padding:12px;
border-radius:6px;
color:#2e7d32;
font-weight:600;
margin-top:10px;">
</div>
                

                <div class="col-md-6">
                    <label class="form-label fw-bold">
                        Quantity <span class="text-danger">*</span>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">🔢</span>
                        <input type="number" name="quantity" class="form-control"
                               placeholder="Enter quantity" required>
                    </div>
                </div>

            </div>

            <!-- UNIT + STATUS -->
            <div class="row">

                <div class="col-md-6">
                    <label class="form-label fw-bold">Unit</label>
                    <select name="unit" class="form-select mb-3">
                        <option>Kg</option>
                        <option>Liter</option>
                        <option>Piece</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-select mb-3">
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>

            </div>

            <!-- IMAGE -->
            <label class="form-label fw-bold">Product Image</label>
            <input type="file" name="image" class="form-control mb-3"
                   onchange="previewImage(event)">

            <!-- IMAGE PREVIEW -->
<img id="preview"
     class="mt-3 rounded shadow-sm"
     style="display:none; max-height:160px;">

            <!-- BUTTONS -->
            <div class="d-flex justify-content-between mt-4">

                <a href="{{ route('farmer.dashboard') }}"
                   class="btn btn-secondary px-4">
                    ← Back
                </a>

                <button class="btn btn-success px-5 fw-bold shadow-sm">
    <i class="bi bi-plus-circle me-2"></i> Add Product
</button>

            </div>

        </form>

    </div>
</div>
```

</div>

<!-- IMAGE PREVIEW SCRIPT -->

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>
<script>

function checkPrice(){

let product = document.getElementById("product_name").value;

if(product.length < 2) return;

fetch("/ai-price?product_name=" + product)
.then(response => response.json())
.then(data => {

document.getElementById("aiResult").innerHTML =
"🤖 <b>AI Market Suggestion</b><br>"+
"Suggested Price: ₹" + data.suggested_price +
"<br>Market Demand: " + data.demand +
"<br>Recommended Range: ₹" + data.range_min + " - ₹" + data.range_max;

// Auto fill price field
document.getElementById("price").value = data.suggested_price;

});

}

</script>

</script>

@endsection
