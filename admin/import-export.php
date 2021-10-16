<?php
    include('../config/constants.php');
    if(isset($_POST["sub-import"])){
        
        $filename=$_FILES["file_import"]["tmp_name"];    
        if($_FILES["file_import"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {

                $sql1 = "SELECT * from db_donvi where tendv='$getData[6]'";
                $res1 = mysqli_query($conn, $sql1);
                $row = [];
                if(mysqli_num_rows($res1)>0){
                    $row1 = mysqli_fetch_assoc($res1);
                }
                $sql2 = "SELECT * from db_nhanvien where email='$getData[4]'";
                $res2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($res2)==0){
                    
                    $sql = "INSERT into db_nhanvien set
                            tennv = '".$getData[1]."',
                            chucvu = '".$getData[2]."',
                            mayban = '".$getData[3]."',
                            email = '".$getData[4]."',
                            sodidong = '".$getData[5]."',
                            madv = '".$row1['madv']."'
                            ";
                    $result = mysqli_query($conn, $sql);
                    if(!isset($result))
                    {
                        echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File.\");
                            window.location = \"index.php\"
                            </script>";   
                    }
                    else {
                    
                    }
                }
            }
            ?>
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
            <?php
        
            fclose($file);  
        }
    }   
?>
<?php
if(isset($_POST["sub-export"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "TenNV", "ChucVu", "MayBan", "Email", "SoDiDong", "DonVi")); 

    $sql = "select manv, tennv, chucvu, mayban, db_nhanvien.email, sodidong, tendv from db_nhanvien, db_donvi where db_nhanvien.madv = db_donvi.madv";
    $result = mysqli_query($conn,$sql);
    $i = 0;
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result)){ 
            $i++;
            $new_row = array($i, $row['tennv'], $row['chucvu'], $row['mayban'], $row['email'], $row['sodidong'], $row['tendv'], );
            fputcsv($output, $new_row); 
        }
    }  
    fclose($output);  
}  
?>
