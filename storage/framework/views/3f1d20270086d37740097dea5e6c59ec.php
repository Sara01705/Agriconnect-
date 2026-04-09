

<?php $__env->startSection('content'); ?>

<h3>Farmer Dashboard</h3>


<div class="row mt-4">

    <div class="col-md-3">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5>📦Total Products</h5>
                <h2><?php echo e($totalProducts); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>📊Total Requests</h5>
                <h2><?php echo e($totalRequests); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-dark bg-warning mb-3">
            <div class="card-body">
                <h5>⏳Pending</h5>
                <h2><?php echo e($pendingRequests); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>✅ Accepted</h5>
                <h2><?php echo e($acceptedRequests); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5>❌Rejected</h5>
                <h2><?php echo e($rejectedRequests); ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="card text-white bg-primary mb-3">
        <div class="card-body">
            <h5>💰Total Revenue</h5>
            <h2>₹ <?php echo e($totalRevenue); ?></h2>
        </div>
    </div>
</div>
<?php if($topProduct): ?>
<div class="col-md-3">
    <div class="card text-white bg-dark mb-3">
        <div class="card-body">
            <h5>🏆 Top Selling Product</h5>
            <h4><?php echo e($topProduct->product->product_name); ?></h4>
            <small>Sold: <?php echo e($topProduct->total_sold); ?></small>
            
        </div>
    </div>
</div>
<?php endif; ?>
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
        <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($order->user->name ?? 'Guest User'); ?></td>
            <td><?php echo e($order->product->product_name); ?></td>
            <td><?php echo e($order->quantity); ?></td>
            <td>₹ <?php echo e($order->total_price); ?></td>
            <td><?php echo e($order->created_at->format('d-m-Y')); ?></td>
            <td>
                <span class="badge
                    <?php if($order->status=='accepted'): ?> bg-success
                    <?php elseif($order->status=='rejected'): ?> bg-danger
                    <?php else: ?> bg-warning text-dark
                    <?php endif; ?>">
                    <?php echo e(ucfirst($order->status)); ?>

                </span>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5" class="text-center">No orders found</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>

<div class="d-flex gap-3 mt-4 flex-wrap">

    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">
    Add New Product
</a>

    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-info text-white">
        My Products
    </a>

    <a href="<?php echo e(route('farmer.orders')); ?>" class="btn btn-secondary">
        Order History
    </a>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/farmer/dashboard.blade.php ENDPATH**/ ?>