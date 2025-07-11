<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #333;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
}

/* Navbar */
.navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 1rem 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
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

/* Buttons */
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
    background: linear-gradient(45deg, #667eea, #764ba2);
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

/* Hero */
.main-content {
    margin-top: 80px;
    min-height: calc(100vh - 80px);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.hero {
    text-align: center;
    padding: 4rem 0;
    color: white;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

/* Search Section */
.search-section {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    margin: 2rem 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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

/*  Grid */
.s-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
}

.-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s;
    cursor: pointer;
}

.-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.-image {
    width: 100%;
    height: 200px;
    position: relative;
    overflow: hidden;
}

.-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.-difficulty {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 15px;
    font-size: 0.8rem;
}

.-content {
    padding: 1.5rem;
}

.-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    color: #333;
}

.-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem 0;
    font-size: 0.9rem;
    color: #666;
}

.-rating {
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.stars {
    color: #ffc107;
}

.-author {
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

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.8);
    z-index: 2000;
    overflow-y: auto;
}

.modal-content {
    background: white;
    max-width: 800px;
    margin: 2rem auto;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
}

.modal-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 10;
}

.modal-image {
    width: 100%;
    height: 300px;
}

.modal-body {
    padding: 2rem;
}

/* Rating Section */
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

/* FAB */
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

/* Responsive */
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

    .s-grid {
        grid-template-columns: 1fr;
    }

    .container {
        padding: 1rem;
    }
}

/* Animation */
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

.-card {
    animation: fadeInUp 0.6s ease-out;
}  </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <ul class="navbar-nav me-auto">

                            

                        </ul>

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Menu berdasarkan Role -->
                        @auth
                        @if(Auth::user()->role->name === 'admin')
                            <!-- Menu Admin -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resep.index') }}">Resep</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                            </li>
                        @else

                            <!-- Menu User -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resep.index') }}">Resep</a>
                            </li>

                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            let table = new DataTable('#data-table');
        });
    </script>
</body>
</html>