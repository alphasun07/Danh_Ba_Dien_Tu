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
    <div class="main-body m-4">
            <div class="row gutters-sm">

            <?php
            if(isset($_SESSION['profile'])){
                echo $_SESSION['profile'];
                unset ($_SESSION['profile']);
            }
            ?>

            <!-- avatar -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $row['avatar'];?>" alt="" id="anh2" alt="Admin" class="rounded-circle img-fluid img-thumbnail" width="225px">
                            <div class="mt-3">
                                <h4><?php echo $row['name_user'];?></h4>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            
            <?php
                $sql_2="SELECT name_user, email, password, gioitinh,diachi FROM users WHERE email='$email' ";
                $query_2=mysqli_query($conn,$sql_2);
                if(mysqli_num_rows($query_2)>0){
                    $row=mysqli_fetch_assoc($query_2);
                    
                }
            ?>

            <!-- info -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Họ và Tên</h6>
                            </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['name_user'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['email'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mật khẩu</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['password'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Giới tính</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['gioitinh'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Địa chỉ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row['diachi'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-success btn-lg " href="update-profile.php">Sửa</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>

        </div>
    </div>


<?php
include_once('templates-admin/footer.php');
?>
