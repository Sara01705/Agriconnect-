

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-4">

                
                <h3 class="fw-bold text-primary mb-4">
                    Buy Request for <?php echo e(ucfirst($product->product_name)); ?>

                </h3>

                
                <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3">

                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>"
                         width="80"
                         height="80"
                         class="rounded-3 me-3"
                         style="object-fit:cover;">

                    <div>
                        <h5 class="mb-1"><?php echo e(ucfirst($product->product_name)); ?></h5>
                        <div class="text-muted">₹ <?php echo e($product->price); ?> per unit</div>

                        <?php if($product->quantity > 0): ?>
                            <span class="badge bg-success mt-1">In Stock</span>
                        <?php else: ?>
                            <span class="badge bg-danger mt-1">Out of Stock</span>
                        <?php endif; ?>
                    </div>

                </div>

                
                <form action="<?php echo e(route('buy.request.store', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Your Name</label>
                        <input type="text"
                               name="buyer_name"
                               class="form-control"
                               required>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="text"
                               name="buyer_phone"
                               class="form-control"
                               required>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message (Optional)</label>
                        <textarea name="message"
                                  class="form-control"
                                  rows="3"></textarea>
                    </div>

                    
                    <div class="mb-4">

                        <label class="form-label fw-bold text-muted">Quantity</label>

                        <div class="d-flex align-items-center">

                            <button type="button"
                                    class="btn btn-outline-secondary fw-bold px-3"
                                    onclick="decreaseQty()">−</button>

                            <input type="number"
                                   id="quantity"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   class="form-control text-center mx-2"
                                   style="width:80px;"
                                   onchange="updateTotal()">

                            <button type="button"
                                    class="btn btn-outline-secondary fw-bold px-3"
                                    onclick="increaseQty()">+</button>

                        </div>
                    </div>

                    
                    <div class="p-3 bg-light rounded-3 mb-4">

                        <div class="d-flex justify-content-between">
                            <span>Price per unit:</span>
                            <span>₹ <?php echo e($product->price); ?></span>
                        </div>

                        <hr class="my-2">

                        <div class="d-flex justify-content-between fw-bold text-success"
     style="font-size:22px;">
                            <span>Total:</span>
                            <span>₹ <span id="totalPrice"><?php echo e($product->price); ?></span></span>
                        </div>

                    </div>

                    
                   
      
                    <div class="d-flex justify-content-between">

                        <a href="<?php echo e(route('products.show',$product->id)); ?>"
                           class="btn btn-outline-secondary">
                           Cancel
                        </a>

                        <button type="submit"
                                class="btn btn-success fw-bold px-4 py-2 shadow-sm">
                            Send Request
                        </button>

                    </div>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>


<script>

let price = <?php echo e($product->price); ?>;

function updateTotal() {
    let qty = document.getElementById('quantity').value;
    document.getElementById('totalPrice').innerText = qty * price;
}

function increaseQty() {
    let qtyInput = document.getElementById('quantity');
    qtyInput.value++;
    updateTotal();
}

function decreaseQty() {
    let qtyInput = document.getElementById('quantity');
    if (qtyInput.value > 1) {
        qtyInput.value--;
        updateTotal();
    }
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/buy_requests/create.blade.php ENDPATH**/ ?>