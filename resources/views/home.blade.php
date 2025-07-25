<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResepKos - Aplikasi Resep Masakan Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #667eea;
            min-height: 100vh;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #667eea;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #667eea;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
            transition: all 0.3s;
            text-align: center;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-outline {
            border: 2px solid #667eea;
            color: #667eea;
            background: transparent;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 4rem 0;
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Search & Filter */
        .search-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            margin: 2rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .search-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-input {
            flex: 1;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            min-width: 250px;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
        }

        .category-filter {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 0.5rem 1rem;
            background: #f8f9fa;
            border: 2px solid transparent;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .category-btn.active {
            background: #667eea;
            color: white;
        }

        .category-btn:hover {
            border-color: #667eea;
        }

        /* Recipe Grid */
        .recipes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
        }

        .recipe-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            cursor: pointer;
            perspective: 1000px;
        }

        .recipe-card-inner:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px rgba(0, 0, 0, 0);
        }

        .recipe-image {
            width: 100%;
            height: 200px;
            position: relative;
        }


        .recipe-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .recipe-difficulty {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .recipe-content {
            padding: 1.5rem;
        }

        .recipe-title {
            margin-top: 1rem;
            font-size: 1.3rem;
            font-weight: bold;
        }

        .recipe-meta {
            font-size: 0.9rem;
            color: #666;
            margin-top: 0.5rem;
        }

        .recipe-rating {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .stars {
            color: #ffc107;
        }

        .recipe-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .author-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }



        .rating-section {
            background: #f8f9fa;
            padding: 1.5rem;
            margin-top: 2rem;
            border-radius: 10px;
        }

        .rating-form {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .star-rating {
            display: flex;
            gap: 0.2rem;
        }

        .star {
            font-size: 1.5rem;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star:hover,
        .star.active {
            color: #ffc107;
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            transition: all 0.3s;
        }

        .fab:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .recipe-card-wrapper {
            width: 100%;
            height: 100%;
            min-height: 440px;
            position: relative;
            perspective: 1000px;
            overflow: hidden;
        }

        .recipe-card-wrapper.need-login {
            cursor: not-allowed;
            opacity: 0.9;
        }

        .recipe-card-wrapper.clickable {
            cursor: pointer;
        }


        .recipe-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .recipe-card-wrapper.flipped .recipe-card-inner {
            transform: rotateY(180deg);
        }

        .recipe-card-front,
        .recipe-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: start;
            overflow-y: auto;
        }

        .recipe-card-back {
            transform: rotateY(180deg);
        }

        .recipe-card-back p {
            font-size: 0.9rem;
            color: #444;
            margin-bottom: 0.5rem;
        }



        h2.section-title {
            text-align: center;
            color: white;
            font-size: 2rem;
            margin: 2rem 0 0;
        }


        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .search-container {
                flex-direction: column;
            }

            .search-input {
                min-width: 100%;
            }

            .recipes-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 1rem;
            }

            .comment-formse {
                text-align: center
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .recipe-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .recipe-card-front {
            animation: fadeInUp 0.6s ease-out;
        }

        .comment-form {
            margin-top: 20px;
            background: linear-gradient(135deg, #e0d5ff, #f5f3ff);
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(120, 82, 255, 0.2);
        }

        .comment-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbbbf7;
            border-radius: 8px;
            background-color: #fff;
            color: #333;
            resize: vertical;
            font-family: sans-serif;
        }

        .comment-button {
            margin-top: 10px;
            background: linear-gradient(135deg, #7b42f6, #b01eff);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .comment-button:hover {
            background: linear-gradient(135deg, #6a36db, #9014e7);
        }

        .comments-section {
            margin-top: 30px;
        }

        .comment-card {
            background-color: #ffffffdd;
            border-left: 5px solid #a56cf5;
            padding: 12px 16px;
            margin-bottom: 10px;
            border-radius: 10px;
            color: #333;
            box-shadow: 0 2px 6px rgba(160, 120, 255, 0.1);
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-utensils"></i> ResepKos
            </a>
            <ul class="nav-menu">
                <li><a href="#" class="nav-link">Beranda</a></li>
                <li><a href="#recipes" class="nav-link">Resep</a></li>
                <li><a href="#" class="nav-link">Kategori</a></li>
                <li><a href="#" class="nav-link">Favorit</a></li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-outline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.show', auth()->user()) }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <main class="main-content">
        <section class="hero">
            <div class="container">
                <h1><i class="fas fa-cooking-pot"></i> ResepKos</h1>
                <p>Kumpulan resep masakan simple dan murah untuk mahasiswa kos</p>
                <a href="#recipes" class="btn btn-primary">
                    <i class="fas fa-search"></i> Jelajahi Resep
                </a>
            </div>
        </section>

        {{-- Search & Filter Section  --}}
        <section class="search-section">
            <div class="container">
                <form action="{{ route('search') }}" method="GET" class="d-flex mb-4">
                    <input type="text" name="keyword" class="form-control me-2" placeholder="Cari resep..."
                        value="{{ request('keyword') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>  
            <div class="category-filter" style="margin-top: 1rem;">
                <button class="category-btn active" data-category="all">Semua</button>
                <button class="category-btn" data-category="nasi">🍚 Nasi</button>
                <button class="category-btn" data-category="mie">🍜 Mie</button>
                <button class="category-btn" data-category="gorengan">🍟 Gorengan</button>
                <button class="category-btn" data-category="minuman">🥤 Minuman</button>
                <button class="category-btn" data-category="cemilan">🍪 Cemilan</button>
            </div>
            
        </section>

        {{-- Recipes Section  --}}
        <section id="recipes" class="container">
            <h2 class="section-title">
                <i class="fas fa-fire"></i> Resep Populer
            </h2>

            <div class="recipes-grid">
                @foreach ($resep as $item)
                    <div class="recipe-card-wrapper {{ Auth::check() ? 'clickable' : 'need-login' }}">
                        <div class="recipe-card-inner">
                            {{-- Sisi Depan  --}}
                            <div class="recipe-card-front">
                                <div class="recipe-image">
                                    <div class="recipe-difficulty">
                                        {{ $item->kategori->nama_kategori }}
                                    </div>
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="Gambar Resep">
                                    @else
                                        <div
                                            style="width: 100%; height: 100%; background: linear-gradient(45deg, #f093fb, #f5576c); display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                                            🍽️
                                        </div>
                                    @endif
                                </div>
                                <h3 class="recipe-title">{{ $item->judul_resep }}</h3>
                                <div class="recipe-meta">
                                    <i class="fas fa-clock"></i> {{ $item->durasi }}
                                    {{ $item->level }}
                                </div>

                                <p>Rating:
                                    {{ $item->averageRating() !== null ? number_format($item->averageRating(), 1) . ' / 5' : 'Belum ada rating' }}
                                    ⭐
                                </p>
                                
                                @auth
                                    <form action="{{ route('resep.rate', $item->id) }}" method="POST"
                                        style="margin-top: 0.5rem;">
                                        @csrf
                                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                                            <label for="rating_{{ $item->id }}" style="margin: 0;">Beri
                                                rating:</label>
                                            <select name="rating" id="rating_{{ $item->id }}"
                                                class="form-select form-select-sm w-auto" required>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ optional($item->ratings->where('user_id', Auth::id())->first())->rating == $i ? 'selected' : '' }}>
                                                        {{ $i }} ⭐
                                                    </option>
                                                @endfor
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-success">Kirim</button>
                                        </div>
                                    </form>
                                @else
                                    <p><a href="{{ route('login') }}" style="text-decoration: none;">Login</a> untuk
                                        memberi rating.</p>
                                @endauth
                                <p style="font-size: 0.9rem; color: #666;">Klik untuk melihat detail resep</p>
                            </div>

                            {{-- Sisi Belakang  --}}
                            <div class="recipe-card-back">
                                <strong>Bahan:</strong>
                                <p>{!! nl2br(e($item->bahan_resep)) !!}</p>

                                <strong>Langkah:</strong>
                                <p>{!! nl2br(e($item->langkah_resep)) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
            </div>
        </section>
    </main>

    <div class="comments-section">

    </div>
    {{-- form komentar --}}
    <div class="comment-form">
        <h5>Komentar:</h5>
        @foreach (\App\Models\Comment::latest()->get() as $comment)
            <div class="comment-card">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
        @if (Auth::check())
            <form action="{{ url('/comments') }}" method="POST" class="comment-form">
                @csrf
                <textarea name="content" class="comment-textarea" rows="3" placeholder="Tulis komentar..."></textarea>
                <button type="submit" class="comment-button">Kirim</button>
            </form>
        @else
            <div class="comment-formse">
                <p <a href="{{ route('login') }}" class="btn btn-primary">Login</a> untuk menulis komentar.</p>
            </div>
        @endif
    </div>



    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.recipe-card-wrapper').forEach(card => {
            card.addEventListener('click', (e) => {
                // Cegah flip jika elemen interaktif diklik
                const tag = e.target.tagName.toLowerCase();
                const interactiveTags = ['button', 'select', 'input', 'textarea', 'label'];
                if (interactiveTags.includes(tag) || e.target.closest('.dropdown')) {
                    return;
                }

                if (card.classList.contains('need-login')) {
                    alert('Silakan login terlebih dahulu untuk melihat detail resep.');
                    window.location.href = "{{ route('login') }}";
                } else {
                    card.classList.toggle('flipped');
                }
            });
        });
    });
</script>
