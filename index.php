<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FitLife Studios</title>
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
        
        <button id="navLogin" class="navLogin">Login/Signup</button></li>
        
    </nav>
    <main>
        <div class="hero">
            <div class="wrapper">
                <div class="text-box">
                    <h1>Welcome to FitLife Studios</h1>
                </div>
            </div>
        </div>
    </main>
   

    <?php include 'includes/auth-modal.php'; ?>
</body>
</html>
