

<?php $__env->startSection('content'); ?>

<style>
.card {
    border-radius: 15px;
    padding: 20px;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: 0.3s;
}
.card:hover {
    transform: translateY(-5px);
}
.green { background: linear-gradient(to right,#28a745,#20c997); }
.blue { background: linear-gradient(to right,#007bff,#17a2b8); }
.orange { background: linear-gradient(to right,#fd7e14,#ffc107); }

.action-btns a{
    border-radius: 8px;
    font-weight: 500;
}
</style>

<div class="container mt-4">

<h4>👋 Welcome Admin, Manage your system efficiently</h4>

<div class="row mt-4">

<div class="col-md-4">
<div class="card green">
<h5>👨‍🌾 Total Farmers</h5>
<h2><?php echo e($farmers); ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card blue">
<h5>👤 Total Users</h5>
<h2><?php echo e($users); ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card orange">
<h5>📦 Total Products</h5>
<h2><?php echo e($products); ?></h2>
</div>
</div>

</div>

<div class="action-btns mt-4 d-flex gap-3">

<a href="<?php echo e(route('admin.farmers')); ?>" class="btn btn-primary">
👨‍🌾 View Farmers
</a>

<a href="<?php echo e(route('admin.users')); ?>" class="btn btn-info">
👤 View Users
</a>

<a href="<?php echo e(route('admin.products')); ?>" class="btn btn-success">
📦 View Products
</a>

<a href="<?php echo e(route('admin.requests')); ?>" class="btn btn-secondary">
🛒 View Buy Requests
</a>

</div>

<hr>
<h5 class="mt-4">🛒 Recent Orders</h5>

<table class="table table-bordered mt-3">
<thead class="table-dark">
<tr>
    <th>User</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Status</th>
</tr>
</thead>

<tbody>
<?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
    <td><?php echo e($order->user->name ?? 'N/A'); ?></td>
    <td><?php echo e($order->product->product_name ?? 'N/A'); ?></td>
    <td><?php echo e($order->quantity); ?></td>
    <td>₹<?php echo e($order->total_price); ?></td>
    <td>
        <span class="badge bg-success">
            <?php echo e($order->status ?? 'Pending'); ?>

        </span>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
    <td colspan="5" class="text-center text-danger">
        No orders found
    </td>
</tr>
<?php endif; ?>
</tbody>
</table>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>