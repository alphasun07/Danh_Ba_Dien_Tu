
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

//lấy ra định dạng ảnh
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo $target_file;
echo '<pre>';
echo print_r($_FILES['fileToUpload']);
echo '</pre>';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    else{
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file){
            echo "tệp tin đc tải thành công";
        }
        else{
            echo"thát bại;
        }
    }
}
?>