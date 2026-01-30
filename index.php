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
    <nav>
        <a href="index.php" class="nav-logo"></a>
        
        <ul class='nav-links'>
            <button id="navLogin" class="navLogin">Login/Signup</button>
        </ul>

        <button id="hamburger" class="hamburger">
            <i class="fa-solid fa-bars"></i>
        </button>
        
    </nav>
    <main>
        <section class="hero">
            <div class="wrapper">
                <div class="text-box">
                    <h1>Welcome to FitLife Studios</h1>
                </div>
            </div>
        </section>
        <section class="info-section">
            <div class="container">
                <h2>About Us</h2>
                <p>FitLife Studios is dedicated to helping you achieve your fitness goals with personalized training programs and expert guidance. Whether you're a beginner or a seasoned athlete, we have something for everyone.</p>

            </div>

        </section>
    </main>
   

    <?php include 'includes/auth-modal.php'; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>
