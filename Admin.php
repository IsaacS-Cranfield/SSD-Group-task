<?php
session_start(); 
// Redirect if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['open_login_modal'] = true;
    header("Location: index.php");
    exit;
}

// Redirect if not an admin
if ($_SESSION['role'] !== 'admin') {
    if ($_SESSION['role'] == 'trainer') {
        header("Location: trainer.php");
    } elseif ($_SESSION['role'] == 'client') {
        header("Location: client.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
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
            <a href="admin.php" class="nav-logo"></a>
            
            <ul class='nav-links'>
                <li><a href="admin.php" class="btn-base theme-solid">Home</a></li>
                <li><a href="profile.php" class="btn-base theme-solid">Profile Page</a></li>
            </ul>

            <button id="hamburger" class="hamburger">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>

    </header>
    

    <main class="role-page">
        <section class="dashboard">
            <div class="glass-panel">
                <h1>Admin Page</h1>
                <div class="grid-container">
                    <a href="#" class="dash-card btn-base theme-glass">Manage Users</a>
                    <a href="#" class="dash-card btn-base theme-glass">Manage Payments</a>
                    <a href="#" class="dash-card btn-base theme-glass">Equipment Maintenance</a>
                    <a href="#" class="dash-card btn-base theme-glass">Timetable</a>
                    <a href="#" class="dash-card btn-base theme-glass">Reports</a>
                    <a href="#" class="dash-card btn-base theme-glass">Settings</a>
                </div>
            </div>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>
</html>