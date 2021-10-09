<?php
include_once('templates-admin/header-login.php');
?>
  <body>
    <section class="vh-100">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11 m-4 ">
                <div class="card text-black " style="border-radius: 25px;">
                <div class="card-body p-2">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-3">Đăng Ký</p>
                          <?php

                                if(isset($_SESSION['reg_fail'])){
                                    echo $_SESSION['reg_fail'];
                                    unset ($_SESSION['reg_fail']);
                                }

                            ?>                     
                        <form action="process-register.php" METHOD = "POST" class="mx-1 ">

                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" id="" name="name_user" class="form-control" />
                                    <label class="form-label" for="name">Họ và Tên</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="email" id="email" name="txtemail" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="password" id="pass1" name="pass1" class="form-control" />
                                    <label class="form-label" for="pass1">Mật khẩu</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="password" id="pass2" name="pass2" class="form-control" />
                                    <label class="form-label" for="pass2">Nhập lại mật khẩu</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" class="btn btn-primary" name="signup">Đăng ký</button>
                            </div>

                        </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                        <img src="../IMG/DaihocThuyLoi.jpg" class="img-fluid" alt="Sample image">

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

  </body>
<?php
include_once('templates-admin/footer.php');
?>
