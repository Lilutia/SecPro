<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="edit-page">
  <div class="edit-container">
    <div class="card">

      @if(session('success'))
        <div style="color: green; text-align: center; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('profile.update') }}" 
            method="POST" 
            enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="profile-pic">
            <img id="preview" 
                 src="{{ $user->image ? asset('storage/' . $user->image) : asset('foto/curry.png') }}" 
                 alt="Foto Profile">

            {{-- TOMBOL CHANGE: buka file picker --}}
            <button type="button" class="change-btn"
                    onclick="document.getElementById('imageInput').click()">
                Change
            </button>

            {{-- INPUT FILE DISSEMBUNYIKAN --}}
            <input type="file"
                   id="imageInput"
                   name="image"
                   accept="image/*"
                   style="display:none"
                   onchange="previewImage(event)">
        </div>

        <label for="name" style="display:block; text-align:left; margin-left: 10%; font-weight:bold;">
            Nama
        </label>
        <input type="text"
               name="name"
               class="input-text"
               placeholder="Nama"
               value="{{ old('name', $user->name) }}"
               required>

        <label for="email" style="display:block; text-align:left; margin-left: 10%; margin-top:10px; font-weight:bold;">
            Email
        </label>
        <input type="email"
               name="email"
               class="input-text"
               placeholder="Email"
               value="{{ old('email', $user->email) }}"
               required>

        <div class="action-buttons">
            <button type="button"
                    class="back-btn"
                    onclick='window.location.href="{{ route("profile") }}"'>
                Back
            </button>

            <button type="submit" class="save-btn">Save</button>
        </div>

      </form>
    </div>
  </div>

  <script>
    function previewImage(event) {
        const img = document.getElementById('preview');
        const file = event.target.files[0];
        if (file) {
            img.src = URL.createObjectURL(file);
        }
    }
  </script>
</body>
</html>
