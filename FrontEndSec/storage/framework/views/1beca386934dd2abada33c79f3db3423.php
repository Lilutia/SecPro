<form action="<?php echo e(route('recipes.index')); ?>" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Cari Resep..." value="<?php echo e(request('search')); ?>">
    <button type="submit">
        <img src="<?php echo e(asset('foto/search.png')); ?>" alt="Search Icon">
    </button>
</form><?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/partials/search-bar.blade.php ENDPATH**/ ?>