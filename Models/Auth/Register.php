<?php

use Models\Auth\User;
use Models\Database\Database;

require_once "User.php";
require_once "../Database/Database.php";

// Retrieve registration data from the form
$name = $_POST["name"];
$matricule = $_POST["matricule"];
$email = $_POST["email"];
$password = $_POST["password"];

// Validate email (optional)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Connect to the database
$dbConfig = [
    'host' => 'localhost',
    'dbname' => 'edulink',
    'username' => 'root',
    'password' => ''
];
$db = new Database($dbConfig);

// Create a new user instance
$user = new User($name, $matricule, $email, $hashedPassword);

// Save the user to the database
if ($db->saveUser($user)) {
    echo "Registration successful";
    header("Location: /Views/login.php");
    exit();
    // You can redirect to a login page or any other page after successful registration
} else {
    echo "Registration failed";
}

