<?php
require 'includes/config.php';
//Database connection 

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    // collect user input 

    $username =trim($_POST['username']);
    $email =trim($_POST['email']);
    $password = $_POST['password'];
    if(empty($username)|| empty($email)|| empty($password)){
        die("All fields are required!");

    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Invalid email format!");
    }
  // check if email or username alreadu exists or not 
  $stmt =$pdo->prepare("SELECT *FROM users where email =? or username =?");

  $stmt->execute([$email,$username]);
       if($stmt->fetch()){
        die("username or email already taken!");

       }

       $hashed_password =password_hash($password, PASSWORD_DEFAULT);


       $stmt =$pdo->prepare("INSERT INTO users(username, email, hashed_password) VALUES(?,?,?)");
       $stmt->execute([$username, $email, $hashed_password]);
       echo"User registered successfully!";
       header('Location:login.php');


      

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
<!--Register form -->
<form  method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Register</button>
</form>
<a href="login.php">Login</a>
</body>
</html>
