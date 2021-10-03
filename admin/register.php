
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Đăng nhập</title>
  </head>
  <body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                        <?php
                            include('../config/constants.php');

                            if(isset($_SESSION['login'])){
                                echo $_SESSION['login'];
                                unset ($_SESSION['login']);
                            }


                        ?>

                        <form action="" METHOD = "POST" class="mx-1 mx-md-4">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="text" id="lastName" name="name_user" class="form-control" />
                            <label class="form-label" for="name">Name</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="email" id="email" name="txtemail" class="form-control" />
                            <label class="form-label" for="email">Email</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="password" id="pass1" name="pass1" class="form-control" />
                            <label class="form-label" for="pass1">Password</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input type="password" id="pass2" name="pass2" class="form-control" />
                            <label class="form-label" for="pass2">Repeat your password</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg" name="signup">Đăng ký</button>
                        </div>

                        </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

  </body>
</html>

<?php

    if(isset($_POST['signup'])){
         //nhận gtri tu form register gửi sang
        $name = $_POST['name_user'];
        $email = $_POST['txtemail'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];


    //b2: thực hiện truy vấn
    //2.1 ktra đã tồn tại chưa
        $sql_1 = "SELECT *From users WHERE email = '$email'";
        $result_1 = mysqli_query($conn,$sql_1);

        if(mysqli_num_rows($result_1)>0){
            //chuyển hướng trang
            $_SESSION['login'] = "<div class='text-danger'>Email đã được sử dụng</div>";
            header("Location: register.php");
            
        }
        else{
            //2.2 nếu chưa ồn tại thì ms lưu
            //băm pass
            $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
            $sql_2 = "INSERT INTO users(name_user, email, password) VALUES('$name','$email','$pass_hash')";
            $result_2 = mysqli_query($conn,$sql_2); //vì thực hiện insert: kq trẩ về của result_2 là số bản ghi thành công(số nguyên)

            if($result_2 > 0){
                $_SESSION['login'] = "<div class='text-success'>Đăng ký thành công.</div>";
                
                header("Location: index.php");
            }
        }
    }
   

?>