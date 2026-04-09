@extends('layouts.app')

@section('content')


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
width:350px;
padding:25px;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
backdrop-filter:blur(10px);
background:white;
}

/* title */
.login-title{
text-align:center;
font-weight:bold;
margin-bottom:20px;
color:#198754;
}
@keyframes popIn {
0%{
transform:scale(0.8);
opacity:0;
}
100%{
transform:scale(1);
opacity:1;
}
}

.login-card{
animation:popIn 0.5s ease;
}
.input-icon{
position:absolute;
top:38px;
left:12px;
font-size:14px;
color:#888;
}

.toggle-icon{
position:absolute;
right:12px;
top: 50%;

cursor:pointer;
}
/* button */
.login-btn{
background:linear-gradient(to right,#28a745,#20c997);
color:white;
font-weight:600;
border-radius:10px;
transition:0.3s;
border:none;
}

.login-btn:hover{
background:linear-gradient(to right,#28a745,#20c997);
transform:scale(1.05);
box-shadow:0 12px 25px rgba(0,0,0,0.2);
}
.form-control:focus{
    padding:10px;
    border-radius:8px;
}
.login-card{
animation: fadeIn 0.6s ease;
}
.form-control:hover{
    border-color:#28a745;
    box-shadow:0 0 8px rgba(40,167,69,0.3);
}
a{
text-decoration:none;
color:#20c997;
font-weight:500;
}

a:hover{
text-decoration:underline;
color:#198754;
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

        <h4 class="login-title">Farmer Login</h4>

        <form method="POST" action="{{ route('farmer.login.submit') }}">
        @csrf

        <!-- EMAIL -->
        <div class="mb-3 position-relative">
            <label>Email</label>
            <span class="input-icon">📧</span>
            <input type="email" name="email" class="form-control ps-5">
        </div>

        <!-- PASSWORD -->
        <div class="mb-3 position-relative">
            <label>Password</label>
            <span class="input-icon">🔒</span>

            <input type="password" id="password" name="password" class="form-control ps-5">

            <span onclick="togglePassword()" class="toggle-icon">👁️</span>
        </div>

        <!-- ✅ BUTTON INSIDE CARD -->
        <button class="btn login-btn w-100 mt-2">Login</button>

        <p class="text-center mt-2">
            <a href="{{ route('farmer.register') }}">New Farmer? Register</a>
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


@endsection