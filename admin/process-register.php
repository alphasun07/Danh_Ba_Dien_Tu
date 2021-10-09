<?php
    include('../config/constants.php');
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
        $_SESSION['reg_fail'] = "<div class='text-danger'>Email đã được sử dụng</div>";
        header('location:'.SITEURL.'admin/register.php');
    }
    else{
        //2.2 nếu chưa ồn tại thì ms lưu
        //băm pass
      
        $str = rand();
        $code = md5($str);
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $sql_2 = "INSERT INTO users(name_user, email, password,code) VALUES('$name','$email','$pass_hash','$code')";
        $result_2 = mysqli_query($conn,$sql_2); //vì thực hiện insert: kq trẩ về của result_2 là số bản ghi thành công(số nguyên)

                //gửi email tới địa chỉ đã đky
    //cần trung gian gửi nhận email(sd tk gmail làm trung gian ) và sd 1 thư viện gửi mail
    //key search: PHP sendemail from locahost uisng gmail

    $mail = new PHPMailer(true);

    //lấy ra code viết email
   
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
        $mail->Password = 'akzabdgjzbieiwnu'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587; // TCP port to connect to
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('doanh0712@gmai.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
    
        $mail->addReplyTo('doanh0712@gmai.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
        
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
 

        if($result_2 > 0){
            $_SESSION['reg_success'] = "<div class='text-success'>Hãy xác thực email của bạn để hoàn tất việc đăng ký tài khoản</div>"; 
            header("location: http://localhost/dhtl3/admin/login.php?email=$email"); 

        }
    }
} exit;?>