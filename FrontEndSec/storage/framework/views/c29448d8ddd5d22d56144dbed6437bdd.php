<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Recipes</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .search-form { display: flex; }
        .search-form input { padding: 8px; font-size: 1rem; border: 1px solid #ccc; border-radius: 4px 0 0 4px; }
        .search-form button { padding: 8px 12px; border: 1px solid #007bff; background-color: #007bff; color: white; cursor: pointer; border-radius: 0 4px 4px 0; }
        .recipe-card { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; display: flex; align-items: center; border-radius: 4px; }
        .recipe-card img { width: 100px; height: 100px; object-fit: cover; margin-right: 15px; border-radius: 4px; }
        .recipe-card a { text-decoration: none; color: #333; font-size: 1.2rem; }
    </style>
</head>
<body>

    <div class="header">
        <h1>All Recipes</h1>

        <form action="<?php echo e(route('recipes.index')); ?>" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Cari resep..." value="<?php echo e(request('search')); ?>">
            <button type="submit">Search</button>
        </form>

    </div>

    <a href="<?php echo e(route('recipes.create')); ?>" style="display: block; margin-bottom: 20px;">+ Create New Recipe</a>

    <?php if($recipes->isEmpty()): ?>
        <p>No recipes found matching your search.</p>
    <?php else: ?>
        <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="recipe-card">
                <?php if($recipe->image_path): ?>
                    <img src="<?php echo e(asset('storage/' . $recipe->image_path)); ?>" alt="<?php echo e($recipe->title); ?>">
                <?php endif; ?>
                <div>
                    <h2><a href="<?php echo e(route('recipes.show', $recipe->id)); ?>"><?php echo e($recipe->title); ?></a></h2>
                    <p><?php echo e(Str::limit($recipe->description, 100)); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</body>
</html><?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/recipes/index.blade.php ENDPATH**/ ?>