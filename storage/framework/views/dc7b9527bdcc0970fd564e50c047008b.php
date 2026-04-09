

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

<h3>👤 Users List</h3>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<!-- SEARCH FORM -->
<form method="GET" action="<?php echo e(route('admin.users')); ?>" class="mb-3 d-flex">

    <input type="text" name="search" 
           value="<?php echo e($search ?? ''); ?>" 
           class="form-control me-2" 
           placeholder="Search by name, email, or phone">

    <button type="submit" class="btn btn-primary">Search</button>

    <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-secondary ms-2">Reset</a>

</form>

<!-- TABLE -->
<table class="table table-bordered mt-3">
<thead class="table-dark">
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Actions</th>
</tr>
</thead>

<tbody>
<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
<td><?php echo e($user->name); ?></td>
<td><?php echo e($user->email); ?></td>
<td><?php echo e($user->phone); ?></td>
<td>
    <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>" class="btn btn-sm btn-warning">
        Edit
    </a>

    <form action="<?php echo e(route('admin.user.delete', $user->id)); ?>" method="POST" style="display:inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button class="btn btn-sm btn-danger"
        onclick="return confirm('Delete this user?')">
        Delete
        </button>
    </form>
</td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
<td colspan="4" class="text-center text-danger">
    No users found
</td>
</tr>
<?php endif; ?>

</tbody>
</table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/admin/users.blade.php ENDPATH**/ ?>