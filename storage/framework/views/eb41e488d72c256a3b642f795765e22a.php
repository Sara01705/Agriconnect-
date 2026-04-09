

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

<h2 class="mb-4">Incoming Buy Requests</h2>

<?php if(session('whatsapp_link')): ?>

<div class="alert alert-success">

Request processed successfully.

<br><br>

<a href="<?php echo e(session('whatsapp_link')); ?>" target="_blank" class="btn btn-success">
Send WhatsApp Message
</a>

</div>

<?php endif; ?>


<table class="table table-bordered table-striped text-center">

<thead class="table-dark">
<tr>
<th>Buyer</th>
<th>Product</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

<td>
<?php echo e(optional($req->user)->name ?? 'User Deleted'); ?>

</td>

<td>
<?php echo e(optional($req->product)->product_name ?? 'Product Removed'); ?>

</td>

<td><?php echo e($req->quantity); ?></td>

<td>₹ <?php echo e(number_format($req->total_price, 2)); ?></td>

<td>

<?php if($req->status == 'pending'): ?>
<span class="badge bg-warning">Pending</span>

<?php elseif($req->status == 'accepted'): ?>
<span class="badge bg-success">Accepted</span>

<?php else: ?>
<span class="badge bg-danger">Rejected</span>
<?php endif; ?>

</td>

<td>

<?php if($req->status == 'pending'): ?>

<form action="<?php echo e(route('buy.request.accept', $req->id)); ?>" method="POST" style="display:inline;">
<?php echo csrf_field(); ?>
<button class="btn btn-success btn-sm">Accept</button>
</form>

<form action="<?php echo e(route('buy.request.reject', $req->id)); ?>" method="POST" style="display:inline;">
<?php echo csrf_field(); ?>
<button class="btn btn-danger btn-sm">Reject</button>
</form>

<?php else: ?>
<span class="text-muted">No Action</span>
<?php endif; ?>

</td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/farmer/requests.blade.php ENDPATH**/ ?>