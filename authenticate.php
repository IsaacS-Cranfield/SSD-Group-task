<?php 
session_start();

$connection = mysqli_connect("localhost", "root", "", "fitlife");
if(mysqli_connect_errno())
{
    echo "ERROR: could not connect to database: ".mysqli_connect_error();
}

//Prepare SQL statement. ? is a placeholder. 
if($stmt = $connection->prepare('SELECT email, first_name, password_hash, `role` FROM users WHERE email = ?')) {
    //Bind parameters. Insert actual value into the placeholder
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    //Store result
    $stmt->store_result();
}

//Check if query has returned any results
if ($stmt->num_rows>0){ // if rows in stmt > 0, user exists
    $stmt->bind_result($email, $firstName, $passwordHash, $role); //store results in variables
    $stmt->fetch();

    //verify password and create sessions
    if(password_verify($_POST['password'], $passwordHash)) {
        $_SESSION['loggedin'] = true; // set session as logged in
        $_SESSION['name']=$_POST['email']; // set the session name as the email
        $_SESSION['first_name']=$firstName; // set the session first name
        $_SESSION['role']=$role; // set the session role
        if($_SESSION['role'] == "client")
            header ("location: client.php"); // redirect to index.php
        else if($_SESSION['role'] == "trainer")
            header ("location: trainer.php"); // redirect to index.php
        else if($_SESSION['role'] == "admin")
            header ("location: admin.php"); // redirect to index.php
        exit();
    } else {
        //incorrect credentials, pass error message to index.php
        $_SESSION['error_message'] = "Incorrect email and/or password.";
        echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 500);</script>';
        exit();
    }
} else {
    //incorrect credentials, pass error message to index.php
    $_SESSION['error_message'] = "Incorrect email and/or password.";
    echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 500);</script>';
    exit();
}
$stmt->close();
$connection->close();
?>