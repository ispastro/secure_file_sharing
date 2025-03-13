<?php

require 'includes/config.php';
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $_SESSION['error'] = [];

    if (empty($email) || empty($password)) {
        $_SESSION['error'][] = "All fields are required!";
        header("Location: login_form.php");
        exit();
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password_hash'])) {
        $_SESSION['error'][] = "Invalid email or password!";
        header("Location: login_form.php");
        exit();
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: secure_file_sharing/homePage.php");
    exit();
}

?>