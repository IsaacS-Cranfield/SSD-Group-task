<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FitLife Studios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/formStyle.css">
    <!-- Custom Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/86c3b39d83.js" crossorigin="anonymous"></script> 

</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="nav-logo"></a>
        
            <ul class='nav-links'>
                <button id="navLogin" class="btn-base theme-important nav-login">Login / Signup</button>
            </ul>
            <button id="hamburger" class="hamburger">
                <i class="fa-solid fa-bars"></i>
            </button>
        
        </nav>
    </header>
    <main>
        <section class="hero">
            <div class="hero-wrapper">
                <div class="text-box">
                    <h1>Welcome to FitLife Studios</h1>
                </div>
            </div>
        </section>
        <section class="info-section">
            <div class="container">
                <h2>About Us</h2>
                <p>
FitLife Studios is dedicated to helping you achieve your fitness goals with personalized training programs and expert guidance. 
Whether you're a beginner or a seasoned athlete, we have something for everyone. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Eligendi officia enim numquam rerum sequi veniam, iure voluptatem dignissimos ratione ipsa dolorum. 
Blanditiis eos, laboriosam sed alias sunt ullam quam culpa.
                </p>

            </div>

        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <img src="assets/images/FitLife-logo.png" alt="FitLife Logo" class="footer-logo">
                <p>Elevating your fitness journey with expert trainers and premium facilities.</p>
            </div>

            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Contact Us</h3>
                <p><i class="fa-solid fa-location-dot"></i> 123 Fitness Way, London</p>
                <p><i class="fa-solid fa-phone"></i> +44 20 1234 5678</p>
                <p><i class="fa-solid fa-envelope"></i> support@fitlife.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <!-- Current year display -->
            <p>&copy; <?php echo date("Y"); ?> FitLife Studios. All rights reserved.</p>
        </div>
    </footer>   

    <?php include 'includes/auth-modal.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>
