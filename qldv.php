<?php
include('templates/header.php')
?>
      <div class="row nav-menu ">
          <div class="row">  
            <div class="col-md-12 mx-auto">

              <table class="table table-success table-striped">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Đơn Vị</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Tên Đơn Vị Cha</th>

                  </tr>
                </thead>
                <tbody>       
                  <?php
                      $sql="SELECT dv.madv, dv.tendv, dv.email, dv.diachi, dv.website, dv.dienthoai, dv.madv_cha, dv1.tendv as TenDV_Cha from db_donvi as dv, db_donvi as dv1 where dv.madv_cha = dv1.madv
                      UNION
                      select madv, tendv, email, diachi, website, dienthoai, madv_cha, null as TenDV_Cha from db_donvi where madv_cha is null";
                      $result = mysqli_query($conn,$sql);

                      //xuwr lys keets quar trarve
                    if(mysqli_num_rows($result)>0){
                      $i=1;
                      while($row = mysqli_fetch_assoc($result)){
                  ?>      
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row['tendv']; ?></td>
                        <td><?php echo $row['diachi']; ?></td>
                        <td><?php echo $row['dienthoai']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['website']; ?></td>
                        <td><?php echo $row['TenDV_Cha']; ?></td>
                                                    
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