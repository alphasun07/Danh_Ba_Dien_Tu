$(document).ready(function(){
   //select form có id -> bắt sự kiện submit của form đấy -> thục hiện function
   //e: đối tg gửi đi sự kiện
   var newFileName = '';
   var id = $('#userid').text();
   $('#form_avatar').on('submit',function(e){
      e.preventDefault();//ngắn k cho gửi đi method post
      var dt = new Date();

      var data = new FormData(this);
      newFileName = id + String(dt.getFullYear()) + String(dt.getMonth()+1) + String(dt.getDate()) + String(dt.getHours()) + String(dt.getMinutes()) + String(dt.getSeconds()) + "." + data.get('file_image').name.split('.').pop().toLowerCase();
     
      data.append('submit',''); //theem 1 submit vào data
      data,append('newFileName',newFileName);

      $.ajax({
         url: 'update-profile.php',
         method: 'POST',
         type: 'POST',
         data: data,
         cache: false,
         processData: false,
         contentType: false,
         success: function(){
            $('#anh2').attr('src','images/'+data.get('file_image').name);
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