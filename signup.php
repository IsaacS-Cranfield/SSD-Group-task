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
    // Sanitise and validate first, last name and email
    $first_name = ucwords(strtolower(trim($_POST['first_name'])));
    $last_name = ucwords(strtolower(trim($_POST['last_name'])));
    $email = strtolower(trim($_POST['email']));

    // Remove any spaces or non-numeric characters from mobile number
    $mobile = str_replace([' ', '-'], '', trim($_POST['mobile']));
    // Check if its 11 digits (if not empty)
    if (!empty($mobile) && (strlen($mobile) !== 11 || substr($mobile, 0, 2) !== '07')) {
        $_SESSION['mobile_error'] = "Please enter a valid 11 digit mobile number.";
        $_SESSION["open_signup_modal"] = true;

        // Save input values to session so they are not lost
        $_SESSION['temp_first_name'] = $first_name;
        $_SESSION['temp_last_name'] = $last_name;
        $_SESSION['temp_email'] = $email;
        $_SESSION['temp_mobile'] = $mobile;
        $_SESSION['temp_role'] = $role;

        header("Location: index.php");
        exit();
    }

    // Check admin code if role is admin
    if ($_POST['role'] === 'admin') {
        $secret_code = "0987";
        if (!isset($_POST['admin_code']) || $_POST['admin_code'] !== $secret_code) {
            $_SESSION['admin_code_error'] = "Invalid admin code.";
            $_SESSION["open_signup_modal"] = true;

            // Save input values to session so they are not lost
            $_SESSION['temp_first_name'] = $first_name;
            $_SESSION['temp_last_name'] = $last_name;
            $_SESSION['temp_email'] = $email;
            $_SESSION['temp_mobile'] = $mobile;
            $_SESSION['temp_role'] = $role;

            header("Location: index.php");
            exit();
        }
    }

    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $role = $_POST['role'];

    // Check if passwords match
    if ($password != $Cpassword) {
        // Passwords do not match. Show error message.
        $_SESSION['match_error'] = "Passwords do not match.";
        $_SESSION["open_signup_modal"] = true;

        // Save input values to session so they are not lost
        $_SESSION['temp_first_name'] = $first_name;
        $_SESSION['temp_last_name'] = $last_name;
        $_SESSION['temp_email'] = $email;
        $_SESSION['temp_mobile'] = $mobile;
        $_SESSION['temp_role'] = $role;

        header("Location: index.php");
        exit();
    } else {
        $checkQuery = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // Email already exists, handle accordingly (show an error message, redirect, etc.)
            $_SESSION['email_error'] = "Email already exists. Please use a different email.";
            $_SESSION["open_signup_modal"] = true;

            // Save input values to session so they are not lost
            $_SESSION['temp_first_name'] = $first_name;
            $_SESSION['temp_last_name'] = $last_name;
            $_SESSION['temp_email'] = $email;
            $_SESSION['temp_mobile'] = $mobile;
            $_SESSION['temp_role'] = $role;

            header("Location: index.php");
            exit();
        } else {
            //Insert new record using prepared statements
            $query = $conn->prepare("INSERT INTO users (email, first_name, last_name, mobile, password_hash, role) VALUES 
            (?, ?, ?, ?, ?, ?)");  
            
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);    

            //Bind parameters
            $query->bind_param("ssssss", $email, $first_name, $last_name, $mobile, $hashedPassword, $role);
        
            //Execute query
            if($query->execute()) {
                // Clear temporary data so the form is empty next time
                unset($_SESSION['temp_first_name']);
                unset($_SESSION['temp_last_name']);
                unset($_SESSION['temp_email']);
                unset($_SESSION['temp_mobile']);
                unset($_SESSION['temp_role']);

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
