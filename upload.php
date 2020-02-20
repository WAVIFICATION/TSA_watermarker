<?php



//$uploadOk = 1;
$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
$target_file =  "sample.jpg";
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
       
        $uploadOk = 0;
    }
}
*/
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size

// Allow certain file formats


move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 header('Location: https://theralite-leakages.000webhostapp.com/tsawatermark.php');

?>