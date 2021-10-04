<?php
include('templates-admin/header-login.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="container col-md-5 mx-auto border border-success border-2 m-5 rounded-3">
            <h3 class="text-center">Đăng Nhập</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name ="txtemail" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="password" name ="pass" class="form-control" id="exampleInputPassword1">
                </div>
                
                <?php
                 
                  if(isset($_SESSION['login'])){
                      echo $_SESSION['login'];
                      unset ($_SESSION['login']);
                  }
             
                ?>
                <button type="submit" class="btn btn-primary mb-2" name="login">Đăng nhập</button>
            </form>
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

            if(password_verify($pass, $pass_saved)){
                //nếu khớp thì > login thành công > chuyenr vào trang index

                //cấp thẻ bài
                $_SESSION['login']= "<div class='text-success'>Đăng nhập thành công.</div>";
                header("Location: index.php");
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
