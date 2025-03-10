<?php


// define the database credentails as constants 

define('DB_HOST','localhost');
define('DB_NAME','secure_file_sharing');
define('DB_USER','my_username');
define('DB_PASS','my_password');
define('DB_CHARSET','uft8mb4');


try{
    // create a databse source Name (DSN
    $dsn ="mysql:host=".DB_HOST.";
    dbname= ". DB_NAME .";
    charset=" . DB_CHARSET;
     $opitons =[
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
        // Enables error handling 

        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC, //fetches data as assocaitive array

        PDO::ATTR_EMULATE_PREPARES => false, //uses real prepared statements 
     ];
     $pdo = new PDO ($dsn,DB_USER,DB_PASS,$opitons);


}catch(PDOException $e){
    die("Database connection Failed:".$e->getMessage());
}

?>