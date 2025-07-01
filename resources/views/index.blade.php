<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEA Catering</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <a href="{{ route('home') }}" class="active">Home</a>
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

    <!-- Hero Start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Healthy <span> Meals</span></h1>
            <h1>Anytime <span>Anywhere</span></h1>
            <h5>Customizable Healthy Meal Service with Delivery all Across <span>Indonesia</span></h5>
            <button class="cta btn-require-login">Subscribe Now</button>
        </main>
    </section>
    <!-- Hero Ends -->

    <!-- About Us -->
    <section id="about" class="about">
        <h2>About<span> Us</span> !</h2>

        <div class="row">
            <div class="about-img">
                <img src="image/logos.png" alt="logo">
            </div>

            <div class="content">
                <h3>Who is<span> SEA</span> Catering?</h3>
                <p>SEA Catering merupakan solusi dietmu dengan mengkombinasikan cita rasa resep yang nikmat dan
                    dipadukan dengan
                    nutrisi yang diperlukan oleh tubuh kamu.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="catering-wrapper">
                <div class="content">
                    <h3>Why <span>SEA</span> Catering?</h3>

                </div>
                <div class="card-container">
                    <div class="card custom-card">
                        <img src="./image/meal/meal1.jpg" class="card-img-top" alt="Weight Loss Program" width="300"
                            height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Pilihan Ada di Tangan Anda</h5>
                            <p class="card-desc">Paket makan kami sepenuhnya bisa disesuaikan, memungkinkan Anda memilih
                                hidangan yang sesuai kebutuhan diet Anda</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>

                    <div class="card custom-card">
                        <img src="{{ asset('image/meal/meal18.jpg') }}" class="card-img-top" alt="Weight Loss Program"
                            width="300" height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Pengiriman Seluruh Indonesia</h5>
                            <p class="card-desc">Kami siap mengantar makanan segar dan sehat ke kota-kota besar dan
                                daerah lainnya di seluruh Indonesia.</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>

                    <div class="card custom-card">
                        <img src="./image/meal/meal3.jpg" class="card-img-top" alt="Weight Loss Program" width="300"
                            height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Nutrisi Jelas dan Tepat</h5>
                            <p class="card-desc">Setiap hidangan dilengkapi informasi nutrisi lengkap, dengan hal
                                tersebut Anda dapat membuat pilihan cerdas dan memantau kemajuan Anda</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>

                    <div class="card custom-card">
                        <img src="./image/meal/meal4.jpg" class="card-img-top" alt="Weight Loss Program"
                            width="300" height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Kemudahan Tanpa Batas</h5>
                            <p class="card-desc">Hemat waktu memasak, lebih banyak waktu untuk menikmati hidup! Kami
                                urus semua persiapan makanan, jadi Anda bisa menikmati pola makan sehat tanpa repot</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Ends-->

    <!-- Menu Section -->
    <section id="menu" class="menu">
        <h2>Best<span> Meal</span> Plans</h2>
        <p>Our Best Deal That You Can Choose</p>
        <div class="btn-menu-wrapper">
            <a class="btn-menu" href="meals.html">See Another Deals</a>
        </div>
        <div class="menu-row">
            <div class="menu-catering-wrapper">
                <div class="menu-card-container">
                    <div class="menu-card custom-card">
                        <img src="./image/meal/meal5.webp" class="card-img-top" alt="Weight Loss Program"
                            width="300" height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Weight Loss Program</h5>
                            <p class="card-desc">Program Menurunkan Berat Badan Melalui Makanan Sehat Bergizi</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>

                    <div class="menu-card custom-card">
                        <img src="./image/meal/meal12.webp" class="card-img-top" alt="Weight Loss Program"
                            width="300" height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Weight Loss Protein + Program</h5>
                            <p class="card-desc">Fast Track Untuk Menurunkan Berat Badan Secara Optimal</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>

                    <div class="menu-card custom-card">
                        <img src="./image/meal/meal11.webp" class="card-img-top" alt="Weight Loss Program"
                            width="300" height="200" style="border-radius: 16px 16px 0 0;">
                        <div class="card-body">
                            <h5 class="card-title">Weigh Loss Pro</h5>
                            <p class="card-desc">Program Penurunan Berat Badan + Coaching Mentor</p>
                            <a href="#" class="btn-see-more">SEE MORE</a>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </section>
    <!-- Menu Section Ends-->

    <!-- Customer Review Section -->
    <section id="review" class="review">
        <h2>⭐Customer<span> Reviews</span>⭐</h2>
        <div class="review-container" id="reviewContainer">
            <div class="review-card">
                <div class="review-text">"Makanannya enak, sehat, dan pengirimannya selalu tepat waktu. Sangat membantu
                    program diet saya!"</div>
                <div class="review-author">- Rina, Surabaya</div>
            </div>
            <div class="review-card">
                <div class="review-text">"Pilihan menu variatif, pelayanan ramah, dan hasil diet terasa nyata.
                    Recommended!"</div>
                <div class="review-author">- Andi, Jakarta</div>
            </div>
            <div class="review-card">
                <div class="review-text">"Saya suka karena bisa request menu sesuai kebutuhan. Cocok untuk yang sibuk
                    tapi ingin sehat."</div>
                <div class="review-author">- Sari, Bandung</div>
            </div>
        </div>

        <form class="review-form" id="reviewForm" autocomplete="off" method="POST">
            @csrf
            <!-- Username -->
            <div class="form-group">
                <h2>Your Review</h2>
                <small>Give us your review and rating for us</small>
            </div>

            <div class="form-review-group">
                <label for="name">Name</label>
                <input type="text" id="review-name" name="name" required placeholder="Name">
            </div>
            <!-- City -->
            <div class="form-review-group">
                <label for="city">City</label>
                <input type="text" id="review-city" name="city" required placeholder="City">
            </div>
            <!-- Review Input -->
            <div class="form-review-group">
                <label for="review">Input Review</label>
                <textarea id="review-text" name="review" rows="2" placeholder="Your Honest Review" required></textarea>
            </div>
            <!-- Rating -->
            <div class="form-review-group">
                <label>Rating:</label>
                <div class="stars">
                    <input type="radio" name="rating" id="star5" value="5">
                    <label for="star5" class="star">&#9733;</label>
                    <input type="radio" name="rating" id="star4" value="4">
                    <label for="star4" class="star">&#9733;</label>
                    <input type="radio" name="rating" id="star3" value="3">
                    <label for="star3" class="star">&#9733;</label>
                    <input type="radio" name="rating" id="star2" value="2">
                    <label for="star2" class="star">&#9733;</label>
                    <input type="radio" name="rating" id="star1" value="1">
                    <label for="star1" class="star">&#9733;</label>
                </div>
            </div>
            <!-- Publish Button -->
            <button type="submit" class="btn-login">Publish</button>
        </form>
        <div id="review-message" class="form-message"></div>
        <!-- Modal Konfirmasi Review -->
        <!-- Modal Konfirmasi Review -->
        <div id="confirmationModal" class="modal"
            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4);">
            <div id="modalContent"
                style="background:black !important; color:#a87b18; margin:10% auto; padding:30px 20px; border-radius:8px; width:90%; max-width:350px; text-align:center; position:relative;">
                <span id="closeModal"
                    style="position:absolute; top:10px; right:20px; font-size:22px; cursor:pointer; color:#222;">&times;</span>
                <h3>Review Berhasil!</h3>
                <p>Terima kasih atas review Anda.</p>
            </div>
        </div>

    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact">

        <h2>Catch<span> Us</span> !</h2>
        <p>Need Information? You can come to our office or contact us via phone or email. We are always happy to
            help
            you!</p>
        </p>

        <div class="row">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25766531323!2d112.63028122365776!3d-7.275441716448917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1750664751754!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map">
                </iframe>
            </div>
            <!-- <div class="contact"> -->
            <div class="contact-person">
                <h2>Contact Person</h2>
                <h3>Brian</h3>
                <h3>08123456789</h3>
            </div>
        </div>

        </div>
    </section>
    <!-- Contact Section Ends -->

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

    <script src="{{ asset('js/script.js') }}"></script>

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
            const reviewForm = document.getElementById('reviewForm');
            const reviewMessage = document.getElementById('review-message');
            const confirmationModal = document.getElementById('confirmationModal');
            const closeModal = document.getElementById('closeModal');
            const reviewContainer = document.getElementById('reviewContainer');

            if (reviewForm) {
                reviewForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(reviewForm);

                    fetch("{{ route('reviews.store') }}", {
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) return response.json().then(err => Promise.reject(err));
                            return response.json();
                        })
                        .then(data => {
                            reviewMessage.innerHTML = '';
                            // Tampilkan modal
                            confirmationModal.style.display = 'block';
                            // Tambahkan review baru ke reviewContainer
                            const name = reviewForm.querySelector('[name="name"]').value;
                            const city = reviewForm.querySelector('[name="city"]').value;
                            const reviewText = reviewForm.querySelector('[name="review"]').value;
                            const rating = reviewForm.querySelector('[name="rating"]:checked') ?
                                reviewForm.querySelector('[name="rating"]:checked').value : '';
                            let stars = '';
                            for (let i = 0; i < rating; i++) stars += '⭐';

                            const newCard = document.createElement('div');
                            newCard.className = 'review-card';
                            newCard.innerHTML = `
                            <div class="review-text">"${reviewText}"</div>
                            <div class="review-author">- ${name}, ${city} ${stars}</div>
                        `;
                            // Sisipkan review baru di paling atas
                            reviewContainer.insertBefore(newCard, reviewContainer.firstChild);

                            reviewForm.reset();
                        })
                        .catch(error => {
                            if (error.errors) {
                                reviewMessage.innerHTML = Object.values(error.errors).join('<br>');
                            } else {
                                reviewMessage.innerHTML = 'Terjadi kesalahan. Silakan coba lagi.';
                            }
                            reviewMessage.style.display = 'block';
                        });
                });
            }

            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    confirmationModal.style.display = 'none';
                });
            }

            // Tutup modal jika klik di luar kotak modal
            confirmationModal.addEventListener('click', function(e) {
                if (e.target === confirmationModal) {
                    confirmationModal.style.display = 'none';
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
