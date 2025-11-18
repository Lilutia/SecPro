<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body class="login-body">
    <div class="login-page">
        <button class="tutup-btn" onclick='window.location.href="<?php echo e(url("/")); ?>"'>✕</button>
        
        <h1>Login</h1>

        
        <div>
            
            <?php if($errors->any()): ?>
                <div class="col-12">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>

            
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
        </div>

        
        <form action="<?php echo e(route('login.post')); ?>" method="POST" class="login-form">
            <?php echo csrf_field(); ?>
            
            
            <input type="email" placeholder="Email" name="email" required>
            
            
            <input type="password" placeholder="Password" name="password" required>

            <div class="login-options">
                
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="<?php echo e(url('/forgetpass')); ?>">Forgot Password?</a>
            </div>

            
            <button type="submit">Log in</button>
        </form>

        <div class="registration">
            <p>Don't have an account? <a href="<?php echo e(url('/registration')); ?>">Register</a></p>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/login.blade.php ENDPATH**/ ?>