

<?php $__env->startSection('content'); ?>


<style>

/* center page */
.login-container{
height:80vh;
display:flex;
justify-content:center;
align-items:center;
}

/* card */
.login-card{
width:400px;
padding:30px;
border-radius:15px;
background:rgba(255,255,255,0.95);
box-shadow:0 10px 30px rgba(0,0,0,0.15);
backdrop-filter:blur(10px);
}

/* title */
.login-title{
text-align:center;
font-weight:bold;
margin-bottom:20px;
color:#198754;
}

/* button */
.login-btn{
background:linear-gradient(to right,#28a745,#20c997);
color:white;
font-weight:bold;
border-radius:8px;
transition:0.3s;
border:none;
}

.login-btn:hover{
background:linear-gradient(to right,#28a745,#20c997);
transform:scale(1.05);
}
.form-control:focus{
    padding:10px;
    border-radius:8px;
}
.login-card{
animation: fadeIn 0.6s ease;
}

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(20px);
}
to{
opacity:1;
transform:translateY(0);
}
}
body{
background: linear-gradient(to right,#eef7f0,#f8fbff);}

input:focus{
border-color:#28a745 !important;
box-shadow:0 0 8px rgba(40,167,69,0.3) !important;
outline:none;
}

</style>
<div class="login-container">

<div class="login-card">

<h4 class="login-title"> User Login</h4>

<form method="POST" action="<?php echo e(route('user.login.submit')); ?>">
<?php echo csrf_field(); ?>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<div class="position-relative">
    <input type="password" id="password" name="password" class="form-control">

    <span onclick="togglePassword()" style="
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    font-size:18px;
    color:#555,">
    👁️
    </span>
</div>

<button class="btn login-btn w-100">Login</button>

<p class="text-center mt-2">
<a href="<?php echo e(route('user.register')); ?>">New User? Register</a>
</p>

</form>

</div>

</div>
<script>
function togglePassword(){
    let pass = document.getElementById("password");
    let icon = event.target;

    if(pass.type === "password"){
        pass.type = "text";
        icon.textContent = "🙈";
    }else{
        pass.type = "password";
        icon.textContent = "👁️";
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\agriconnect-ai\resources\views/user/login.blade.php ENDPATH**/ ?>