
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
        $sql="INSERT INTO db_nhanvien (tennv,chucvu,mayban,email,sodidong,madv) 
        VALUES('$tenNV','$chucvu','$mayban','$email','$sodidong','$madv)";
 
        $query = mysqli_query($conn, $sql); 

        echo $sql."<br>";

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if(mysqli_query($conn,$sql)==TRUE)
        {
         
            echo "thnahf công";
        }
        else
        {
            echo " thất bại";
        }

        mysqli_close($conn);
    }
?>