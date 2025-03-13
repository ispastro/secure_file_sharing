<?php

$target_dr = "uploads/";
$target_file =$target_dr.basename($_FILES['fileToUpload']['name']);
// the original nama eof the file to upload 
// basename makes sure actual file name not full path
// combines the directory with the file name 

$targetOk =1;
$imageFileType=strtolower(pathinfo($target_dr,PATHINFO_EXTENSION));
// pathinfo(target_file, PATHINFO_EXTENSION extracts the file extension 

// strtolower() converts to lowercase whatever the file is 

if(isset($_POST["submit"])){
    $check =getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check!==false){
        echo "file is image-".$check["mimi"].".";
        $uploadOK=1;
        
      }
      

      
}



?>