<?php
session_start();
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//var_dump($target_file);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
        $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong>File is an image - " . $check['mime'] . "</div>";
        header("Location: ../index.php?page=admin");
        exit;
    } else {
        $uploadOk = 0;
        $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong>File is not an image.</div>";
        header("Location: ../index.php?page=admin");
        exit;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong>Sorry, file already exists.</div>";
    $uploadOk = 0;
    header("Location: ../index.php?page=admin");
    exit;
}
// Check file size;
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
    $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong>Sorry, your file is too large.</div>";
    header("Location: ../index.php?page=admin");
    exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) {
    $uploadOk = 0;
    $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
    header("Location: ../index.php?page=admin");
    exit;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $uploadOk = 0;
    $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong>Sorry, your file was not uploaded.</div>";
    header("Location: ../index.php?page=admin");
    exit;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $_SESSION["UploadIMG"] = "<div class='alert alert-success'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Félicitation !!</strong> Image Enregistrer avec Succèes</div>";
        header("Location: ../index.php?page=admin");
        exit;
    } else {
        $_SESSION["UploadIMG"] = "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Fail !!</strong> Sorry, there was an error uploading your file.</div>";
        header("Location: ../index.php?page=admin");
        exit;
    }

    //var_dump($_FILES["fileToUpload"]);
}
?>