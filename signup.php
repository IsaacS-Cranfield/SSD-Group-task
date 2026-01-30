<?php

session_start(); 
$loggedIn = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;


//Create variable for different values
$servername = "localhost";
$username = "root";
$password = "";
$db = "fitlife";

//Create a connection

$conn = new mysqli($servername, $username, $password, $db);

//Check connection
if ($conn->connect_error) {
    die("Connection failed; " . $conn->connect_error);
}

if(isset($_POST['signup'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $role = $_POST['role'];

    // Check if passwords match
    if ($password != $Cpassword) {
        // Passwords do not match. Show error message.
        $_SESSION['error_message'] = "Passwords do not match.";
    } else {
        $checkQuery = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // Email already exists, handle accordingly (show an error message, redirect, etc.)
            $_SESSION['error_message'] = "Email already exists. Please use a different email.";
            echo '<script>window.location.href = "signup.php";</script>';
        } else {
            //Insert new record using prepared statements
            $query = $conn->prepare("INSERT INTO users (email, first_name, last_name, password_hash, role) VALUES 
            (?, ?, ?, ?, ?)");  
            
            // hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);    

            //Bind parameters
            $query->bind_param("sssss", $email, $first_name, $last_name, $hashedPassword, $role);
        
            //Execute query
            if($query->execute()) {
                $_SESSION['success_message'] = "Account created successfully. Please log in.";
                $_SESSION['open_login_modal'] = true;
                header("Location: index.php");
                exit();

            } else {
                echo '<script>alert("Error: ' . $query . '\n' . mysqli_error($conn) . '");</script>';
            }

            //Close prepared statement
            $query->close();
        }


    }

}

?>
