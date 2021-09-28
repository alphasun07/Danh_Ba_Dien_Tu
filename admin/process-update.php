<?php
    session_start();
    $manv=$_SESSION['manv'];

    include("../config/constants.php");
   

   if(isset ($_GET['update']))
   {
        $tenNV  = $_GET['txthoten'];
        $chucvu = $_GET['txtchucvu'];
        $email  = $_GET['txtemail'];
        $sodidong = $_GET['sodidong'];
        $madv   = $_GET['sltMaDV'];

        //lệnh truy vấn sql để update
        $sql = "UPDATE db_nhanvien SET
        tennv='$tenNV';
        chucvu='$chucvu';
        sodidong= '$sodidong';
        email='$email';
        madv= '$madv' WHERE manv= '$manv'";

        $query = mysqli_query($conn, $sql); 

        if((mysqli_query($conn, $sql))==TRUE)
        {
        
            echo "thnahf công";
            header('location: index.php');
        }
        else
        {
            echo " thất bại";
            
        }


        mysqli_close($conn);
    



   }
?>