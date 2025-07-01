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

    <div class="profile-container">
        <div class="profile-section">
            <div class="profile-header">
                <img src="./image/proff.png" alt="Profile Picture" class="profile-img">
                <div class="profile-info">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>Phone: {{ $profile->phone ?? '-' }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>

                </div>
            </div>
        </div>

        <div class="xpay-section">
            @if (isset($subscription) && $subscription)
                <div>
                    <h2>Paket Aktif: <span>{{ ucfirst($subscription->plan) }}</span></h2>
                    <h4>Meal Type: <span>{{ $subscription->meal_type }}</span></h4>
                    <h4>Active Until:
                        <span>{{ \Carbon\Carbon::parse($subscription->active_until)->format('d M Y') }}</span>
                    </h4>
                    <button class="block-btn1"> Give Review</button>
                    <button class="block-btn"> Pause Subscription</button>
                    <button class="block-btn-cancel">Cancel Subscription</button>
                </div>
            @else
                <p>Anda belum berlangganan paket apapun.</p>
            @endif
        </div>

        <div id="reviewModal" class="modal-confirm" style="display:none;">
            <div class="modal-confirm-content">
                <form method="POST" action="{{ route('reviews.store') }}">
                    <h2>Give Review</h2>
                    @csrf
                    <input type="text" name="name" required placeholder="Nama" class="input-name">
                    <input type="text" name="city" required placeholder="Kota" class="input-city">
                    <textarea name="review" required placeholder="Tulis review Anda..."></textarea>
                    <div class="input-rating">
                        <label>Rating⭐:</label>
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" value="{{ $i }}"> {{ $i }}
                        @endfor
                    </div>
                    <button type="submit" class="btn-submit">Kirim</button>
                </form>
            </div>
        </div>

        <!-- Modal Pause Subscription -->
        <div id="pauseModal" class="modal-confirm" style="display:none;">
            <div class="modal-confirm-content">
                <p>Apakah Anda Yakin Untuk Pause Subscription?</p>
                <div class="modal-confirm-actions">
                    <button id="btnPauseYakin" class="btn-submit">Yakin</button>
                    <button id="btnPauseCancel" class="btn-cancel">Batal</button>
                </div>
            </div>
        </div>
        <!-- Modal Resume Subscription -->
        <div id="resumeModal" class="modal-confirm" style="display:none;">
            <div class="modal-confirm-content">
                <p>Apakah Anda Yakin Untuk Resume Subscription?</p>
                <div class="modal-confirm-actions">
                    <button id="btnResumeYakin" class="btn-submit">Yakin</button>
                    <button id="btnResumeCancel" class="btn-cancel">Batal</button>
                </div>
            </div>
        </div>

        <!-- Modal Cancel Subscription -->
        <div id="cancelModal" class="modal-confirm" style="display:none;">
            <div class="modal-confirm-content">
                <p>Apakah Anda Yakin Untuk Cancel Subscription?</p>
                <div class="modal-confirm-actions">
                    <button id="btnCancelYakin" class="btn-submit">Yakin</button>
                    <button id="btnCancelCancel" class="btn-cancel">Batal</button>
                </div>
            </div>
        </div>



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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Give Review Modal
            const reviewModal = document.getElementById('reviewModal');
            const openReviewBtn = document.querySelector('.block-btn1');
            const closeReviewBtn = document.getElementById('closeReviewModal');
            if (openReviewBtn && reviewModal) {
                openReviewBtn.addEventListener('click', function() {
                    reviewModal.style.display = 'block';
                });
            }
            if (closeReviewBtn && reviewModal) {
                closeReviewBtn.addEventListener('click', function() {
                    reviewModal.style.display = 'none';
                });
            }
            if (reviewModal) {
                reviewModal.addEventListener('click', function(e) {
                    if (e.target === reviewModal) reviewModal.style.display = 'none';
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pause/Resume logic
            const pauseBtn = document.querySelector('.block-btn');
            const cancelBtn = document.querySelector('.block-btn-cancel');
            const xpaySection = document.querySelector('.xpay-section');
            const pauseModal = document.getElementById('pauseModal');
            const resumeModal = document.getElementById('resumeModal');
            let isPaused = false;

            // Pause Subscription
            if (pauseBtn && pauseModal) {
                pauseBtn.addEventListener('click', function() {
                    if (!isPaused) pauseModal.style.display = 'block';
                    else resumeModal.style.display = 'block';
                });
            }
            // Pause Modal
            document.getElementById('btnPauseYakin').onclick = function() {
                isPaused = true;
                pauseModal.style.display = 'none';
                // Ubah tampilan paket aktif
                const paketAktif = xpaySection.querySelector('h2');
                const mealType = xpaySection.querySelector('h4:nth-of-type(1)');
                const activeUntil = xpaySection.querySelector('h4:nth-of-type(2)');
                if (paketAktif) paketAktif.innerHTML +=
                    ' <span style="color:red;">(Subscription Paused)</span>';
                if (mealType) mealType.style.display = 'none';
                if (activeUntil) activeUntil.innerHTML +=
                    ' <span style="color:red;">(Subscription Paused)</span>';
                pauseBtn.textContent = 'Resume Subscription';
            };
            document.getElementById('btnPauseCancel').onclick = function() {
                pauseModal.style.display = 'none';
            };

            // Resume Modal
            document.getElementById('btnResumeYakin').onclick = function() {
                isPaused = false;
                resumeModal.style.display = 'none';
                // Kembalikan tampilan paket aktif
                const paketAktif = xpaySection.querySelector('h2');
                const mealType = xpaySection.querySelector('h4:nth-of-type(1)');
                const activeUntil = xpaySection.querySelector('h4:nth-of-type(2)');
                if (paketAktif) paketAktif.innerHTML = paketAktif.innerHTML.replace(
                    /<span.*?Subscription Paused.*?<\/span>/, '');
                if (mealType) mealType.style.display = '';
                if (activeUntil) activeUntil.innerHTML = activeUntil.innerHTML.replace(
                    /<span.*?Subscription Paused.*?<\/span>/, '');
                pauseBtn.textContent = 'Pause Subscription';
            };
            document.getElementById('btnResumeCancel').onclick = function() {
                resumeModal.style.display = 'none';
            };

            // Tutup modal jika klik di luar
            [pauseModal, resumeModal].forEach(function(modal) {
                if (modal) {
                    modal.addEventListener('click', function(e) {
                        if (e.target === modal) modal.style.display = 'none';
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelBtn = document.querySelector('.block-btn-cancel');
            const cancelModal = document.getElementById('cancelModal');
            const xpaySection = document.querySelector('.xpay-section');

            if (cancelBtn && cancelModal) {
                cancelBtn.addEventListener('click', function() {
                    cancelModal.style.display = 'block';
                });
            }
            document.getElementById('btnCancelYakin').onclick = function() {
                cancelModal.style.display = 'none';
                xpaySection.innerHTML = '<p>Anda belum berlangganan paket apapun.</p>';
            };
            document.getElementById('btnCancelCancel').onclick = function() {
                cancelModal.style.display = 'none';
            };
            if (cancelModal) {
                cancelModal.addEventListener('click', function(e) {
                    if (e.target === cancelModal) cancelModal.style.display = 'none';
                });
            }
        });
    </script>

</body>

</html>
