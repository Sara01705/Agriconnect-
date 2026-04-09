

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

<h3 class="mb-4 fw-bold">All Products</h3>

<table class="table table-bordered table-striped text-center align-middle">

<thead class="table-dark">
<tr>
    <th>Name</th>
    <th>Farmer</th>
    <th>Price</th>
    <th style="width:150px;">Action</th>
    <th>Status</th>
</tr>
</thead>

<tbody>

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

    
    <td><?php echo e(ucfirst($product->product_name)); ?></td>

    
    <td><?php echo e($product->farmer->name); ?></td>

    
    <td>₹ <?php echo e($product->price); ?></td>

    
    <td>

        <?php if($product->status == 'Available'): ?>

        <a href="<?php echo e(route('admin.product.block',$product->id)); ?>"
        class="btn btn-warning btn-sm">
        Block
        </a>

        <?php else: ?>

        <a href="<?php echo e(route('admin.product.unblock',$product->id)); ?>"
        class="btn btn-success btn-sm">
        Unblock
        </a>

        <?php endif; ?>

    </td>

    
    <td>

        <?php if($product->status == 'Blocked'): ?>

        <span class="badge bg-danger">
        Blocked
        </span>

        <?php elseif($product->quantity == 0): ?>

        <span class="badge bg-secondary">
        Out of Stock
        </span>

        <?php else: ?>

        <span class="badge bg-success">
        Available
        </span>

        <?php endif; ?>

    </td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/admin/products.blade.php ENDPATH**/ ?>