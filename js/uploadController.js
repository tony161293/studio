$(document).ready(function(){
    var size = 0;
    var namearray = "";
    $('#uploadImage').change(function(){
        if(this.files.length>0){
            $.each(this.files, function(index, value){
                size += value.size/1024;
                namearray += value.name;
                }
            );
        }
        alert(size + " KB, ", namearray);
    });
});