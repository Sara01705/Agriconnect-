

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

<h3>✏️ Edit User</h3>

<form action="<?php echo e(route('admin.user.update', $user->id)); ?>" method="POST">
<?php echo csrf_field(); ?>

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" value="<?php echo e($user->phone); ?>" class="form-control">
</div>

<button class="btn btn-success">Update</button>

<a href="<?php echo e(route('admin.users')); ?>" class="btn btn-secondary">Back</a>

</form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/admin/edit_user.blade.php ENDPATH**/ ?>