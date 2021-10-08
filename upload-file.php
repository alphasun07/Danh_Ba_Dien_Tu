<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <form action="process-upload.php" method="post" enctype="multipart/form-data">
    <div class="avatar" style="Width:100px">
        <img src="IMG/avata1.jpg" id="avatar" alt="">
    </div>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Cập nhật ảnh đại diện" name="submit">
    </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#fileToUpload").change(function(e){
                alert(e.target,file[0].name);
                $("#avatar").attr('src','image/'+e.target.file[0].name);
            })
        })
    </script>

  </body>
</html>