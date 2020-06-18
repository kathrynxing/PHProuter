<?php
include("header.html");

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if($_GET['page']=="disclaimer"){
        include("disclaimer.html");
    }else{
        include("mainpage.html");
    }
}else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo ("POST rout");
    // check validity of file get 
    // if valid, convert and get $html_converted_file

    
    $target_dir = 'uploads/';
    $uploadedFileBasename =
      pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_FILENAME);
      $uploadedFileExtension =
      pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    $file = $_FILES['fileToUpload']['name'];
    
    
    $target_file = $target_dir . $uploadedFileBasename. "." . $uploadedFileExtension;

    $test = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    if ($test){
        echo("succesff upload");
    }else{
        echo("ohoohhoo");
    }
    $GLOBALS['html_converted_file'] = $target_file;
    // pass to download.php page
    include("download.php");
    
}

include("footer.html");
