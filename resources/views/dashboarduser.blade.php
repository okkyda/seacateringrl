<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahsboard - SEA Catering</title>
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
    <!-- Navbar -->
    <div>
        <nav class="navbar">
            <a href="#" class="nav-logo">SEA<span> Catering</span></a>
            <div class="navbar-nav">
                <a href="{{ route('home') }}"">Home</a>
                <a href="{{ route('home') }}#about">About Us</a>
                <a href="{{ route('meals') }}">Meal</a>
                <a href="{{ route('catchus') }}">Catch Us!</a>
                @auth
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
                        <img src="{{ Auth::user()->profile_picture ?? asset('image/prof.jpg') }}"
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

    <div class="profile-container">
        <div class="profile-section">
            <div class="profile-header">
                <img src="./image/prof.jpg" alt="Profile Picture" class="profile-img">
                <div class="profile-info">
                    <h2>Sami Rahman</h2>
                    <p>Phone: +1 864-565-595-1236</p>
                    <p>Email: sami.rahman002@gmail.com</p>
                    <button class="save-btn">Save</button>
                </div>
            </div>
        </div>

        <div class="xpay-section">
            @if (isset($subscription) && $subscription)
                <div>
                    <h3>Paket Aktif: {{ ucfirst($subscription->plan) }}</h3>
                    <p>Meal Type: {{ $subscription->meal_type }}</p>
                    <p>Active Until: {{ \Carbon\Carbon::parse($subscription->active_until)->format('d M Y') }}</p>
                </div>
            @else
                <p>Anda belum berlangganan paket apapun.</p>
            @endif
        </div>

        {{-- <div class="bills-section">
            <h3>My Meals</h3>
            <div class="bill">
                <p>Phone bill</p>
                <p>Phone bill</p>
                <p>Phone bill</p>
                <p>Phone bill</p>
                <p>Phone bill</p>
                <span class="status paid">Paid</span>
            </div>
        </div> --}}

    </div>

    <footer class="footer">
        <div class="footer-content">
            <span>&copy; 2025 SEA Catering. All rights reserved.</span>
        </div>
    </footer>



    <script>
        feather.replace();
    </script>
    <script src="js/script.js" type="text/javascript"></script>

</body>

</html>
