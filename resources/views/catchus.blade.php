<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catch Us - SEA Catering</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Modal Login Required -->
    <div id="loginModal" class="modal-logins">
        <div class="modal-login-content">
            <p>Anda harus login terlebih dahulu.</p>
            <div class="modal-login-actions">
                <a href="{{ route('login') }}" class="btn-submit">Login</a>
                <button id="closeLoginModal" class="btn-cancel">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <div>
        <nav class="navbar">
            <a href="#" class="nav-logo">SEA<span> Catering</span></a>
            <div class="navbar-nav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#about">About Us</a>
                <a href="{{ route('meals') }}">Meal</a>
                <a href="{{ route('catchus') }}" class="active">Catch Us!</a>
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('dashboard-admin') }}">Dashboard Admin</a>
                    @else
                        @php
                            $hasSubscription = \App\Models\Subscription::where('user_id', Auth::id())
                                ->where('active_until', '>=', now())
                                ->exists();
                        @endphp
                        @if ($hasSubscription)
                            <a href="{{ route('dashboard.user') }}"
                                class="{{ request()->routeIs('dashboard.user') ? 'active' : '' }}">Dashboard</a>
                        @else
                            <a href="{{ route('subscription') }}"
                                class="{{ request()->routeIs('subscription') ? 'active' : '' }}">Subscription</a>
                        @endif
                    @endif
                @endauth

                @guest
                    <a href="#" class="btn-require-login">Subscription</a>
                @endguest
                @guest
                    <a href="{{ route('login') }}" class="login-mobile">Login</a>
                @endguest
            </div>
            @guest
                <a href="{{ route('login') }}" class="login-desktop">Login</a>
            @endguest
            @auth
                <div class="dropdown" style="margin-left: 12px;">
                    <button class="dropbtn">
                        <img src="{{ Auth::user()->profile_picture ?? asset('image/proff.png') }}"
                            class="profile-img-navbar" alt="Profile">
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                        <span>&#9662;</span>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('dashboard.user') }}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item"
                                style="background:none;border:none;cursor:pointer;">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
            <div class="extra-search">
                <a href="#" id="nav-hamburger"> <i data-feather="menu"></i></a>
            </div>
        </nav>
    </div>
    <!-- Navbar Ends -->

    <!-- Hero Start -->
    <section class="hero-contact" id="home">
        <main class="content">
            <h1>Our <span> Contact</span></h1>

        </main>
    </section>
    <!-- Hero Ends -->

    <!-- About Us -->
    <section id="about" class="about">

        <h2>Ask<span> Any</span> Question?</h2>

        <div class="row">
            <div class="about-img">
                <img src="image/prof.jpg" alt="logo">
            </div>

            <div class="content">
                <h2>Contact<span> Us</span> Now</h2>
                <h3>Brian</h3>
                <h3><span>08123456789</span></h3>
                <a class="btn-menu" href="#"><i data-feather="phone"></i> Chat Via Whatsapp</a>
            </div>
        </div>


    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <span>&copy; 2025 SEA Catering. All rights reserved.</span>
        </div>
    </footer>

    <!-- Footer Ends -->
    <!-- Icons -->
    <script>
        feather.replace();
    </script>

    <script src="js/script.js" type="text/javascript"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var path = window.location.pathname.split("/").pop();
            if (path === "") path = "index.html";
            document.querySelectorAll('.navbar-nav a').forEach(function(link) {
                if (link.getAttribute('href') === path || link.getAttribute('href') === "#" + path.split(
                        '.')[0]) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Untuk semua tombol/link dengan class btn-require-login
            document.querySelectorAll('.btn-require-login').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('loginModal').style.display = 'block';
                });
            });
            document.getElementById('closeLoginModal').addEventListener('click', function() {
                document.getElementById('loginModal').style.display = 'none';
            });
            // Tutup modal jika klik di luar kotak modal
            document.getElementById('loginModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
