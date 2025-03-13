<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['login_errors'] = ['You must be logged in to access this page'];
    header("Location: login_form.php");
    exit();
}

// You can add additional functionality here, such as fetching user data from the database

// Example: Fetch user details (assuming database connection is established)
// require 'db_connection.php';
// $user_id = $_SESSION['user_id'];
// $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
// $stmt->execute([$user_id]);
// $user = $stmt->fetch(PDO::FETCH_ASSOC);

// Load the homePage view
include 'homePage.php';
?>
