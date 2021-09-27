<?php
//ktra là người dùng nhấn nút chưa
    if(isset($_POST['submit'])){
        $tennv  = $_POST['txthoten'];
        $chucvu = $_POST['txtchucvu'];
        $mayban = $_POST['txtmayban'];
        $email  = $_POST['txtemail'];
        $sodidong = $_POST['sodidong'];
        $madv   = $_POST['sltMaDV'];

        require("../config/constants.php");

        $sql="INSERT INTO db_nhanvien(tennv,chucvu,mayban,email,sodidong,madv)
        VALUES($tennv,$chucvu,$mayban,$email,$sodidong,$madv)";

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