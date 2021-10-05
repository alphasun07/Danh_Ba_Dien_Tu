<?php
include('templates-admin/header.php');
?>  

<?php
   //lấy id là manv
    $id = $_GET['manv'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM db_nhanvien WHERE manv=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {           
        $_SESSION['delete']="<div class='text-success'>Xóa nhân viên thanh công.</div>";
        header('location:' .SITEURL. 'admin/index.php');

    }
    else
    {
        $_SESSION['delete']="<div class='text-danger'>Xóa nhân viên thất bại.</div>";
        header('location:' .SITEURL. 'admin/index.php');
  
    }

?>

<?php 
    include('templates-admin/footer.php');
?>