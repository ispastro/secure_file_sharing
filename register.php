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