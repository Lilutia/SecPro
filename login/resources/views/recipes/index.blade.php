@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dapur Rasa - Home</title>

    {{-- CSS global yang dipakai mainpage --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

    {{-- Font tambahan kamu --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(180deg, #fff8f0 0%, #ffe3d0 100%);
            min-height: 100vh;
        }

        /* Grid & card styling (punyamu) */
        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 30px;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto 40px auto;
        }

        .recipe-card {
            background: linear-gradient(to right, #fffbf5, #faebd7);
            padding: 20px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
        }

        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .recipe-card img.recipe-img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            flex-shrink: 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card-content h2 {
            margin: 0 0 5px 0;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-content h2 a {
            text-decoration: none;
            color: #333;
            font-weight: 700;
        }

        .card-content p {
            font-size: 0.85rem;
            color: #555;
            line-height: 1.5;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            padding-right: 40px;
        }

        .action-buttons {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .btn-circle {
            width: 32px;
            height: 32px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.15s ease;
            font-size: 14px;
        }

        .btn-circle:hover {
            transform: scale(1.1);
            background: #fffdf9;
        }

        .btn-edit { color: #f39c12; }
        .btn-trash { color: #e74c3c; }

        @media (max-width: 900px) {
            .recipe-grid { grid-template-columns: 1fr; padding: 20px; }
        }
    </style>
</head>
<body class="index-body">

    {{-- HEADER SAMA PERSIS DENGAN MAINPAGE --}}
    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">
        <div class="right-side">
            @include('partials.search-bar')
            <button class="profile-btn" onclick="window.location.href='{{ route('profile') }}'">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="{{ route('mainpage') }}" class="active">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </div>

    {{-- LIST RESEP PAKAI DESAIN BARU --}}
    <div class="recipe-grid">
        @if ($recipes->isEmpty())
            <p style="grid-column: 1/-1; text-align: center; color: #666;">
                No recipes found matching your search.
            </p>
        @else
            @foreach ($recipes as $recipe)
                <div class="recipe-card">
                    @if($recipe->image_path)
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-img">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No Image" class="recipe-img">
                    @endif

                    <div class="card-content">
                        <h2>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="card-link">
                                {{ $recipe->title }}
                            </a>
                        </h2>
                        <p>{{ Str::limit($recipe->description, 120) }}</p>
                    </div>

                    @if(auth()->check() && (auth()->id() === $recipe->user_id || auth()->id() === 1 || strtolower(auth()->user()->usertype) === 'admin'))
                        <div class="action-buttons">
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn-circle btn-edit" title="Edit Recipe">
                                ✏️
                            </a>

                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Delete this recipe?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-circle btn-trash" title="Delete Recipe">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>

</body>
</html>
