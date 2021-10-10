<?php
include('templates-admin/header.php');
?>
<?php
   $email=$_SESSION['user'];
$sql_1="SELECT * FROM users WHERE email='$email' ";
$query_1=mysqli_query($conn,$sql_1);
if(mysqli_num_rows($query_1)>0){
    $row=mysqli_fetch_assoc($query_1);

}
?>
<img src="<?php echo $row['avatar'];?>" alt="" id="anh2">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file_image" >
        <button type="submit" name = "submit">Chọn ảnh</button>
</form>

<?php
if(isset($_POST['submit'])){

    $target_dir = "images/";
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
        if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["file_image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql="UPDATE users SET avatar='$target_file' WHERE email='$email'";
    $query=mysqli_query($conn,$sql);
    if($query==true){
        header('location:'.SITEURL.'admin/qltk.php');
    }
}
?>
<?php
include_once('templates-admin/footer.php');
?>
