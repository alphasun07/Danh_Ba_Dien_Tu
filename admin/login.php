<?php
include_once('templates-admin/header-login.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="container-fluid h-custom col-lg-12 col-xl-11 m-4">
            <div class="row d-flex justify-content-center align-items-center h-150 border border-3" style="border-radius: 25px;">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../IMG/DaihocThuyLoi.jpg" class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 m-4">
                    <h2 class="text-center fw-bold">Đăng Nhập</h3>

                    <!-- form -->
                    <form action="" method="post">

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="txtemail" class="form-control form-control-md"
                            placeholder="Nhập email" />
                            <label class="form-label" for="email">Email </label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="pass" name="pass" class="form-control form-control-md"placeholder="Nhập mật khẩu" />
                            <label class="form-label" for="pass">Mật khẩu</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Tôi quên mật khẩu?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                                <?php
                                
                                    if(isset($_SESSION['login'])){
                                        echo $_SESSION['login'];
                                        unset ($_SESSION['login']);
                                    }
                                    if(isset($_SESSION['reg_success'])){
                                        echo $_SESSION['reg_success'];
                                        unset ($_SESSION['reg_success']);
                                    }
                                                                    
                                ?>
                                
                            <button type="submit" name="login" class="btn btn-primary btn-lg">Đăng nhập</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="register.php"class="link-danger">Đăng ký</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<?php
    include('templates-admin/footer.php');
?>

<?php
    if(isset($_POST['login'])){
        $email = $_POST['txtemail'];
        $pass = $_POST['pass'];
    
        //b2: thực hiện truy vấn
        //2.1 ktra đã tồn tại chưa
        $sql_1 = "SELECT *From users WHERE email = '$email'";
        $result_1 = mysqli_query($conn,$sql_1);

        if(mysqli_num_rows($result_1)>0){
            $row= mysqli_fetch_assoc($result_1);
            $pass_saved = $row ['password'];

            //ktra status bằng 0 thì tk chưa đc kích hoạt

            if(password_verify($pass, $pass_saved) AND $row['STATUS']==1){
            
                //nếu khớp thì > login thành công > chuyenr vào trang index

                //cấp thẻ bài
                
              
                $_SESSION['login']= "<div class='text-success'>Đăng nhập thành công.</div>";
                $_SESSION['user']=$email;
                header("Location: index.php");

            }
            elseif($row['STATUS']==0){
                $_SESSION['login']="<div class='text-danger'>Tài khoản chưa được kích hoạt</div>";
                header("Location:login.php");
            }
            
            else{
                $_SESSION['login']="<div class='text-danger'>Sai mật khẩu</div>";
                header("Location:login.php");
            }
        }
        else{
            $_SESSION['login']="<div class='text-danger'>Sai Email</div>";
            header("Location:login.php");

        }

    }
 
?>
