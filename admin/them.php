<?php
include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Thêm</h2>
        </div>

  <!-- sửa -->
        <div class="container col-md-5 mx-auto">
            <form action="process-add.php" method="POST">
                <div class="row mb-1">
                    <label for="exampleInputEmail1" class="form-label">Họ Tên</label>
                    <input type="text" class="form-control form-select-sm" id="txthoten" name="txthoten" aria-describedby="emailHelp">
                </div>
                <div class="row mb-1">
                    <label for="exampleInputPassword1" class="form-label">Chức Vụ</label>
                    <input type="text" class="form-control form-select-sm" id="txtchucvu" name="txtchucvu">
                </div>
                <div class="row mb-1">
                    <label for="exampleInputPassword1" class="form-label">máy bàn</label>
                    <input type="tel" class="form-control form-select-sm" id="txtmayban" name="txtmayban">
                </div>
                <div class="row mb-1">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control form-select-sm" id="txtemail" name="txtemail">
                </div>
                <div class="row mb-1">
                    <label for="exampleInputPassword1" class="form-label">Số di động</label>
                    <input type="tel" class="form-control form-select-sm" id="sodidong" name="sodidong">
                </div>
                <div class="row mb-1 ">
                    <label for="exampleInputPassword1" class="form-label">Tên Đơn Vị</label>
                    <select class="form-select form-select-sm" name="sltMaDV" id="sltMaDV">
                       <?php
                            //kết nối server
                            require('../config/constants.php');

                            //truy ván đữ liệu
                            $sql = "SELECT * FROM db_donvi";
                            $result = mysqli_query($conn,$sql);

                            //xử lý kết quả
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value = "'.$row['madv'].'">'.$row['tendv'].'</option>';
                                }
                            }

                            //đóng kết nối
                            mysqli_close($conn);
                       ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-info" name="submit">Submit</button>
            </form> 
           
        </div>    
    

    </div>
</div>

<?php
    include('templates-admin/footer.php');
?>