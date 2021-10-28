<?php
include('../config/constants.php');

if(isset($_POST["preview"])){
    $filename=$_FILES["file_import"]["tmp_name"];    
    if($_FILES["file_import"]["size"] > 0)
    {      
        $file = fopen($filename, "r");
        ?>
        <table class="table table-secondary table-striped table-bordered">
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
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $STT = $getData[0];
                    $tennv = $getData[1];
                    $chucvu = $getData[2];
                    $mayban = $getData[3];
                    $email = $getData[4];
                    $sodidong = $getData[5];
                    $donvi = $getData[6];
                    ?>
                     <tr>
                          <th scope="row"><?php echo $STT; ?></th>
                          <td><?php echo $tennv; ?></td>
                          <td><?php echo $chucvu; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $sodidong; ?></td>
                          <td><?php echo $donvi; ?></td> 
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        <?php
    }
}
?>
