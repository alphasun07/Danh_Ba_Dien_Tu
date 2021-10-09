<?php
    include('../config/constants.php');
?>

<?php
//ktra code
    $code= $_GET['code'];
    $email = $_GET['email'];

    $sql = "SELECT * from users where email='$email' and code='$code'";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){
        $sql1 = "UPDATE users SET STATUS=1 WHERE email='$email' and code='$code'";
        $query1 = mysqli_query($conn,$sql1);

        if($query1 == TRUE)
        {
            $_SESSION['verify'] = "<div class='col-12 text-center fs-3 text fw-normal text-uppercase'>Chúc mừng bạn đã xác thực tài khoản thành công. Xin vui lòng đăng nhập lại bằng tài khoản của bạn</div><a class='m-auto w-25 btn btn-primary' href='login.php'>Đăng nhập</a>";
    
        }
        else
        {
            $_SESSION['verify'] = "<div class='col-12 text-center fs-3 text fw-normal text-uppercase'>Chúng tôi đã gặp lỗi khi xác thực tài khoản của bạn. Vui lòng thử lại sau giây lát</div><a class='m-auto w-25 btn btn-primary' href='".SITEURL."admin/index.php?email=".$email."&code=".$code."'>Thử lại</a><a class='m-auto w-25 btn btn-secondary' href='signup.php'>Đăng Ký</a>";
        }

    }

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
            <div class="row w-50 py-5 h-50 mx-auto border rounded border-5 d-flex align-items-center">

            <?php
                if(isset($_SESSION['verify'])){
                    echo $_SESSION['verify'];
                    unset ($_SESSION['vetify']);
                }
            ?>
            </div>
        </div>
    </body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>

