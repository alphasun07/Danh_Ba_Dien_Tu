<?php
    include('../config/constants.php');
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
        header('location:'.SITEURL.'admin/register.php');
    }
    else{
        //2.2 nếu chưa ồn tại thì ms lưu
        //băm pass
        $code = rand();
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $sql_2 = "INSERT INTO users(name_user, email, password,code) VALUES('$name','$email','$pass_hash','$code')";
        $result_2 = mysqli_query($conn,$sql_2); //vì thực hiện insert: kq trẩ về của result_2 là số bản ghi thành công(số nguyên)

                //gửi email tới địa chỉ đã đky
    //cần trung gian gửi nhận email(sd tk gmail làm trung gian ) và sd 1 thư viện gửi mail
    //key search: PHP sendemail from locahost uisng gmail
 

        if($result_2 > 0){
            $_SESSION['reg'] = "<div class='text-success'>Đăng ký thành công.</div>"; 
            header("location: http://localhost/dhtl3/admin/verify.php?email=$email"); 

        }
    }
} exit;?>