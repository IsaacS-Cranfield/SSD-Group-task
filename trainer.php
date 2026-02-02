<?php
session_start(); 

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['open_login_modal'] = true;
    header("Location: index.php");
    exit;
}

// Redirect if not a trainer
if ($_SESSION['role'] !== 'trainer') {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
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
    <title>Trainer Dashboard</title>
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
            <a href="trainer.php" class="nav-logo"></a>
        
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
                <h1>Trainer Dashboard</h1>
                <div class="welcome-message">
                    <h2>Welcome, <?php echo $_SESSION['first_name']; ?>.</h2>
                </div>
                <div class="dashboard-layout">
                    <div class="grid-container">
                        <a href="#" class="dash-card btn-base theme-glass">Assigned clients</a>
                        <a href="#" class="dash-card btn-base theme-glass">Client Progress</a>
                        <a href="#" class="dash-card btn-base theme-glass">View Schedule</a>
                        <a href="#" class="dash-card btn-base theme-glass">Payments</a>
                        <a href="#" class="dash-card btn-base theme-glass">Messages</a>
                        <a href="#" class="dash-card btn-base theme-glass">Settings</a>
                    </div>

                    <div class=" schedule-preview theme-glass container-base">
                        <h3>Todays Schedule</h3>
                        <ul class="schedule-list">
                            <li><span>09:00</span> - Morning Yoga (Client: Sarah)</li>
                            <li><span>11:30</span> - HIIT Session (Client: Mike)</li>
                            <li><span>14:00</span> - Strength Training (Client: James)</li>
                            <li><span>16:00</span> - Post-Workout Review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>
</html>