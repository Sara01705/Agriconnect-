

<?php $__env->startSection('content'); ?>

<h3 class="mb-4">All Farmers</h3>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>





<table class="table table-bordered table-hover table-striped">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>District</th>
<th>State</th>
<th>Total Revenue</th>
<th>Action</th>
<th>Status</th>
<th>Availability</th>
</tr>
</thead>

<tbody>

<?php $__empty_1 = true; $__currentLoopData = $farmers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farmer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

<tr>

<td><?php echo e($farmer->id); ?></td>

<td>

<strong><?php echo e(ucfirst($farmer->name)); ?></strong>

<?php if(($farmer->revenue ?? 0) > 3000): ?>
<br>
<span class="badge bg-danger mt-1">🔥 High Seller</span>

<?php elseif(($farmer->revenue ?? 0) > 750): ?>
<br>
<span class="badge bg-warning text-dark mt-1">⭐ Top Farmer</span>

<?php endif; ?>

</td>

<td><?php echo e($farmer->email); ?></td>

<td><?php echo e($farmer->phone); ?></td>

<td><?php echo e(ucfirst($farmer->district)); ?></td>
<td><?php echo e(ucfirst($farmer->state)); ?></td>

<td>₹ <?php echo e(number_format($farmer->revenue ?? 0,2)); ?></td>

<td>


<?php if(!$farmer->verified): ?>
    <a href="/admin/verify-farmer/<?php echo e($farmer->id); ?>" class="btn btn-success btn-sm">
        Verify
    </a>
<?php else: ?>
    <span class="badge bg-success">✔ Verified</span>
<?php endif; ?>
<?php if(!$farmer->is_blocked): ?>

<a href="<?php echo e(route('admin.farmer.block',$farmer->id)); ?>"
class="btn btn-danger btn-sm">
Block
</a>

<?php else: ?>

<a href="<?php echo e(route('admin.farmer.unblock',$farmer->id)); ?>"
class="btn btn-success btn-sm">
Unblock
</a>

<?php endif; ?>

</td>

<td>

<?php if($farmer->is_blocked == 1): ?>
<span class="badge bg-danger">Blocked</span>
<?php else: ?>
<span class="badge bg-success">Active</span>
<?php endif; ?>

</td>

<td class="text-center">

    <!-- 🔥 AVAILABILITY BADGE -->
    <span class="badge px-3 py-2 rounded-pill shadow-sm
        <?php echo e($farmer->availability == 'available' ? 'bg-success' : 
           ($farmer->availability == 'busy' ? 'bg-warning text-dark' : 'bg-danger')); ?>">
        
        <?php echo e($farmer->availability == 'available' ? '🟢 Available' : 
           ($farmer->availability == 'busy' ? '🟡 Busy' : '🔴 Offline')); ?>

    </span>

    <!-- 🔽 FORM -->
    <form action="/admin/update-availability/<?php echo e($farmer->id); ?>" method="POST" class="mt-2">
        <?php echo csrf_field(); ?>

        <select name="availability" class="form-select form-select-sm mb-2 text-center">
            <option value="available" <?php echo e($farmer->availability == 'available' ? 'selected' : ''); ?>>Available</option>
            <option value="busy" <?php echo e($farmer->availability == 'busy' ? 'selected' : ''); ?>>Busy</option>
            <option value="offline" <?php echo e($farmer->availability == 'offline' ? 'selected' : ''); ?>>Offline</option>
        </select>

        <!-- 🔥 BUTTON -->
        <button type="submit" class="btn btn-primary btn-sm px-3 py-1"
            style="background: linear-gradient(45deg, #4facfe, #00f2fe); border:none; color:white;">
            Update
        </button>

    </form>

</td>

</td>

 
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<tr>
<td colspan="8" class="text-center text-muted">
No farmers found
</td>
</tr>

<?php endif; ?>

</tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/admin/farmers.blade.php ENDPATH**/ ?>