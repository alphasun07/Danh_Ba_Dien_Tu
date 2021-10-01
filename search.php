<?php
include('templates/header.php')
?>

<div>
<?php

    if(isset($_GET['search'])){
        $search = ($_GET['ipSearch']);
        //ktra xem ô tìm kiếm còn trống hay không
        if(empty($search)){
            echo "Vui lòng nhập vào ô tìm kiếm";
        }
        else{

            //dùng lệnh like trong sql
            $sql = "SELECT * FROM db_nhanvien WHERE tennv like '%$search%'";

            //thực thi truy vấn
            $query = mysqli_query($conn,$sql);

            //đém số dòng trả về trong sql
            $num = mysqli_num_rows($query);

            //nếu có kqua thì hiển thị, k có thì tbao
            if($num >0 && $search != ""){

                //dùng  $num đếm số dòng trả về
                echo "<h5>Có $num kết quả trả về với từ khóa '<b>$search</b>'</h5>";
               
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
                  </tr>
                </thead>
              
    <?php
        $i=1;
                //vòng lặp while và mysql_f_ass > lấy toàn bộ dlieu
                while($row = mysqli_fetch_assoc($query)){
    ?>
                <tbody>
                    <tr>
                       <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row['tennv']; ?></td>
                        <td><?php echo $row['chucvu']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['sodidong']; ?></td>
                        <td><?php echo $row['tendv']; ?></td>
                    </tr>;
              
                }
        <?php
                $i++;    
            }     
        }
        else {
            echo "Không tìm thấy kết quả!";}
    }
    }
?>
        </tbody>
    </table>
</div>