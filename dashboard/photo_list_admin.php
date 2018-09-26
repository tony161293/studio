<?php include 'connect.php';?>
<?php
    session_start();
    if(isset($_GET['albumname'])){
        $album_name = $_GET["album_name"];
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
    <link type="text/css" rel="stylesheet" href="css/lightslider.min.css" />
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
            <div class="common_panel panel_all" id="all_photos">
            <?php 
                    $sql = "SELECT * FROM image_uploads WHERE album_name='$album_name'";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class=\"panel_blocks\">" . $row["album_name"] . "</div>";
                        }
                    }
                ?>
                <div class="panel_blocks">
                </div>
        </div>
    </div> 
    
</div>


<script rel="script" src="js/jquery-1.8.2.min.js"></script>
<script rel="script" src="js/main.js"></script>
<script rel="script" src="js/view.js"></script>
<script src="js/lightslider.min.js"></script>

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