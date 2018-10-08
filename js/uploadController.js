$(document).ready(function(){
    var size = 0;
    var namearray = "";
    $('#uploadImage').click(function(){
        $('#uploadMessage').html('Click to upload files');
    });
    $('#uploadImage').change(function(){
        if(this.files.length>0){
            $.each(this.files, function(index, value){
                size += value.size/1000000;
                namearray += $('#uploadImage').val().split('\\').pop() + ",";
                }
            );
            if(size>30){
                $('#uploadImage').val("");
                size = 0;
                $('#uploadMessage').html('The selected files are too big in size. Please select separately or upload a smaller size.');
            } 
            $('#uploadMessage').html(namearray);
        }
    });
});