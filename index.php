<?php
include('templates/header.php')
?>
      <div class="row nav-menu ">
          <div class="col-md-5 mx-auto m-3">
              <form class="d-flex" action="search.php" method = "GET" >
                    <input class="form-control me-2" type="search" name = "ipSearch" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" name="search" type="submit">Search</button>
              </form>
            </div>
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