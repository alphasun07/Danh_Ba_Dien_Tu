
<?php
//ktra là người dùng nhấn nút chưa
    if(isset($_POST['submit'])){
        //lấy  gtri form lưu vào biến
        $tenNV  = $_POST['txthoten'];
        $chucvu = $_POST['txtchucvu'];
        $mayban = $_POST['txtmayban'];
        $email  = $_POST['txtemail'];
        $sodidong = $_POST['sodidong'];
        $madv   = $_POST['sltMaDV'];

        //kết nối database
        require("../config/constants.php");

        //lệnh sql
        $sql="INSERT INTO db_nhanvien SET 
        tennv = '$tenNV',
        chucvu = '$chucvu',
        mayban = '$mayban',
        email = '$email',
        sodidong = '$sodidong',
        madv = '$madv' ";
 
        $query = mysqli_query($conn,$sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($query==TRUE)
        {
            $_SESSION['add']="<div class='text-success'>Thêm nhân viên thành công.</div>";

            header('location:' .SITEURL. 'admin/index.php');
        }
        else
        {
            $_SESSION['add']="<div class='text-danger'>Thêm nhân viên thất bại.</div>";
            header('location:' .SITEURL. 'admin/index.php');

        }

    }
?>