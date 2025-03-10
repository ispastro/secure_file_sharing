<?php
require 'includes/config.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='post'){
    $email = trim($_POST['email']);
    $password =$_POST['password'];
    if(empty($email)|| empty($password)){
        die("All fields are required!");
    }
    $stmt  =$pdo->prepare("SELECT *FROM users where email =?");
    $stmt->execute([$email]);
    $user =$stmt->fetch();

    if(!$user || !password_verify($password,$user['password_hash'])){
        die("Invalid email or password!");

        
    }

    // set session varaibles 

    $_SESSION['user_id']=$user['id'];
    $_SESSION['username']=$user['username'];
    echo "login successfull! < a href='index.php'>Go to home page</a>";


}



?>

<!--login form -->
<form method ="post">
    <input type ="text" name ="email" required>
    <input type ="text" name ="password" required>
    <button type="submit"> button</button>
</form>