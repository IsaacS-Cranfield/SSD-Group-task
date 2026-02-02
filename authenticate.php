<?php 
session_start();

$connection = mysqli_connect("localhost", "root", "", "fitlife");
if(mysqli_connect_errno())
{
    echo "ERROR: could not connect to database: ".mysqli_connect_error();
}

//Prepare SQL statement. ? is a placeholder. 
if($stmt = $connection->prepare('SELECT email, first_name, last_name, mobile, password_hash, `role` FROM users WHERE email = ?')) {
    //Bind parameters. Insert actual value into the placeholder
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    //Store result
    $stmt->store_result();
}

//Check if query has returned any results
if ($stmt->num_rows>0){ // if rows in stmt > 0, user exists
    $stmt->bind_result($email, $firstName, $lastName, $mobile, $passwordHash, $role); //store results in variables
    $stmt->fetch();

    //verify password and create sessions
    if(password_verify($_POST['password'], $passwordHash)) {
        $_SESSION['loggedin'] = true; // set session as logged in
        $_SESSION['email']=$_POST['email']; // store user email in session
        $_SESSION['first_name']=$firstName; // store user first name in session
        // Additional user details
        $_SESSION['last_name']=$lastName; // store user last name in session
        $_SESSION['mobile']=$mobile; // store user mobile in session
        $_SESSION['role']=$role; // store user role in session

        unset($_SESSION['temp_email']); // clear temporary email from session

        // --- MFA SIMULATION START ---
        // Instead of redirecting to the dashboards, set an MFA flag
        $_SESSION['mfa_pending'] = true; 
        
        // Redirect back to index.php to trigger the modal show
        header("Location: index.php"); 
        // --- MFA SIMULATION END ---

        exit();
    } else {
        //incorrect credentials, pass error message to index.php and open login modal
        $_SESSION['login_fail'] = "Incorrect email and/or password.";
        $_SESSION['open_login_modal'] = true;
        $_SESSION['temp_email'] = $_POST['email']; // Save temporary email to session so it stays in the form

        header("Location: index.php");
        exit();
    }
} else {
    //incorrect credentials, pass error message to index.php and open login modal
    $_SESSION['login_fail'] = "Incorrect email and/or password.";
    $_SESSION['open_login_modal'] = true;
    $_SESSION['temp_email'] = $_POST['email']; // Save temporary email to session so it stays in the form

    header("Location: index.php");
    exit();
}
$stmt->close();
$connection->close();
?>