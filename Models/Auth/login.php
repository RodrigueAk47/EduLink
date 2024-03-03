<?php

use Models\Database\Database;

// Assuming the User class resides in a 'Models' namespace

require_once "User.php";
require_once "../Database/Database.php";

// Retrieve username and password from the form
$email = $_POST["email"];
$password = $_POST["password"];


// Validate email (optional)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Connect to the database
$dbConfig = [
    'host' => 'localhost',
    'dbname' => 'edulink',
    'username' => 'root',
    'password' => ''
];
$db = new Database($dbConfig);
if (!isset($_POST['email'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}
// Try to find the user by email
$user = $db->getUserByEmail($email);

// Check if user exists and password is correct
if ($user && password_verify($password, $user->getPasswordHash())) { // Assuming a 'getPasswordHash()' method exists
    // Start a secure session (e.g., using session_start() and session variables)
    session_start();
    $_SESSION["id"] = $user->getId();
    $_SESSION["name"] = $user->getName();
    $_SESSION["email"] = $user->getEmail();
    $_SESSION["matricule"] = $user->getMatricule();
    $_SESSION["password"] = $user->getPasswordHash();
    $_SESSION["role"] = $user->getRole();

    // Implement CSRF protection (e.g., CSRF token generation and validation)
    // ...

    header("Location: /index.php?"); // Redirect to protected page
} else {
    // Login failed, display specific error message
    echo "Invalid email or password";
}


