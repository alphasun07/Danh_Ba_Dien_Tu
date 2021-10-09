<?php
include('templates/header.php')
?>
      <div class="row nav-menu ">
         
          <div class="row">  
            <div class="col-md-12">
              <table class="table table-success table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tên đơn vị</th>
                  </tr>
                </thead>
                <tbody>       
                  <?php
                      $sql="SELECT nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv FROM db_nhanvien nv, db_donvi dv WHERE nv.madv=dv.madv";
                      $result = mysqli_query($conn,$sql);

                      //xuwr lys keets quar trarve
                    if(mysqli_num_rows($result)>0){
                      $i=1;
                      while($row = mysqli_fetch_assoc($result)){
                  ?>      
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row['tennv']; ?></td>
                      <td><?php echo $row['chucvu']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['sodidong']; ?></td>
                      <td><?php echo $row['tendv']; ?></td>
                                                        
                    </tr>
                <?php
                      $i++;
                    }
                  }
                ?>
                </tbody>
              </table>
            </div>                
          </div>
      </div>
<?php
include('templates/footer.php')
?>