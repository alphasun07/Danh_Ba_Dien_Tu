$(document).ready(function(){
    $("#fileToUpload").change(function(e){
        alert(e.target.file[0].name);
        $("#avatar").attr('src','image/'+e.target.file[0].name);
    })
})
