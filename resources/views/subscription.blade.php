<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription - SEA Catering</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/subscription.css">
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="nav-logo">SEA<span> Catering</span></a>
        <div class="navbar-nav">
            <a href="{{ route('home') }}">Home</a>
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
                    <img src="{{ Auth::user()->profile_picture ?? asset('image/proff.png') }}" class="profile-img-navbar"
                        alt="Profile">
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

    <!-- Subscription Form Section -->
    <section class="subscription-section">
        <h2>Subscribe to Your Meal Plan</h2>
        <form class="subscription-form" id="subscriptionForm" autocomplete="off" method="POST"
            action="{{ route('subscriptions.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">*Username</label>
                <input type="text" id="username" name="name" required placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="phone">*Active Phone Number</label>
                <input type="tel" id="phone" name="phone" required placeholder="08xxxxxxxxxx"
                    pattern="08[0-9]{8,12}">
            </div>
            <div class="form-group">
                <label for="plan">*Plan Selection</label>
                <select id="plan" name="plan" required>
                    <option value="">-- Select Plan --</option>
                    <option value="diet">Diet Plan – Rp30.000,00 per meal</option>
                    <option value="protein">Protein Plan – Rp40.000,00 per meal</option>
                    <option value="royal">Royal Plan – Rp60.000,00 per meal</option>
                </select>
            </div>
            <div class="form-group">
                <label>*Meal Type</label>
                <small class="hint">Select at least one meal type.</small>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="mealType[]" value="Breakfast" required> Breakfast</label>
                    <label><input type="checkbox" name="mealType[]" value="Lunch"> Lunch</label>
                    <label><input type="checkbox" name="mealType[]" value="Dinner"> Dinner</label>
                </div>
            </div>
            <div class="form-group">
                <label>*Delivery Days</label>
                <small class="hint">Select one or more days for delivery.</small>
                <div class="checkbox-group days">
                    <label><input type="checkbox" name="days[]" value="Monday" required> Monday</label>
                    <label><input type="checkbox" name="days[]" value="Tuesday"> Tuesday</label>
                    <label><input type="checkbox" name="days[]" value="Wednesday"> Wednesday</label>
                    <label><input type="checkbox" name="days[]" value="Thursday"> Thursday</label>
                    <label><input type="checkbox" name="days[]" value="Friday"> Friday</label>
                    <label><input type="checkbox" name="days[]" value="Saturday"> Saturday</label>
                    <label><input type="checkbox" name="days[]" value="Sunday"> Sunday</label>
                </div>
            </div>
            <div class="form-group">
                <label for="allergies">Allergies / Dietary Restrictions</label>
                <textarea id="allergies" name="allergies" rows="2" placeholder="List any allergies or dietary restrictions"></textarea>
            </div>
            <button type="submit" class="btn-submit">Subscribe</button>

            <div id="form-message" class="form-message"></div>
            <div id="total-price" class="form-message" style="color:#a87b18;"></div>

            <!-- Modal Konfirmasi -->
            <div id="confirmModal" class="modal-confirm">
                <div class="modal-confirm-content">
                    <p>Apakah Anda sudah yakin dengan pilihan Anda?</p>
                    <div class="modal-confirm-actions">
                        <button id="btnYakin" class="btn-submit">Yakin</button>
                        <button id="btnKembali" class="btn-cancel">Kembali</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Sukses -->
        <div id="successModal" class="modal-confirm" style="display:none;">
            <div class="modal-confirm-content">
                <p>Selamat Anda Telah Menjadi Member Kami.<br>Cek Halaman Profile Untuk Update Paket Kamu</p>
                <div class="modal-confirm-actions">
                    <button id="btnCloseSuccess" class="btn-submit">Tutup</button>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <span>&copy; 2025 SEA Catering. All rights reserved.</span>
        </div>
    </footer>

    <script>
        feather.replace();

        document.addEventListener('DOMContentLoaded', function() {
            const subscriptionForm = document.getElementById('subscriptionForm');
            const formMessage = document.getElementById('form-message');
            const totalPrice = document.getElementById('total-price');
            const modal = document.getElementById('confirmModal');
            const btnYakin = document.getElementById('btnYakin');
            const btnKembali = document.getElementById('btnKembali');
            const successModal = document.getElementById('successModal');
            const btnCloseSuccess = document.getElementById('btnCloseSuccess');

            // Pastikan modal tidak aktif saat halaman dimuat
            modal.classList.remove('active');

            // Form Validation for Subscription Form
            subscriptionForm.addEventListener('submit', function(e) {
                const mealTypes = document.querySelectorAll('input[name="mealType[]"]:checked');
                const days = document.querySelectorAll('input[name="days[]"]:checked');
                let valid = true;
                let msg = '';

                if (mealTypes.length === 0) {
                    valid = false;
                    msg += 'Please select at least one meal type.<br>';
                }
                if (days.length === 0) {
                    valid = false;
                    msg += 'Please select at least one delivery day.<br>';
                }

                if (!valid) {
                    e.preventDefault();
                    formMessage.innerHTML = msg;
                    formMessage.style.display = 'block';
                } else {
                    e.preventDefault();
                    formMessage.innerHTML = '';
                    formMessage.style.display = 'none';

                    // Show confirmation modal only after validation is successful
                    modal.classList.add('active'); // Modal aktif hanya setelah form valid
                }
            });

            // Confirm Modal Logic
            btnKembali.addEventListener('click', function() {
                modal.classList.remove('active');
            });

            btnYakin.addEventListener('click', function(e) {
                // Submit form secara normal (POST ke server)
                modal.classList.remove('active');
                subscriptionForm.submit();
            });

            // Close success modal with button
            btnCloseSuccess.addEventListener('click', function() {
                successModal.style.display = 'none';
                window.location.href = "{{ route('home') }}";
            });

            // Close success modal if clicked outside
            successModal.addEventListener('click', function(e) {
                if (e.target === successModal) {
                    successModal.style.display = 'none';
                }
            });

            // Calculate Total Price based on Plan, Meal Types, and Days
            const planPrices = {
                diet: 30000,
                protein: 40000,
                royal: 60000
            };

            function formatRupiah(angka) {
                return 'Rp' + angka.toLocaleString('id-ID');
            }

            function calculateTotalPrice() {
                const plan = document.getElementById('plan').value;
                const planPrice = planPrices[plan] || 0;
                const mealTypes = document.querySelectorAll('input[name="mealType[]"]:checked').length;
                const days = document.querySelectorAll('input[name="days[]"]:checked').length;

                if (planPrice && mealTypes && days) {
                    const total = planPrice * mealTypes * days * 4.3;
                    totalPrice.innerHTML = 'Total Price: <b>' + formatRupiah(total) + '</b>';
                    totalPrice.style.display = 'block';
                } else {
                    totalPrice.innerHTML = '';
                    totalPrice.style.display = 'none';
                }
            }

            document.getElementById('plan').addEventListener('change', calculateTotalPrice);
            document.querySelectorAll('input[name="mealType[]"]').forEach(cb => cb.addEventListener('change',
                calculateTotalPrice));
            document.querySelectorAll('input[name="days[]"]').forEach(cb => cb.addEventListener('change',
                calculateTotalPrice));

            // Close confirm modal if clicked outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
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
