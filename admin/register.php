<?php
include('templates-admin/header-login.php');
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

                                if(isset($_SESSION['reg'])){
                                    echo $_SESSION['reg'];
                                    unset ($_SESSION['reg']);
                                }

                            ?>
                      
                        <form action="" METHOD = "POST" class="mx-1 mx-md-4">
                                
                          

                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="text" id="lastName" name="name_user" class="form-control" />
                                <label class="form-label" for="name">Họ và Tên</label>
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
                                <label class="form-label" for="pass1">Mật khẩu</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
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
    include('templates-admin/footer.php');
?>


<?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;
     
     require '../phpmailer/Exception.php';
     require '../phpmailer/PHPMailer.php';
     require '../phpmailer/SMTP.php';

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
            $_SESSION['reg'] = "<div class='text-danger'>Email đã được sử dụng</div>";
            header("Location: register.php");
            
        }
        else{
            //2.2 nếu chưa ồn tại thì ms lưu
            //băm pass
            $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
            $sql_2 = "INSERT INTO users(name_user, email, password) VALUES('$name','$email','$pass_hash')";
            $result_2 = mysqli_query($conn,$sql_2); //vì thực hiện insert: kq trẩ về của result_2 là số bản ghi thành công(số nguyên)

                    //gửi email tới địa chỉ đã đky
        //cần trung gian gửi nhận email(sd tk gmail làm trung gian ) và sd 1 thư viện gửi mail
        //key search: PHP sendemail from locahost uisng gmail
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'doanh0712@gmail.com';// SMTP username
            $mail->Password = '2047122112'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('doanh0712@gmail.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
        
            $mail->addReplyTo('doanh0712@gmail.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
              
            $mail->addAddress($email); // thay = tên biến chứa email đky
            
            // Attachments
            // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
        
        
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = '[Đăng ký thành công] Kích hoạt tài khoản để sử dụng';
            $mail->Subject = $tieude;
            
            $str = rand();
            $code = md5($str);
        
            // Mail body content 
            $bodyContent = '<p>Chào mừng bạn đến với Admin</b></h1>'; 
            $bodyContent .= '<p>Vui lòng nhấp vào đường link bên dưới để xác nhận</p>'; 
            $bodyContent .= '<p><a href="http://localhost/project02/activation.php?account='.$email.'.&code='.$code.'">Click here</p>';
        
            
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()){
                echo 'Thư đã được gửi đi';
            }else{
                echo 'Lỗi. Thư chưa gửi được';
            }  
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

            if($result_2 > 0){
                $_SESSION['reg'] = "<div class='text-success'>Đăng ký thành công.</div>";
                
                header("Location: index.php");
            }
        }
    }
   

?>