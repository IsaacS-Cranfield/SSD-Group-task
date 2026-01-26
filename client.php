<?php
session_start(); 
// Redirect if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['open_login_modal'] = true;
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Client Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Custom Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
        <a href="index.php" class="nav-logo">
        </a>

        <ul>
            <li><a href="index.php">Main Page</a></li>
            <li><a href="logout.php">Log out</a></li>
            <li><a href="profile.html">Profile Page</a></li>
        </ul>

    </nav>
    <main>
        <section class="hero">
            <div class="wrapper">
                <div class="text-box">
                    <h1>Welcome, <?php echo $_SESSION['first_name']; ?>.</h1>
                </div>
            </div>
        </section>
    </main>
</body>
</html>