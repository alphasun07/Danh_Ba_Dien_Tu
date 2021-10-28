<?php
include('templates-admin/header.php')
?>
    <div class="row nav-menu">
      <?php
        //ktra session có tồn tại hay k và phải có tên
          if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];

              //xóa session add
              unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }

            if(isset($_SESSION['login']))
            {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
            }

      ?>
          <!--cây tree  -->
          <div class="row container">  
            <div class="col-md-3">
              <div class="tree-view m-5">
                <ul id="myUL">
                  <li><span class="caret"><a class="closed open" href="#">Quản lý người dùng</a></span>
                    <ul class="nested">
                      <li><a href="index.php"><i class="bi bi-folder">Tất cả người dùng</i></a></li>
                      <li><a href="#"><i class="bi bi-folder">Khoa CNTT</i></a></li>
                      <li><a href="#"><i class="bi bi-folder">Khoa Cơ khí</i></a></li>
                      <li><a href="#"><i class="bi bi-folder">Khoa Kinh tế</i></a></li>
                    </ul>
                  </li>
                  <li><span class="caret"><a class="closed open" href="#">Quản lý đơn vị</a></span>
                    <ul class="nested">
                      <li><a href="qldv.php"><i class="bi bi-folder">Tất cả đơn vị</i></a></li>
                      <li><a href="#"><i class="bi bi-folder">Khoa</i></a></li>
                      <li><a href="#"><i class="bi bi-folder">Bộ môn</i></a></li>  
                      <li><a href="#"><i class="bi bi-folder">Phòng ban</i></a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            
            <!-- bảng -->
            </div>
            <div class="col-md-9">
              <a class="btn btn-primary m-3" href="them.php" role="button">Thêm mới</a>
                <div id="table">
                  <table class="table table-success table-striped">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tên đơn vị</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php

                          $sql="SELECT nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv FROM db_nhanvien nv, db_donvi dv WHERE nv.madv=dv.madv";
                          $result = mysqli_query($conn,$sql);

                          //xuwr lys keets quar trarve kta xem có hay k
                        if(mysqli_num_rows($result)>0){
                          $i=1;
                          //sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp
                          while($row = mysqli_fetch_assoc($result)){
                      ?>      
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $row['tennv']; ?></td>
                          <td><?php echo $row['chucvu']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['sodidong']; ?></td>
                          <td><?php echo $row['tendv']; ?></td>
                          <td><a href="http://localhost/dhtl3/admin/sua.php?manv=<?php echo $row['manv'];?>"><i class="bi bi-pencil-square"></i></a></td>
                          <td><a href="http://localhost/dhtl3/admin/xoa.php?manv=<?php echo $row['manv'];?>"><i class="bi bi-trash"></i></i></a></td>
                            
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

          <!-- nhập file -->
                <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nhập file
          </button>
            
          <!-- xuất file -->
          <form action="import-export.php" method="POST" enctype="multipart/form-data" >             
            <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill" data-mdb-ripple-color="dark" name = "sub-export">Xuất file</button>
          </form>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">

              <!--up file  -->
              <form action="import-export.php" method="POST" enctype="multipart/form-data" id="form_import" name="form_import">             
                  <input type="file" name="file_import" >   

                  <!-- <input type="file" class="custom-file-upload"  > -->
                  <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill" data-mdb-ripple-color="dark" name = "preview">Xem trước tệp</button>
              </form>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <!-- btn hủy và lưu -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="button" class="btn btn-primary"data-bs-dismiss="modal" name="sub-import">Lưu</button>
            </div>
          </div>
        </div>
      </div>
<?php
include('templates-admin/footer.php')
?>
<script src="js/import.js"></script>


<script>
  var toggler = document.getElementsByClassName("caret");
  var i;

  for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
      this.parentElement.querySelector(".nested").classList.toggle("active");
      this.classList.toggle("caret-down");
    });
  }
</script>