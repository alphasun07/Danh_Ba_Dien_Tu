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
        header('location:'.SITEURL.'admin/index.php');
    }
    else
    {
        echo "xóa thất bại";
       
    }

?>

<?php
    include('templates-admin/footer.php');
?>