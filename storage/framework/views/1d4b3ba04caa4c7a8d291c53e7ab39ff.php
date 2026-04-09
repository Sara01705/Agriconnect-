

<?php $__env->startSection('content'); ?>

<div class="container">

    <h3 class="mb-4">My Buy Requests</h3>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <?php if($requests->isEmpty()): ?>
        <div class="alert alert-info">
            You have not made any requests yet.
        </div>
    <?php else: ?>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th width="30%">Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                
                <td>
                    <?php if($request->product_name): ?>
                        <?php echo e(ucfirst($request->product_name)); ?>

                    <?php elseif($request->product): ?>
                        <?php echo e(ucfirst($request->product->product_name)); ?>

                    <?php else: ?>
                        <span class="text-danger">Product Deleted</span>
                    <?php endif; ?>
                </td>

                
                <td><?php echo e($request->quantity); ?></td>

                
                <td>₹ <?php echo e(number_format($request->total_price, 2)); ?></td>

                
                <td>
                    <?php if($request->status == 'pending'): ?>
                        <span class="badge bg-warning text-dark">Pending</span>
                    <?php elseif($request->status == 'accepted'): ?>
                        <span class="badge bg-success">Accepted</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Rejected</span>
                    <?php endif; ?>
                </td>

                
                <td><?php echo e($request->created_at->format('d M Y')); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>

    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/buy_requests/my_requests.blade.php ENDPATH**/ ?>