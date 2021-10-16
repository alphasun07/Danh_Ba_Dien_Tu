$(document).ready(function(){
   //select form có id -> bắt sự kiện submit của form đấy -> thục hiện function
   //e: đối tg gửi đi sự kiện
   var newFileName = '';//biến để đổi tên khởi tạo 1 biến ms
   var id = $('#userid').text();//lấy ra id của nhân viên
   $('#form_avatar').on('submit',function(e){
      e.preventDefault();//ngắn k cho gửi đi method post
      var dt = new Date();

      var filename = new FormData(this);

      newFileName = id + String(dt.getFullYear()) + String(dt.getMonth()+1) + String(dt.getDate()) + String(dt.getHours()) + String(dt.getMinutes()) + String(dt.getSeconds()) + "." + filename.get('file_image').name.split('.').pop().toLowerCase();
     
      filename.append('submit',''); //theem 1 submit vào data
      filename.append('newFileName',newFileName);

      $.ajax({
         url: 'update-profile.php',
         method: 'POST',
         type: 'POST',
         data: filename,
         processData: false,
         contentType: false,
         success: function(){
            $('#anh2').attr('src','images/'+newFileName);
         }
      })

   })

   //cho form sửa
   $('#edit_profile').on('submit',function(e){
      e.preventDefault();
      var dt = new FormData(this);
      dt.append('up-profile','');

      $.ajax({
         url: 'update-profile.php',
         method:'POST',
         type: 'POST',
         data: dt,
         cache:false,
         processData: false,
         contentType: false,
         
         success: function(){
            alert('Đã lưu thay đổi');
            $('#txthoten').text(dt.get('txthoten'));
            $('#txtdiachi').text(dt.get('txtdiachi'));
            $('#txtgioitinh').text(dt.get('txtgioitinh'));
            $('#ngaySinh').text(dt.get('txtngaysinh'));
            $('#sdt').text(dt.get('sdt'));
            $('#txtemail').text(dt.get('txtemail'));
            
         }
         
      })
   })
})