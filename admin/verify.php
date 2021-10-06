<!--  CÁI TRANG NÀY ĐỂ GỬI EMAIL CÓ CHƯA ĐƯỜNG LINK CÓ PHUOENG THỨC GET-->

<?php
include('../config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Quản lý Danh Bạ</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body style="height:100vh">
        <div class="m-5">
            <div class="row w-50 py-5 h-50 m-auto border rounded border-5 d-flex align-items-center ">
                <div class="col-12 text-center fs-3 text fw-normal text-uppercase mb-3">
                    Hãy kiểm tra email của bạn và làm theo hướng dẫn để xác thực tài khoản của bạn
                </div>
                <a class="m-auto w-25 btn btn-primary" href="login.php">Đăng nhập</a>
            </div>
        </div>
    </body>
</html>


<?php

       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\SMTP;
       use PHPMailer\PHPMailer\Exception;
       
       require '../phpmailer/Exception.php';
       require '../phpmailer/PHPMailer.php';
       require '../phpmailer/SMTP.php';
   
   $mail = new PHPMailer(true);

   //lấy ra code viết email
  
   $email=$_GET['email'];
   $sql="SELECT*FROM users WHERE email ='$email'";
   $query= mysqli_query($conn,$sql);
   if(mysqli_num_rows($query)>0){
       $row = mysqli_fetch_assoc($query);
        $code =$row['code'];

   }

   try {

       //Server settings
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
   
       // Content
       $mail->isHTML(true); 
   
       // Mail subject 
       $mail->Subject = 'Đăng ký thành công'; 
       
       // Mail body content 
       $bodyContent = '<h1>Chào mừng bạn</h1>'; 
       $bodyContent .= '<p>Bạn hãy nhấn vào đường dẫn sau để kích hoạt tài khoản <a href="http://localhost/dhtl3/admin/verify-code.php?email='.$email.'&code='.$code.'">Click Here</a></p>'; 
       $mail->Body    = $bodyContent; 
       
       // Send email 
       if(!$mail->send()) { 
           echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
       }
   
   
   } catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
   ob_end_flush();
?>