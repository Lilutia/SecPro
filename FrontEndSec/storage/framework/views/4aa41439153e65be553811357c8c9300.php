<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - <?php echo e($recipe->title); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('css/detail_resep_styles.css')); ?>"> 
</head>
<body class="detail-page-body">

    <header class="navbar">
    <img src="<?php echo e(asset('foto/logokecil.png')); ?>" alt="Logo Dapur Rasa" class="logo">

    <div class="right-side">
        
        <?php echo $__env->make('partials.search-bar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <button class="profile-btn" onclick="window.location.href='#'">
            <img src="<?php echo e(asset('foto/logoprofile.png')); ?>" alt="Profile Icon">
        </button>
    </div>
</header>

    <main class="recipe-detail-container">
        
        <div class="image-column">
            <img src="<?php echo e(asset('storage/' . $recipe->image_path)); ?>" alt="<?php echo e($recipe->title); ?>" class="recipe-image">
            
            <div class="gradient-area">
                <button class="back-btn" onclick="history.back()">
                    &larr; Back
                </button>
            </div>
        </div>

        <div class="content-column">
            
            <h1 class="recipe-title"><?php echo e($recipe->title); ?></h1>
            
            <p class="recipe-description">
                <?php echo e($recipe->description); ?>

            </p>
            
            <section class="ingredients-section">
                <h2>Resep:</h2>
                <div class="ingredients-list">
                    <?php echo nl2br(e($recipe->ingredients)); ?>

                </div>
            </section>
            
            <section class="steps-section">
                <h2>Langkah-langkah:</h2>
                <div class="steps-content">
                    <?php echo nl2br(e($recipe->steps)); ?>

                </div>
            </section>

        </div>
    </main>

</body>
</html><?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/recipes/show.blade.php ENDPATH**/ ?>