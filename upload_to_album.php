<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
      }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta charset="UTF-8">
    <title>LightFinger</title>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/view.css" rel="stylesheet" type="text/css">
    <link href="css/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="css/album.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="outer">
        <div class="left_panel">
            <div class="logo">
                <img src="images/Logo.png">
            </div>
            <!-- <div class="pnel_tab">
           <a href="view.html">
            <section class="active">All Photos</section>
           </a>
           <a href="view_complete.html">
            <section>Completed</section>
           </a>
        </div> -->
        </div>
        <div class="right_panel">
            <div class="panel_body">
                <div class="panel_head">
                    <section class="tab_nav active_tab">
                        Upload Photos
                    </section>
                    <div class="clear"></div>
                </div>
                <div class="album_form_outer">
                    <div class="album_wrap">
                        <p>Album Name</p>
                        <form action="" method="POST" enctype="multipart/form-data" name="album">
                            <div class="upload_block">
                                <span>Drag files or Click to upload</span>
                                <input type="file" name="image">
                            </div>
                    </div>
                    <section>
                            <input type="submit" value="Upload" name="" class="can_sub_btn">
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <script rel="script" src="js/jquery-1.8.2.min.js"></script>
        <script rel="script" src="js/main.js"></script>
</body>

</html>