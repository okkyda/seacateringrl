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

    <!-- Navbar -->
    <div>
        <nav class="navbar">
            <a href="#" class="nav-logo">SEA<span> Catering</span></a>
            <div class="navbar-nav">
                 <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('home') }}#about">About Us</a>
            <a href="{{ route('meals') }}">Meal</a>
            <a href="{{ route('catchus') }}" class="active">Catch Us!</a>
            <a href="{{ route('subscription') }}" >Subscription</a>
            <a href="{{ route('login') }}" class="login-mobile">Login</a>
            </div>
            <a href="{{ route('login') }}" class="login-desktop">Login</a>
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
        if(link.getAttribute('href') === path || link.getAttribute('href') === "#" + path.split('.')[0]) {
            link.classList.add('active');
        }
    });
});
</script>
</body>

</html>
