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

$userRole = $_SESSION['role'] ?? 'index.php'; // Default to index.php if role somehow not set
$homePage = $userRole . ".php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Client Page</title>
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
            <a href="<?php echo $homePage; ?>" class="nav-logo">
            </a>
            <ul class="nav-links">
                <li><a href="<?php echo $homePage; ?>" class="btn-base theme-solid">Home</a></li>
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
                <h1>User Information</h1>
                <h2>First Name: <?php echo $_SESSION['first_name']; ?></h2>
                <h2>Last Name: <?php echo $_SESSION['last_name']; ?></h2>
                <h2>Email: <?php echo $_SESSION['email']; ?></h2>
                <h2>Mobile Number: <?php echo $_SESSION['mobile']; ?></h2>
                <h2>Role: <?php echo $_SESSION['role']; ?></h2>

                <a href="logout.php" class="btn-base theme-glass btn-lg">Log out</a>
            </div>
        </section>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>