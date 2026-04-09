

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

    <h2 style="margin-bottom:20px;">My Orders</h2>

    
    <form method="GET" action="<?php echo e(url('/my-orders')); ?>" style="margin-bottom:20px;">

        <input type="date" name="date" 
            value="<?php echo e(request('date')); ?>"
            style="padding:8px; border-radius:5px; border:1px solid #ccc;">

        <button type="submit" style="
            padding:8px 15px;
            background:#28a745;
            color:white;
            border:none;
            border-radius:5px;
        ">
            Search
        </button>

        <a href="<?php echo e(url('/my-orders')); ?>" style="
            margin-left:10px;
            text-decoration:none;
            color:red;
            font-weight:bold;
        ">
            Reset
        </a>

    </form>

    
    <?php if(request('date')): ?>
        <div style="
            margin-bottom:15px;
            padding:10px;
            background:#e9f7ef;
            border-left:5px solid #28a745;
            border-radius:5px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">
            <span>
                Showing results for: 
                <b><?php echo e(\Carbon\Carbon::parse(request('date'))->format('d M Y')); ?></b>
            </span>

            <a href="<?php echo e(url('/my-orders')); ?>" style="
                color:red;
                text-decoration:none;
                font-weight:bold;
            ">
                Clear ✖
            </a>
        </div>
    <?php endif; ?>

    
    <?php if($orders->isEmpty()): ?>
        <p style="text-align:center; color:gray;">No orders found</p>
    <?php endif; ?>

    
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div style="
        background:#ffffff;
        padding:20px;
        margin-bottom:20px;
        border-radius:10px;
        box-shadow:0px 4px 10px rgba(0,0,0,0.1);
    ">

        
        <h4 style="color:#28a745;">
            <?php echo e($order->product_name); ?>

        </h4>

        
        <p><b>Order ID:</b> <?php echo e($order->id); ?></p>

        
        <p><b>Quantity:</b> <?php echo e($order->quantity); ?></p>

        
        <p>
            <b>Total Price:</b> 
            ₹<?php echo e(number_format($order->total_price, 2)); ?>

        </p>

        
        <p style="color:gray;">
            <b>Date:</b> 
            <?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A')); ?>

        </p>

        
        <?php
            $color = 'red';
            if ($order->status == 'accepted') $color = 'green';
            elseif ($order->status == 'pending') $color = 'orange';
        ?>

        <p>
            <b>Status:</b> 
            <span style="
                background: <?php echo e($color); ?>;
                color:white;
                padding:5px 10px;
                border-radius:5px;
                font-weight:bold;
            ">
                <?php echo e(ucfirst($order->status)); ?>

            </span>
        </p>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/my_orders.blade.php ENDPATH**/ ?>