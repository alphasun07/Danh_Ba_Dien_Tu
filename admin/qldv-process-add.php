<?php
    if(isset($_POST['add'])){
        $tendonvi = $_POST['txtdonvi'];
        $diachi = $_POST['txtdiachi'];
        $sdt = $_POST['sodienthoai'];
        $email = $_POST['txtemail'];
        $website = $_POST['txtwebsite'];
        $madvCha = $_POST['dvcha'];

        require("../config/constants.php");

        //lệnh sql
        $sql="INSERT INTO db_donvi SET 
        tendv = '$tendonvi',
        diachi = '$diachi',
        dienthoai = '$sdt',
        email = '$email',
        website = '$website',
        madv_cha = $madvCha ";

        $query = mysqli_query($conn,$sql);

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($query==TRUE )
        {
            $_SESSION['add-qldv']="<div class='text-success'>Thêm đơn vị thành công.</div>";
            header('location:' .SITEURL. 'admin/qldv.php');
        }
        else
        {
            $_SESSION['add-qldv']="<div class='text-danger'>Thêm đơn vị thất bại.</div>";
            header('location:' .SITEURL. 'admin/qldv.php');
        }
    }
?>