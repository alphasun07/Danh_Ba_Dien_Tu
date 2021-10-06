<?php
include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Sửa</h2>
        </div>

        <!-- sửa -->
        <div class="container">
            <?php 
            #b2; lay ma nv
                if(isset($_GET['madv']))
                {
                    $madv = $_GET['madv'];

            #b3: select trong bang database
                    $sql= "SELECT * FROM db_donvi WHERE madv=$madv";
                    $query= mysqli_query($conn,$sql);

                    #lấy ra 1 dongf
                    $row= mysqli_fetch_assoc($query);
                }
            ?>

            <form action="" METHOD="POST">
                <div class="col-md-6 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3">Tên đơn vị</span>
                        <input type="text" class="form-control" name= "txtdonvi" placeholder="Nhập tên đơn vị" 
                        value = "<?php echo $row['tendv']; ?>" >
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Địa chỉ</span>
                        <input type="text" class="form-control" name= "txtdiachi" placeholder="Nhập địa chỉ" value = "<?php echo $row['diachi'];?>">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Điện thoại</span>
                        <input type="tel" class="form-control" name= "sodienthoai" placeholder="Nhập số sđt" value ="<?php echo $row['dienthoai'];?>">
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Email</span>
                        <input type="email" class="form-control" name="txtemail" placeholder="Nhập email" value = "<?php echo $row['email'];?>" >      
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Website</span>
                        <input type="text" class="form-control" name="txtwebsite" placeholder="Nhập website" value = "<?php echo $row['website'];?>">             
                    </div>

                    <div class="input-group mb-2 "> 
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên Đơn Vị cha</label>
                        <select class="form-select form-select-sm" name="dvcha" id="dvcha">
                            
                        <?php

                            //truy ván đữ liệu
                            $sql = "SELECT * FROM db_donvi";
                            $result = mysqli_query($conn,$sql);

                            if(mysqli_num_rows($result) >0){
                                while ($row1 = mysqli_fetch_assoc($result)){
                                  if($row['madv_cha'] != null)
                                  {
                                      if ($row1['madv'] == $madv_cha)
                                      {
                                        echo "<option value=". $row1['madv'] ." selected >". $row1['tendv'] ."</option>";
                                      }
                                      else 
                                      {
                                        echo "<option value=". $row1['madv'] .">". $row1['tendv'] ."</option>";
                                      };
                                      if ($i==mysqli_num_rows($result))
                                      {
                                        echo '<option value=null>Trống</option>';
                                      };
                                    }
                                  else 
                                  {
                                      if ($i==1) 
                                      {
                                        echo '<option value=null selected>Trống</option>';
                                        echo "<option value=". $row1['madv'] .">". $row1['tendv'] ."</option>";
                                      }
                                      else 
                                      {
                                        echo "<option value=". $row1['madv'] .">". $row1['tendv'] ."</option>";
                                      };
                                    };
                                      $i++;
                                  }
                            }       
                        ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" name="update">Sửa</button>
                </div>
            </form>   
        </div>        
    </div>
</div>


<?php
    include('templates-admin/footer.php');
?>

<?php
ob_start();
   if(isset ($_POST['update']))
   {  
        $tendonvi = $_POST['txtdonvi'];
        $diachi = $_POST['txtdiachi'];
        $sdt = $_POST['sodienthoai'];
        $email = $_POST['txtemail'];
        $website = $_POST['txtwebsite'];
        $madvCha = $_POST['dvcha'];

        //lệnh truy vấn sql để update
        $sql = "UPDATE db_donvi SET
        tendv = '$tendonvi',
        diachi = '$diachi',
        dienthoai = '$sdt',
        email = '$email',
        website = '$website',
        madv_cha = $madvCha WHERE madv = $madv";

        //thưc hiện truy vấn đối vs csdl
        $query = mysqli_query($conn, $sql); 

        if($query==TRUE)
        {
            $_SESSION['update-qldv']="<div class='text-success'>Sửa nhân viên thành công.</div>";
            header('location: http://localhost/dhtl3/admin/qldv.php');
        }
        else
        {
            $_SESSION['update-qldv']="<div class='text-danger'>Sửa nhân viên thất bại.</div>";
            header('location: http://localhost/dhtl3/admin/qldv.php');
        }
   }
?>