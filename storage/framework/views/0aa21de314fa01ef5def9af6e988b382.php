

<?php $__env->startSection('content'); ?>

<div class="container mt-5" style="max-width:1200px;">

<div class="card shadow-sm p-4">

<div class="row align-items-center">

    <!-- Product Image -->
    <div class="col-md-5 text-center">
        <img src="<?php echo e(asset('storage/'.$product->image)); ?>"
     class="img-fluid rounded"
     style="width:100%; height:320px; object-fit:cover;">
    </div>

    <!-- Product Details -->
    <div class="col-md-7">

        <h3 class="fw-bold"><?php echo e($product->name); ?></h3>

        <p class="text-muted">
            Category: <?php echo e($product->category); ?>

        </p>

        <h4 class="text-success">
            ₹ <?php echo e(number_format($product->price,2)); ?> / <?php echo e($product->unit); ?>

        </h4>

        <p>
            <strong>Available Quantity:</strong>
            <?php echo e($product->quantity); ?> <?php echo e($product->unit); ?>

        </p>

        <p>
            <strong>Farmer:</strong> <?php echo e($product->farmer->name); ?>

        </p>

        <div class="mt-3">

 <a href="<?php echo e(route('buy.request', $product->id)); ?>" class="btn btn-primary">
Contact Farmer
</a>
            <a href="tel:<?php echo e($product->farmer->phone); ?>" class="btn btn-success">
                📞 Call Farmer
            </a>

            <a href="https://wa.me/<?php echo e($product->farmer->phone); ?>" class="btn btn-success">
                WhatsApp
            </a>

        </div>

    </div>

</div>

</div>




<?php if($alsoBought->count() > 0): ?>

<hr class="mt-5">

<h4 class="text-success fw-bold mb-3">
 Frequently Bought Together
</h4>

<div class="row g-3">

<?php $__currentLoopData = $alsoBought; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-3">

    <div class="card h-100 shadow-sm text-center">

        <img src="<?php echo e(asset('storage/'.$item->image)); ?>"
     class="card-img-top"
     style="height:200px; object-fit:cover;">

        <div class="card-body">

            <h6 class="fw-bold">
                <?php echo e($item->name); ?>

            </h6>

            <p class="text-success">
                ₹ <?php echo e(number_format($item->price,2)); ?> / <?php echo e($item->unit); ?>

            </p>

            <a href="<?php echo e(route('products.show',$item->id)); ?>"
               class="btn btn-outline-success btn-sm">
               View
            </a>

        </div>

    </div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php endif; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/products/show.blade.php ENDPATH**/ ?>