<?php include 'connect.php';?>
<?php
$finished_status = false;
$message = "Upload Photos";
if(isset($_GET['albumname'])){
    $albumname = $_GET['albumname'];
    $checksql_finished = "SELECT id FROM finished_album WHERE album_name='".$albumname."'";
    $result = $con->query($checksql_finished);
    if($result->num_rows > 0){
        $finished_status = true;
    }
    if(isset($_POST['submit'])){
        if(count($_FILES['images']['name']) > 0){
            for($i=0; $i<count($_FILES['images']['name']); $i++){
                $tmpFilePath = $_FILES['images']['tmp_name'][$i];
                if($tmpFilePath != ""){
                    $file_name = $_FILES['images']['name'][$i];
                    $filePath = "uploads/".$file_name;
                    if(move_uploaded_file($tmpFilePath, $filePath)) {
                        if($finished_status){
                            $sql = "INSERT INTO image_uploads(image_name, album_name, is_sorted, is_finished) VALUES ('$file_name', '$albumname', false, true)";
                        }
                        else{
                            $sql = "INSERT INTO image_uploads(image_name, album_name, is_sorted, is_finished) VALUES ('$file_name', '$albumname', false, false)";
                        }
                        if (mysqli_query($con, $sql)) {
                            $message = "Upload complete";
                        } else {
                            $message = "Upload failed";
                        }
                    }
                }
            }
        }
        
    }
}
else{
    $redirect_url = "/studio/dashboard/album_list.php";
    echo '<script type="text/javascript">
            window.location = "'.$redirect_url.'"
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta charset="UTF-8">
    <title>LightFinger</title>
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../css/view.css" rel="stylesheet" type="text/css">
    <link href="../css/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="../css/album.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="outer">
        <div class="left_panel">
            <div class="logo">
                <img src="../images/Logo.png">
            </div>
        </div>
        <div class="right_panel">
            <div class="panel_body">
                <div class="panel_head">
                    <section class="tab_nav active_tab">
                        <?php echo $message; ?>
                    </section>
                    <div class="clear"></div>
                </div>
                <div class="album_form_outer">
                    <div class="album_wrap">
                        <p>Album Name</p>
                        <form action="" method="POST" enctype="multipart/form-data" name="album">
                            <div class="upload_block">
                                <span>Drag files or Click to upload</span>
                                <input type="file" name="images[]" multiple="multiple">
                            </div>
                    </div>
                    <section>
                            <input type="submit" value="Upload" name="submit" class="can_sub_btn">
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <script rel="script" src="js/jquery-1.8.2.min.js"></script>
        <script rel="script" src="js/main.js"></script>
</body>

</html>