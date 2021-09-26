<?php
include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Thêm</h2>
        </div>

  <!-- sửa -->
        <div class="container">
            <div class="col-md-5 mx-auto">
                <form action="" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Họ và tên: </td>
                            <td>
                                <input type="text" name="hoTen" placeholder="Nhập Họ và tên">
                            </td>
                        </tr>

                        <tr>
                            <td>Chức vụ: </td>
                            <td>
                                <input type="text" name="chucvu" placeholder="Nhập chức vụ">
                            </td>
                        </tr>

                        <tr>
                            <td>Email: </td>
                            <td>
                                <input type="email" name="email" placeholder="Nhập Email">
                            </td>
                        </tr>

                        <tr>
                            <td>Số Điện Thoại: </td>
                            <td>
                                <input type="tel" name="sdt" placeholder="Nhập số điện thoại">
                            </td>
                        </tr>

                        <tr>
                            <td>Tên đơn vị: </td>
                            <td>
                                <input type="text" name="tenDonVi" placeholder="Nhập tên đơn vị">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add" class="btn btn-secondary">
                            </td>
                        </tr>

                    </table>

                </form>
            </div>
        </div>    
    <?php
        if(isset($_POST['submit']))
        {
            $sql = "INSERT INTO db_nhanvien SET 
                tennv='$hoTen',
                chucvu='$chucvu',
                email='$email',
                sdt='$sodidong',
                tenDonVi='$tendv'
            ";
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
        }
    ?>

    </div>
</div>

<?php
    include('templates-admin/footer.php');
?>