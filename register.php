<?php
require'includes/config.php';
session_start();

//check if the user is submitted the form

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username =$_POST['username'];
    $email =$_POST['email'];
    $password =-$_POST['password'];
    $confirm_password =$_POST['confirm_password'];
// initialize the error array
    $_SESSION['error']=[];

    //validate the form
    if(empty($username) || empty($email) || empty($password)){
        $_SESSION['error'] ="please all fields are required!";
        exit();
    }
       // check email format

       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']="Invalid email format";
        exit();

       }
       // check password length
       if(strlen($password)<8){
        $_SESSION['error'] ="password must be at least 8 characters";
        exit();
       }

       // check if the email is already in the database 

       $stmt =$pdo->prepare("SELECT * FROM users WHERE email=? OR username =?");

       // sends the query to the database to check if the credentials are already in the database
       $stmt->execute([$email,$username]);
       if($stmt->fetch()){
        $_SESSION= 'Email or username already exists';
        exit();
       }
       
        // hash the password 
    $hashed_password =password_hash($password, PASSWORD_DEFAULT);

       // insert the user into the database
       $stmt =$pdo->prepare("INSERT INTO users(username,email, password_hash) VALUES(?,?,?)");
       if($stmt->execute([$username,$email,$hashed_password])){
        $_SESSION['success']="User registation succussfully";
        header("location:login.php");
        exit();

       }
       else {
         $_SESSION['']="Failed to create user:please try again";
         header("location:register.php");
         exit();

       }


       };



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

