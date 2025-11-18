<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="login-body">
    
    <div class="login-page">

        <button class="tutup-btn" onclick='window.location.href="<?php echo e(url("/")); ?>"'>✕</button>

        <h1>Registration</h1>
        
        
        <div class="mt-5">
            
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
        
        
        <form action="<?php echo e(route('registration.post')); ?>" method="POST" class="login-form">
            <?php echo csrf_field(); ?> 
            
            <input type="text" placeholder="Name" name="name" required> 
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            
            <label style="font-size: 14px; display: block; text-align: left; margin: 10px 0;">
                <input type="checkbox" required>
                I agree to the terms and conditions
            </label>

            
            <button type="submit">Register</button>
        </form>

        <div class="register">
            Already have an account? <a href="<?php echo e(url('/login')); ?>">Login</a>
        </div>
    </div>

</body>
</html><?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/registration.blade.php ENDPATH**/ ?>