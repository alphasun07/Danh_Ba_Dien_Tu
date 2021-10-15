<?php
include('../config/constants.php')
?>

<?php
$email=$_SESSION['user'];
if(isset($_POST['submit'])){

    $target_dir = "images/";
    $newFileName = $_POST['newFileName'];
    $target_file = $target_dir . basename($_FILES["file_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $target_dir.$newFileName)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["file_image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql="UPDATE users SET avatar='$newFileName' WHERE email='$email'";
    $query=mysqli_query($conn,$sql);
    if($query==true){
        header('location:'.SITEURL.'admin/qltk1.php');
    }
}
?>

<!-- sửa trên database -->
<?php

if(isset($_POST['up-profile'])){
	$hoten=$_POST['txthoten'];
	$email=$_POST['txtemail'];
	$gioitinh=$_POST['txtgioitinh'];
	$diachi=$_POST['txtdiachi'];
	$sdt=$_POST['sdt'];
	$ngaysinh=$_POST['txtngaysinh'];

	//update
	$sql="UPDATE users SET
	name_user='$hoten',
	email='$email',
	gioitinh='$gioitinh',
	diachi='$diachi', 
	sdt='$sdt',
	ngaySinh ='$ngaysinh'
	WHERE email='$email'";

	$query=mysqli_query($conn,$sql);
	if($query==TRUE){
		$_SESSION['profile']="<div class='text-success'>Sửa tài khoản thành công</div>";
		header('location:http://localhost/dhtl3/admin/qltk1.php');
	}
	else{
		$_SESSION['profile']="<div class='text-danger'>Sửa tài khoản thất bại</div>";
		header('location:http://localhost/dhtl3/admin/qltk1.php');
	}
}
?>
