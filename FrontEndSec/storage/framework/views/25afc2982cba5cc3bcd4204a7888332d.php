<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Create Recipe</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/create_page_styles.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"> 
</head>
<body class="create-page-body">

    <header class="create-navbar">
        <div class="logo">Dapur Rasa</div>
        
        <button class="create-btn" type="button" onclick="document.getElementById('recipe-form-id').submit();">
            Create +
        </button>
    </header>

    <main class="create-container">
        
        <div class="back-link">
            <button type="button" onclick="window.location.href='<?php echo e(url()->previous()); ?>'">
                &larr; Back
            </button>
        </div>

        <form class="recipe-form" id="recipe-form-id" action="<?php echo e(route('recipes.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> 
            <div class="upload-column">
                <label for="recipe-file" class="file-upload-box">
                    <span class="plus-icon">+</span>
                    <span class="choose-text">Choose a file</span>
                </label>
                <input type="file" id="recipe-file" name="recipeImage" accept="image/*" required>
                <?php $__errorArgs = ['recipeImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color: red; font-size: 0.8rem;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="input-column">
                
                <label for="recipe-title">Add a title</label>
                <input type="text" id="recipe-title" name="title" value="<?php echo e(old('title')); ?>" required>
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color: red; font-size: 0.8rem;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="recipe-description">Description</label>
                <textarea id="recipe-description" name="description" rows="3" required><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color: red; font-size: 0.8rem;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="recipe-resep">Resep</label>
                <textarea id="recipe-resep" name="ingredients" rows="5" required><?php echo e(old('ingredients')); ?></textarea>
                <?php $__errorArgs = ['ingredients'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color: red; font-size: 0.8rem;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="recipe-langkah">Langkah-langkah</label>
                <textarea id="recipe-langkah" name="steps" rows="6" required><?php echo e(old('steps')); ?></textarea>
                <?php $__errorArgs = ['steps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span style="color: red; font-size: 0.8rem;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
            </div>
            
        </form>
    </main>

    <script src="<?php echo e(asset('js/image-preview.js')); ?>"></script>
</body>
</html><?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/recipes/create.blade.php ENDPATH**/ ?>