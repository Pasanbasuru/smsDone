<!--File to Upload-->
<?php
    $s_id=$_REQUEST['stu_id'];
    $target_dir = "../view/images/profile_pic/";
    unlink('../view/images/profile_pic/'.$s_id.".jpg");
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $error='<div class="alert alert-danger"><?php echo File is an image - " . $check["mime"] . ".;?></div>';
            header("Location:../view/student_detail.php?msg=$error");
            $uploadOk = 1;
        } else {
            $error='<div class="alert alert-danger">File is not an image.</div>';
            header("Location:../view/student_detail.php?msg=$error");
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $error='<div class="alert alert-danger">Sorry, file already exists.</div>';
        header("Location:../view/student_detail.php?msg=$error");
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $error='<div class="alert alert-danger">Sorry, your file is too large.</div>';
        header("Location:../view/student_detail.php?msg=$error");        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $error='<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
        header("Location:../view/student_detail.php?msg=$error");        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error='<div class="alert alert-danger">Sorry, your file was not uploaded.</div>';
        header("Location:../view/student_detail.php?msg=$error");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            rename("../view/images/profile_pic/".basename( $_FILES["fileToUpload"]["name"]),"../view/images/profile_pic/".$s_id.".jpg");
            header("Location:../view/student_detail.php");
        } else {
            $error='<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
            header("Location:../view/student_detail.php?msg=$error");        }
    }
    ?>