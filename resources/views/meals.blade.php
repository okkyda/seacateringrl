<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEA Catering - Meal Plans</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>

    <!-- Hero Start -->
    <section class="hero-meal" id="home">
        <main class="content">
            <h1>Our <span> Meals</span></h1>
        </main>
    </section>
    <!-- Hero Ends -->

    <!-- Navbar -->
    <div>
        <nav class="navbar">
            <a href="#" class="nav-logo">SEA<span> Catering</span></a>
            <div class="navbar-nav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#about">About Us</a>
                <a href="{{ route('meals') }}" class="active">Meal</a>
                <a href="{{ route('catchus') }}">Catch Us!</a>
                <a href="{{ route('subscription') }}">Subscription</a>
                <a href="{{ route('login') }}" class="login-mobile">Login</a>
            </div>
            <a href="{{ route('login') }}" class="login-desktop">Login</a>
            <div class="extra-search">
                <a href="#" id="nav-hamburger"> <i data-feather="menu"></i></a>
            </div>
        </nav>
    </div>
    <!-- Navbar Ends -->
    <section class="meal-section">
        <h2>Our Meal Plans</h2>
        <div class="meals">
            <h2>1. Weight Loss Program</h2>
            <button class="btn-subs" data-modal="modal1" onclick="window.location.href='subscription.html';">Pilih
                Program Ini</button>

        </div>
        <div class="meal-cards">

            <!-- Card 1 -->
            <div class="meal-card">
                <img src="image/meal/meal5.webp" alt="Weight Loss Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Program</div>
                        <div class="meal-card-price">Rp 350.000 / week</div>
                        <div class="meal-card-desc">Program diet sehat untuk menurunkan berat badan dengan menu seimbang
                            dan kalori terkontrol.</div>
                    </div>
                    <button class="btn-details" data-modal="modal1">See More Details</button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="meal-card">
                <img src="image/meal/meal12.webp" alt="Protein Plus Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Protein+ Program</div>
                        <div class="meal-card-price">Rp 420.000 / week</div>
                        <div class="meal-card-desc">Paket diet tinggi protein untuk hasil penurunan berat badan lebih
                            cepat dan tetap sehat.</div>
                    </div>
                    <button class="btn-details" data-modal="modal2">See More Details</button>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="meal-card">
                <img src="image/meal/meal11.webp" alt="Weight Loss Pro">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Pro</div>
                        <div class="meal-card-price">Rp 550.000 / week</div>
                        <div class="meal-card-desc">Program penurunan berat badan dengan coaching mentor dan monitoring
                            progress mingguan.</div>
                    </div>
                    <button class="btn-details" data-modal="modal3">See More Details</button>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="meal-card">
                <img src="image/meal/meal3.jpg" alt="Muscle Gain Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Muscle Gain Program</div>
                        <div class="meal-card-price">Rp 480.000 / week</div>
                        <div class="meal-card-desc">Menu tinggi protein dan kalori untuk membantu pembentukan otot
                            secara optimal.</div>
                    </div>
                    <button class="btn-details" data-modal="modal4">See More Details</button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="meal-card">
                <img src="image/meal/meal3.jpg" alt="Muscle Gain Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Muscle Gain Program</div>
                        <div class="meal-card-price">Rp 480.000 / week</div>
                        <div class="meal-card-desc">Menu tinggi protein dan kalori untuk membantu pembentukan otot
                            secara optimal.</div>
                    </div>
                    <button class="btn-details" data-modal="modal4">See More Details</button>
                </div>
            </div>
        </div>

        <div class="meals">
            <h2>2. Weight Loss Program</h2>
            <button class="btn-subs" data-modal="modal1" onclick="window.location.href='subscription.html';">Pilih
                Program Ini</button>
        </div>
        <div class="meal-cards">

            <!-- Card 1 -->
            <div class="meal-card">
                <img src="image/meal/meal5.webp" alt="Weight Loss Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Program</div>
                        <div class="meal-card-price">Rp 350.000 / week</div>
                        <div class="meal-card-desc">Program diet sehat untuk menurunkan berat badan dengan menu seimbang
                            dan kalori terkontrol.</div>
                    </div>
                    <button class="btn-details" data-modal="modal1">See More Details</button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="meal-card">
                <img src="image/meal/meal12.webp" alt="Protein Plus Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Protein+ Program</div>
                        <div class="meal-card-price">Rp 420.000 / week</div>
                        <div class="meal-card-desc">Paket diet tinggi protein untuk hasil penurunan berat badan lebih
                            cepat dan tetap sehat.</div>
                    </div>
                    <button class="btn-details" data-modal="modal2">See More Details</button>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="meal-card">
                <img src="image/meal/meal11.webp" alt="Weight Loss Pro">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Pro</div>
                        <div class="meal-card-price">Rp 550.000 / week</div>
                        <div class="meal-card-desc">Program penurunan berat badan dengan coaching mentor dan monitoring
                            progress mingguan.</div>
                    </div>
                    <button class="btn-details" data-modal="modal3">See More Details</button>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="meal-card">
                <img src="image/meal/meal3.jpg" alt="Muscle Gain Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Muscle Gain Program</div>
                        <div class="meal-card-price">Rp 480.000 / week</div>
                        <div class="meal-card-desc">Menu tinggi protein dan kalori untuk membantu pembentukan otot
                            secara optimal.</div>
                    </div>
                    <button class="btn-details" data-modal="modal4">See More Details</button>
                </div>
            </div>
        </div>

        <div class="meals">
            <h2>3. Weight Loss Program</h2>
            <button class="btn-subs" data-modal="modal1" onclick="window.location.href='subscription.html';">Pilih
                Program Ini</button>
        </div>
        <div class="meal-cards">

            <!-- Card 1 -->
            <div class="meal-card">
                <img src="image/meal/meal5.webp" alt="Weight Loss Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Program</div>
                        <div class="meal-card-price">Rp 350.000 / week</div>
                        <div class="meal-card-desc">Program diet sehat untuk menurunkan berat badan dengan menu
                            seimbang
                            dan kalori terkontrol.</div>
                    </div>
                    <button class="btn-details" data-modal="modal1">See More Details</button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="meal-card">
                <img src="image/meal/meal12.webp" alt="Protein Plus Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Protein+ Program</div>
                        <div class="meal-card-price">Rp 420.000 / week</div>
                        <div class="meal-card-desc">Paket diet tinggi protein untuk hasil penurunan berat badan lebih
                            cepat dan tetap sehat.</div>
                    </div>
                    <button class="btn-details" data-modal="modal2">See More Details</button>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="meal-card">
                <img src="image/meal/meal11.webp" alt="Weight Loss Pro">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Pro</div>
                        <div class="meal-card-price">Rp 550.000 / week</div>
                        <div class="meal-card-desc">Program penurunan berat badan dengan coaching mentor dan monitoring
                            progress mingguan.</div>
                    </div>
                    <button class="btn-details" data-modal="modal3">See More Details</button>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="meal-card">
                <img src="image/meal/meal3.jpg" alt="Muscle Gain Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Muscle Gain Program</div>
                        <div class="meal-card-price">Rp 480.000 / week</div>
                        <div class="meal-card-desc">Menu tinggi protein dan kalori untuk membantu pembentukan otot
                            secara optimal.</div>
                    </div>
                    <button class="btn-details" data-modal="modal4">See More Details</button>
                </div>
            </div>
        </div>

        <div class="meals">
            <h2>4. Weight Loss Program</h2>
            <button class="btn-subs" data-modal="modal1" onclick="window.location.href='subscription.html';">Pilih
                Program Ini</button>
        </div>
        <div class="meal-cards">

            <!-- Card 1 -->
            <div class="meal-card">
                <img src="image/meal/meal5.webp" alt="Weight Loss Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Program</div>
                        <div class="meal-card-price">Rp 350.000 / week</div>
                        <div class="meal-card-desc">Program diet sehat untuk menurunkan berat badan dengan menu
                            seimbang
                            dan kalori terkontrol.</div>
                    </div>
                    <button class="btn-details" data-modal="modal1">See More Details</button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="meal-card">
                <img src="image/meal/meal12.webp" alt="Protein Plus Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Protein+ Program</div>
                        <div class="meal-card-price">Rp 420.000 / week</div>
                        <div class="meal-card-desc">Paket diet tinggi protein untuk hasil penurunan berat badan lebih
                            cepat dan tetap sehat.</div>
                    </div>
                    <button class="btn-details" data-modal="modal2">See More Details</button>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="meal-card">
                <img src="image/meal/meal11.webp" alt="Weight Loss Pro">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Weight Loss Pro</div>
                        <div class="meal-card-price">Rp 550.000 / week</div>
                        <div class="meal-card-desc">Program penurunan berat badan dengan coaching mentor dan monitoring
                            progress mingguan.</div>
                    </div>
                    <button class="btn-details" data-modal="modal3">See More Details</button>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="meal-card">
                <img src="image/meal/meal3.jpg" alt="Muscle Gain Program">
                <div class="meal-card-body">
                    <div>
                        <div class="meal-card-title">Muscle Gain Program</div>
                        <div class="meal-card-price">Rp 480.000 / week</div>
                        <div class="meal-card-desc">Menu tinggi protein dan kalori untuk membantu pembentukan otot
                            secara optimal.</div>
                    </div>
                    <button class="btn-details" data-modal="modal4">See More Details</button>
                </div>
            </div>
        </div>


    </section>
    <!-- Modal 1 -->
    <div class="modal" id="modal1">
        <div class="modal-content">
            <button class="modal-close" aria-label="Close">&times;</button>
            <div class="modal-title">Weight Loss Program</div>
            <div class="modal-price">Rp 350.000 / week</div>
            <div class="modal-desc">
                Program diet sehat untuk menurunkan berat badan dengan menu seimbang dan kalori terkontrol.<br><br>
                <span class="modal-extra">Termasuk:</span>
                <ul>
                    <li>3x makan per hari (sarapan, makan siang, makan malam)</li>
                    <li>Menu bervariasi setiap hari</li>
                    <li>Free konsultasi gizi</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal" id="modal2">
        <div class="modal-content">
            <button class="modal-close" aria-label="Close">&times;</button>
            <div class="modal-title">Weight Loss Protein+ Program</div>
            <div class="modal-price">Rp 420.000 / week</div>
            <div class="modal-desc">
                Paket diet tinggi protein untuk hasil penurunan berat badan lebih cepat dan tetap sehat.<br><br>
                <span class="modal-extra">Termasuk:</span>
                <ul>
                    <li>3x makan per hari + snack protein</li>
                    <li>Menu tinggi protein, rendah lemak</li>
                    <li>Free konsultasi gizi & progress report</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal 3 -->
    <div class="modal" id="modal3">
        <div class="modal-content">
            <button class="modal-close" aria-label="Close">&times;</button>
            <div class="modal-title">Weight Loss Pro</div>
            <div class="modal-price">Rp 550.000 / week</div>
            <div class="modal-desc">
                Program penurunan berat badan dengan coaching mentor dan monitoring progress mingguan.<br><br>
                <span class="modal-extra">Termasuk:</span>
                <ul>
                    <li>3x makan per hari</li>
                    <li>Coaching mentor & weekly check-in</li>
                    <li>Free konsultasi gizi & progress report</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal 4 -->
    <div class="modal" id="modal4">
        <div class="modal-content">
            <button class="modal-close" aria-label="Close">&times;</button>
            <div class="modal-title">Muscle Gain Program</div>
            <div class="modal-price">Rp 480.000 / week</div>
            <div class="modal-desc">
                Menu tinggi protein dan kalori untuk membantu pembentukan otot secara optimal.<br><br>
                <span class="modal-extra">Termasuk:</span>
                <ul>
                    <li>3x makan per hari + snack protein</li>
                    <li>Menu tinggi protein & karbohidrat</li>
                    <li>Free konsultasi gizi & progress report</li>
                </ul>
            </div>
        </div>
    </div>

    <section id="review" class="review">
        <h2>⭐Customer<span> Reviews</span>⭐</h2>
        <div class="review-container">
            <div class="review-card">
                <div class="review-text">"Makanannya enak, sehat, dan pengirimannya selalu tepat waktu. Sangat
                    membantu program diet saya!"</div>
                <div class="review-author">- Rina, Surabaya</div>
            </div>
            <div class="review-card">
                <div class="review-text">"Pilihan menu variatif, pelayanan ramah, dan hasil diet terasa nyata.
                    Recommended!"</div>
                <div class="review-author">- Andi, Jakarta</div>
            </div>
            <div class="review-card">
                <div class="review-text">"Saya suka karena bisa request menu sesuai kebutuhan. Cocok untuk yang
                    sibuk tapi ingin sehat."</div>
                <div class="review-author">- Sari, Bandung</div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">

        <h2>Catch<span> Us</span> !</h2>
        <p>Need Information? You can come to our office or contact us via phone or email. We are always happy to
            help you!</p>
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

    <footer class="footer">
        <div class="footer-content">
            <span>&copy; 2025 SEA Catering. All rights reserved.</span>
        </div>
    </footer>

    <!-- Icons -->
    <script>
        feather.replace();
    </script>

    <script src="js/script.js" type="text/javascript"></script>




</body>

</html>
