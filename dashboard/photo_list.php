<?php include 'connect.php';?>
<?php
    session_start();
    if ($_SESSION["user_logged_status"] != true) {
        echo '<script type="text/javascript">
                window.location = "login.php"
            </script>';
    }
    $album_name = $_SESSION["album_name"];
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
    <link type="text/css" rel="stylesheet" href="../css/lightslider.min.css" />
</head>
<body>

<div class="outer">
   <div class="left_panel">
       <div class="logo">
            <img src="../images/Logo.png">
        </div>
       <div class="pnel_tab">
           <a href="photo_list.php">
            <section class="active">All Photos</section>
           </a>
           <a href="photo_list_completed.php">
            <section>Completed</section>
           </a>
           <a href="logout.php">
                <section>Logout</section>
            </a>
        </div>
    </div>
    <div class="right_panel">
        <div class="panel_head">
            <section class="tab_nav active_tab" data-id="#all_photos">
                All
            </section>
            <section class="tab_nav" data-id="#selected_photos">
                <a href="photo_list_selected.php" class="override_a">
                    Selected
                </a>
            </section>
            <div class="sub_pan_btn right">Sorting complete</div>
            <div class="sub_pan_btn right">Submit Selected Photos</div>
            <div class="sub_pan_btn right slideshow">Slideshow</div>
            <div class="clear"></div>
        </div>
        <div class="panel_body">
            <div class="common_panel " id="all_photos">
                <?php 
                    $sql = "SELECT * FROM image_uploads WHERE album_name='$album_name'";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="panel_blocks_duplicate">
                            <img src="uploads/'.$row["image_name"].' "alt="img_err">
                            <div class="panel_name">
                                <p class="image_name">'.$row["image_name"].'</p>
                            </div>
                            <div class="if_selected"></div>
                        </div>';
                        }
                    }
                ?>
        </div>
        <div class="slider_popup">
                <div class="slide_close"></div>
                <div class="demo">
                    <ul id="lightSlider">
                    <?php 
                        $sql_finished = "SELECT * FROM image_uploads WHERE album_name='$album_name'";
                        $result_finished = $con->query($sql_finished);
                        if ($result_finished->num_rows > 0) {
                            while($row = $result_finished->fetch_assoc()) { ?>
                                <li data-thumb="<?php echo 'uploads/'.$row['image_name'] ?>">
                                    <img src="<?php echo 'uploads/'.$row['image_name'] ?>" />
                                    <div class="slide_btm">
                                        <section>
                                            <?php echo $row['image_name']; ?>
                                        </section>
                                    </div>
                                </li>
                            <?php 
                            }
                        }
                    ?>
                    </ul>
                </div>
        </div>
    </div> 
    
</div>


<script rel="script" src="../js/jquery-1.8.2.min.js"></script>
<script rel="script" src="../js/photoSelection.js"></script>
<script rel="script" src="../js/main.js"></script>
<script rel="script" src="../js/view.js"></script>
<script src="../js/lightslider.min.js"></script>

<script type="text/javascript">
    $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9
});
  </script>
</body>
</html>