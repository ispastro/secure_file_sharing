<?php
require'includes/config.php';
session_start();

//check if the user is submitted the form

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username =$_POST['username'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $confirm_password =$_POST['confirm_password'];
// initialize the error array
    $_SESSION['error']=[];

    //validate the form
    if(empty($username) || empty($email) || empty($password)){
        $_SESSION['error'] ="please all fields are required!";
        header("location:register_form.php");
        exit();
    }
       // check email format

       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']="Invalid email format";
        header("location:register_form.php");
        exit();

       }
       // check password length
       if(strlen($password)<8){
        $_SESSION['error'] ="password must be at least 8 characters";
        header("location:register_form.php");
        exit();
       }

       // check if the email is already in the database 

       $stmt =$pdo->prepare("SELECT * FROM users WHERE email=? OR username =?");

       // sends the query to the database to check if the credentials are already in the database
       $stmt->execute([$email,$username]);
       if($stmt->fetch()){
        $_SESSION= 'Email or username already exists';
        header("location:register_form.php");
        exit();
       }
       
        // hash the password 
    $hashed_password =password_hash($password, PASSWORD_DEFAULT);

       // insert the user into the database
       $stmt =$pdo->prepare("INSERT INTO users(username,email, password_hash) VALUES(?,?,?)");
       if($stmt->execute([$username,$email,$hashed_password])){
        $_SESSION['success']="User registation succussfully";
        header("location:login_form.php");
        exit();

       }
       else {
         $_SESSION['']="Failed to create user:please try again";
         header("location:register_form.php");
         exit();

       }


       };



?>

