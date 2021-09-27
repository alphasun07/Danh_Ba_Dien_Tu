<?php 
            include("../config/constants.php");
     
        
?>
<?php
    // Kết nối Database
  
    $id=$_GET['manv'];
    $sql="SELECT * FROM db_nhanvien WHERE id=$id";
    $query = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($query);

    if (isset($_POST['update'])){
        $tennv  = $_POST['txthoten'];
        $chucvu = $_POST['txtchucvu'];
        $mayban = $_POST['txtmayban'];
        $email  = $_POST['txtemail'];
        $sodidong = $_POST['sodidong'];
        $madv   = $_POST['sltMaDV'];
        
?>