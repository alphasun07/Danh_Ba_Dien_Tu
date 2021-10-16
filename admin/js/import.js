$(document).ready(function(){
    $('#form_import').on('submit',function(e){
        e.preventDefault();
        var data = new FormData(this);
        data.append('preview','');

        $.ajax({
            url: 'display.php',
            method: 'POST',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                $('.modal-body').html(data);

            }
        })
    })
    //lấy ra cái nút có tên là sub-im
    $('button[name="sub-import"]').on('click',function(e){ //lấy sự kiện cho nút
        var data = new FormData(form_import);
        data.append('sub-import','');
        $.ajax({
            url: 'import-export.php',
            method: 'POST',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
               $('#table').html(data);

            }
        })
    })
})