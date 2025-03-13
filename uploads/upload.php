<?php

$target_dr = "uploads/";
$target_file =$target_dr.basename($_FILES['fileToUpload']['name']);
// the original nama eof the file to upload 
// basename makes sure actual file name not full path
// combines the directory with the file name 


$imageFileType=strtolower(pathinfo($target_dr,PATHINFO_EXTENSION));
// pathinfo(target_file, PATHINFO_EXTENSION extracts the file extension 

// strtolower() converts to lowercase whatever the file is 

if(isset($_POST["submit"])){
    $check =getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check!==false){
        echo "File is image-".$check["mimi"].".";
        $uploadOK=1;
        // 

      }
      else{
        echo "file is not image .";
        $uploadOK =0;
        // file is not to be uploaded 

      }    
}
// check if the file exists or not 
if(file_exists($target_file)){
    echo "Sorry, file already exists!";
    $uploadOK =0;

}

// checks the file of the file before upload
if($_FILES['fileToUpload']['size'] >5000000){
    echo "Sorry, your file is too large";
    $uploadOK =0;

}

// allowing the type of the file to be uploaded 
if($imageFileType!='jpg' &&
    $imageFileType!='png' &&
    $imageFileType!='jpeg' &&
    $imageFileType!='gif') {
        echo "Sorry , only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOK =0;
    }
    
?>