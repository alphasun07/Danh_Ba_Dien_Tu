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

<body style="background: #f6f6f6">

<link rel="stylesheet" href="../CSS/profile.css"> 

<div id="userid" style="display:none"><?php $row['userid'];?></div>
<div class="container">
<div class="row m-4">
        <div class="col-lg-4">
           <div class="profile-card-4 z-depth-3">
            <div class="card">
              <div class="card-body text-center bg-primary rounded-top">
               <div class="user-box">
                <img src="images/<?php echo $row['avatar'];?>" alt="" id="anh2" width="150px" height="150px" alt="user avatar">
              </div>
              
              <h5 class="mb-1 text-light"><?php echo $row['name_user'];?> </h5>
             
             </div>
              <div class="card-body" style="padding-bottom: 13px;">
                <ul class="list-group shadow-none">
                    <li class="list-group-item">
                        <div class="list-icon">
                            <i class="fa fa-phone-square"></i>
                        </div>
                        <div class="list-details">
                            <span id="sdt"><?php echo $row['sdt'];?></span>
                            <small>Số điện thoại</small>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="list-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="list-details">
                            <span id="txtemail"><?php echo $row['email'];?></span>
                            <small>Email Address</small>
                        </div>
                    </li>
                
                </ul>
                
                    <form action="update-profile.php" method="POST" enctype="multipart/form-data" id="form_avatar">
                    <div class="row justify-content-center align-items-center w-100 m-auto rounded" style="background-color:#e4e4e4;">
                        <div class="col-8 ps-4" style="font-weight: 600; color: #223035; font-size:16px; line-height: 16px;"> Chọn ảnh đại diện:</div>
                        <div class="col-4 file-upload">
                            <input type="file" name="file_image" />
                            <i class="fa fa-arrow-up"></i>
                        </div>
                    </div>
                        <!-- <input type="file" class="custom-file-upload"  > -->
                        <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill w-100" data-mdb-ripple-color="dark" name = "submit">Cập nhật ảnh</button>
                    </form>
                
               </div>
              
             </div>
           </div>
        </div>
        <div class="col-lg-8">
           <div class="card z-depth-3">
            <div class="card-body">
            <ul class="nav nav-pills nav-pills-primary nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Hồ Sơ</span></a>
                </li>
              
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Sửa hồ sơ</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active show" id="profile">
                    <h5 class="mb-5 text-center mt-2 ">Thông tin tài khoản</h5>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Họ và tên</h6>
                                </div>
                                <div class="col-sm-7 " id="txthoten">
                                    <?php echo $row['name_user'];?>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Địa chỉ</h6>
                                </div>
                                <div class="col-sm-7 " id="txtdiachi">
                                    <?php echo $row['diachi'];?>
                                </div>
                            </div>
                            <hr>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-5" >
                                    <h6 class="mb-0">Giới tính</h6>
                                </div>
                                <div class="col-sm-7 " id="txtgioitinh">
                                    <?php echo $row['gioitinh'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Ngày sinh</h6>
                                </div>
                                <div class="col-sm-7 " id="ngaySinh">
                                    <?php echo $row['ngaySinh'];?>
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Ngày tạo tài khoản</h6>
                                </div>
                                <div class="col-sm-7 ">
                                    <?php echo $row['registration_date'];?>
                                </div>
                                
                            </div>
                            <hr>   
                        </div>
                        
                    </div>
                    <!--/row-->
                </div>
               
                <!-- sửa profie -->
                <div class="tab-pane" id="edit">
                    <form action="update-profile.php" method="POST" id="edit_profile">
                        <h5 class="w-100 text-center mb-2" style="font-size: 1.25rem;">SỬA HỒ SƠ</h5>
                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label">Họ và tên</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="txthoten" type="text" value="<?php echo $row['name_user'];?>">
                            </div>
                        </div>

                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="txtemail" type="email" value="<?php echo $row['email'];?>">
                            </div>
                        </div>
                     
                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label">Giới tính</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="txtgioitinh" type="text" value="<?php echo $row['gioitinh'];?>" placeholder="Nam/Nữ">
                            </div>
                        </div>
                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label">Địa chỉ</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="txtdiachi" type="text" value="<?php echo $row['diachi'];?>" placeholder="Xã, phường, Thành phố">
                            </div>
                        </div>
                       
                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label">Số điện thoại</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="sdt" type="tel" value="<?php echo $row['sdt'];?>" placeholder="09XXXXXXXX">
                            </div>
                        </div>

                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label">Ngày sinh</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="txtngaysinh" type="date" value="<?php echo $row['ngaySinh'];?>" placeholder="Ngày/Tháng/Năm">
                            </div>
                        </div>
                       
                        <div class="form-group row m-auto mb-2">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
								<input type="submit" name="up-profile" class="btn btn-primary px-3 mt-2" value="Lưu thay đổi">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/my_jquery.js"></script>

</body>
