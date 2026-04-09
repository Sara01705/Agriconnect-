

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

    <h3 class="fw-bold text-primary mb-4">
        <i class="bi bi-clock-history"></i> Order History
    </h3>

    
    <form method="GET" class="row g-2 mb-3">

        <div class="col-md-2">
            <input type="text" name="search_user"
                   value="<?php echo e(request('search_user')); ?>"
                   class="form-control"
                   placeholder="Search User">
        </div>

        <div class="col-md-2">
            <input type="text" name="search_product"
                   value="<?php echo e(request('search_product')); ?>"
                   class="form-control"
                   placeholder="Search Product">
        </div>

        <div class="col-md-2">
            <input type="date" name="from_date"
                   value="<?php echo e(request('from_date')); ?>"
                   class="form-control">
        </div>

        <div class="col-md-2">
            <input type="date" name="to_date"
                   value="<?php echo e(request('to_date')); ?>"
                   class="form-control">
        </div>

        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="accepted" <?php echo e(request('status')=='accepted' ? 'selected' : ''); ?>>Accepted</option>
                <option value="pending" <?php echo e(request('status')=='pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="rejected" <?php echo e(request('status')=='rejected' ? 'selected' : ''); ?>>Rejected</option>
            </select>
        </div>

        <div class="col-md-1">
            <button class="btn btn-primary w-100">Filter</button>
        </div>

        <div class="col-md-1">
            <a href="<?php echo e(url()->current()); ?>" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>

    </form>

    
    <div class="card mb-3 shadow">
        <div class="card-body bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Total Earnings</h5>
            <h4 class="mb-0">₹ <?php echo e(number_format($totalEarnings, 2)); ?></h4>
        </div>
    </div>

    
    <table class="table table-bordered table-hover">
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

        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e(optional($order->user)->name ?? 'Guest User'); ?></td>
                <td><?php echo e(optional($order->product)->product_name); ?></td>
                <td><?php echo e($order->quantity); ?></td>
                <td>₹ <?php echo e(number_format($order->total_price, 2)); ?></td>
                <td>
                    <span class="badge 
                        <?php if($order->status == 'accepted'): ?> bg-success 
                        <?php elseif($order->status == 'pending'): ?> bg-warning 
                        <?php else: ?> bg-danger 
                        <?php endif; ?>">
                        <?php echo e(ucfirst($order->status)); ?>

                    </span>
                </td>
                <td><?php echo e($order->created_at->format('d M Y')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center text-muted">
                    No orders found
                </td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>

    
    <div class="d-flex justify-content-end mt-4">
        <?php echo e($orders->onEachSide(1)->withQueryString()->links()); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/farmer/orders.blade.php ENDPATH**/ ?>