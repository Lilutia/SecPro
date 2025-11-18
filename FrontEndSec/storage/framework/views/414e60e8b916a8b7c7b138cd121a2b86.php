<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="profile-body">

  <header class="profile-header">
    <button class="back-btn" onclick='window.location.href="<?php echo e(url("/mainpage")); ?>"'>
        <img src="<?php echo e(asset('foto/arrow1.png')); ?>" alt="back">
    </button>
    <button class="edit-btn" onclick='window.location.href="<?php echo e(url("/editprofile")); ?>"'>Edit Profile</button>
    <button class="create-btn" onclick='window.location.href="<?php echo e(url("/createpage")); ?>"'>Create +</button>
  </header>

  <div class="banner">
    <img src="<?php echo e(asset('foto/banner4.jpeg')); ?>" alt="Banner">
  </div>

  <div class="profile-pic">
    <img src="<?php echo e(asset('foto/curry.png')); ?>" alt="Foto Profile">
  </div>

  <div class="profile-info">
    <h1>Chef Curry</h1>
    <h3>@stephencurry30</h3>
    <p class="bio">
      Believer. Husband. Father. Founder. Philanthropist. Olympic Gold Medalist. NYT Best Selling Author. Philippians 4:13.
    </p>
  </div>

  <div class="food-grid">
    <div class="food-card">
      <img src="<?php echo e(asset('foto/food1.jpg')); ?>" alt="Gambar">
      <div class="card-actions">
        <button class="delete-btn" onclick="openDeletePopup()">🗑️</button>
        <button class="edit-btn-card" onclick="openEditPopup('<?php echo e(asset('foto/food1.jpg')); ?>')">🖍</button>
      </div>
      <h3>French Croissant</h3>
      <p>Roti Prancis otentik dengan tekstur renyah dan rasa mentega yang kaya, cocok untuk camilan atau sarapan.</p>
    </div>

    <div class="food-card">
      <img src="<?php echo e(asset('foto/food4.jpg')); ?>" alt="Gambar">
      <div class="card-actions">
        <button class="delete-btn" onclick="openDeletePopup()">🗑️</button>
        <button class="edit-btn-card" onclick="openEditPopup('<?php echo e(asset('foto/food4.jpg')); ?>')">🖍</button>
      </div>
      <h3>Ribeye Steak dengan Kentang Panggang</h3>
      <p>Potongan daging ribeye premium yang dimasak sempurna, disajikan dengan kentang panggang yang gurih.</p>
    </div>

    <div class="food-card">
      <img src="<?php echo e(asset('foto/food2.jpg')); ?>" alt="Gambar">
      <div class="card-actions">
        <button class="delete-btn" onclick="openDeletePopup()">🗑️</button>
        <button class="edit-btn-card" onclick="openEditPopup('<?php echo e(asset('foto/food2.jpg')); ?>')">🖍</button>
      </div>
      <h3>Korean Beef Bibimbap Bowl</h3>
      <p>Nasi campur Korea dengan irisan daging sapi, sayuran segar, dan telur, disajikan untuk diaduk bersama.</p>
    </div>

    <div class="food-card">
      <img src="<?php echo e(asset('foto/food3.jpg')); ?>" alt="Gambar">
      <div class="card-actions">
        <button class="delete-btn" onclick="openDeletePopup()">🗑️</button>
        <button class="edit-btn-card" onclick="openEditPopup('<?php echo e(asset('foto/food3.jpg')); ?>')">🖍</button>
      </div>
      <h3>Belgian Waffle</h3>
      <p>Wafel renyah dengan buah beri segar dan krim lembut, sempurna untuk sarapan mewah.</p>
    </div>
  </div>
</body>
</html>
<?php /**PATH D:\Tugas\Secpro\SecPro\FrontEndSec\resources\views/profile.blade.php ENDPATH**/ ?>