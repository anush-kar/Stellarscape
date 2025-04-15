<?php
// Include database connection
require_once 'config.php';

// Initialize variables
$username = $password = $confirm_password = "";
$error = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $error = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $error = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                $error = "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $error = "Please enter a password.";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $error = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $error = "Please confirm password.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            $error = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if (empty($error)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.html");
                exit();
            } else {
                $error = "Something went wrong. Please try again later.";
            }
        }
    }
    
    // If there was an error, redirect back to signup with error message
    if (!empty($error)) {
        header("location: signup.html?error=" . urlencode($error));
        exit();
    }
}
?>
