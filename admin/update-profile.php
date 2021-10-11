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

<link rel="stylesheet" href="../CSS/profile.css"> 
<div class="container">
		<div class="main-body">
			<div class="row m-4">
				 <!-- avatar -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $row['avatar'];?>" alt="" id="anh2" alt="Admin" class="rounded-circle" width="225px" height="200px">
                                <div class="mt-3">
                                    <h4></h4>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="file" name="file_image" >
                                        <button type="submit" name = "submit">Chọn ảnh</button>
                                    </form>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">

						<!-- xử lý hiển thị tt -->
						<?php
						 	$email=$_SESSION['user'];
							$sql_2="SELECT name_user, email, password, gioitinh,diachi FROM users WHERE email='$email' ";
							$query_2=mysqli_query($conn,$sql_2);
							if(mysqli_num_rows($query_2)>0){
								$row=mysqli_fetch_assoc($query_2);
								
							}
						?>

						<!-- info -->
							<form action="" method="POST">
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Họ và tên</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="txthoten" class="form-control" value="<?php echo $row['name_user']; ?>">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Email</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="email" name="txtemail" class="form-control" value="<?php echo $row['email']; ?>">
									</div>
								</div>
								
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Giới tính</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="txtgioitinh" class="form-control" value="<?php echo $row['gioitinh']; ?>">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Địa chỉ</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="txtdiachi" class="form-control" value="<?php echo $row['diachi']; ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-9 text-secondary">
										<input type="submit" name="up-profile" class="btn btn-success px-4" value="Lưu thay đổi">
									</div>
								</div>
							</form>
							
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
<?php
include_once('templates-admin/footer.php');
?>
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
        header('location:'.SITEURL.'admin/update-profile.php');
    }
}
?>

<!-- sửa trên database -->
<?php
$email=$_SESSION['user'];
if(isset($_POST['up-profile'])){
	$hoten=$_POST['txthoten'];
	$email=$_POST['txtemail'];
	$gioitinh=$_POST['txtgioitinh'];
	$diachi=$_POST['txtdiachi'];

	//update
	$sql="UPDATE users SET
	name_user='$hoten',
	email='$email',
	gioitinh='$gioitinh',
	diachi='$diachi' WHERE email='$email'";

	$query=mysqli_query($conn,$sql);
	if($query==TRUE){
		$_SESSION['profile']="<div class='text-success'>Sửa tài khoản thành công</div>";
		header('location:http://localhost/dhtl3/admin/qltk.php');
	}
	else{
		$_SESSION['profile']="<div class='text-danger'>Sửa tài khoản thất bại</div>";
		header('location:http://localhost/dhtl3/admin/qltk.php');
	}
}
?>
