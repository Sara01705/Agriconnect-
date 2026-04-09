

<?php $__env->startSection('content'); ?>

<h3 class="mb-4">All Buy Requests</h3>

<table class="table table-bordered table-striped text-center align-middle">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Farmer</th>
            <th>Buyer Name</th>
            <th>Buyer Phone</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($req->id); ?></td>
            <td><?php echo e($req->product->product_name); ?></td>
            <td><?php echo e($req->product->farmer->name); ?></td>
            <td><?php echo e($req->buyer_name); ?></td>
            <td><?php echo e($req->buyer_phone); ?></td>

            <td>
                <?php if($req->status == 'pending'): ?>
                    <span class="badge bg-warning">Pending</span>
                <?php elseif($req->status == 'accepted'): ?>
                    <span class="badge bg-success">Accepted</span>
                <?php else: ?>
                    <span class="badge bg-danger">Rejected</span>
                <?php endif; ?>
            </td>

            <td><?php echo e($req->created_at->format('d M Y')); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="7" class="text-muted">No requests found</td>
        </tr>
    <?php endif; ?>

    </tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/admin/requests.blade.php ENDPATH**/ ?>