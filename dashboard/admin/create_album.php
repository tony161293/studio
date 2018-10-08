<?php include 'connect.php';?>
<?php
    $name = $albumtime = $location = $type = $user_id = "";
    $error_notice = "Album Details";
    $color_changer = "";
    $submitflag = true;
    session_start();
    if ($_SESSION["admin_logged_status"] != true) {
        echo '<script type="text/javascript">
                window.location = "login.php"
            </script>';
    }
    if(isset($_POST["album"])){
            $name = $_POST["name"];
            $albumtime = $_POST["date"];
            $location = $_POST["location"];
            $type = $_POST["type"];
            $user_id = $_POST["user_id"];
            $password = hash('sha512', $_POST["password"]);
            if(empty($name) || empty($albumtime) || empty($location) || empty($type) || empty($user_id) || empty($password)){
                $error_notice = "Error: Every value is required";
                $color_changer = "red";
                $submitflag = false;
            }
            if(strlen($password)<6){
                $error_notice = "Error: At least six characters are required for the password";
                $color_changer = "red";
                $submitflag = false;
            }
            if ( preg_match('/\s/',$name) ){
                $error_notice = "Error: The album name should not contain any space";
                $color_changer = "red";
                $submitflag = false;
            }
            $checksql = "SELECT album_user, album_name FROM album_details";
            $result = $con->query($checksql);
             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["album_user"] == $user_id){
                        $error_notice = "The username already exists. Please use another one.";
                        $color_changer = "red";
                        $submitflag = false;
                    }
                    if($row["album_name"] == $name){
                        $error_notice = "The album name already exists. Please use another one.";
                        $color_changer = "red";
                        $submitflag = false;
                    }
                }
            }
            if($submitflag){
                $sql = "INSERT INTO album_details(album_name, album_date, album_location, album_type, album_user, album_password, is_sorted, is_finished) VALUES ('$name', '$albumtime', '$location', '$type', '$user_id', '$password', false, false)";
                $redirect_url = "upload_to_album.php?albumname=".$name;
                if (mysqli_query($con, $sql)) {
                   echo '<script type="text/javascript">
                            window.location = "'.$redirect_url.'"
                         </script>';
                } else {
                   echo "Error: " . $sql . "" . mysqli_error($conn);
                }
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
    <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/main.css" rel="stylesheet" type="text/css">
    <link href="../../css/view.css" rel="stylesheet" type="text/css">
    <link href="../../css/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/album.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="outer">
        <div class="left_panel">
            <div class="logo">
                <img src="../../images/Logo.png">
            </div>
        </div>
        <div class="right_panel">
            <div class="panel_body">
                <div class="panel_head">
                    <section class="tab_nav active_tab">
                        New Album
                    </section>
                    <div class="clear"></div>
                </div>
                <div class="album_form_outer">
                    <div class="album_wrap">
                        <p style="color:<?php echo $color_changer; ?>"><?php echo $error_notice; ?></p>
                        <div class="row">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row_block left">
                                    <div class="block_span">
                                        Name
                                    </div>
                                    <input type="text" name="name" value="<?php echo $name; ?>">
                                </div>
                                <div class="row_block right">
                                    <div class="block_span">
                                        Date
                                    </div>
                                    <input type='text' value="<?php echo $albumtime; ?>" name="date" class="datepicker-here" readonly data-language='en' data-position="bottom left" />
                                </div>
                                <div class="clear"></div>
                        </div>
                        <div class="row">
                            <div class="row_block left">
                                <div class="block_span">
                                    Location
                                </div>
                                <input type="text" name="location" value="<?php echo $location; ?>">
                            </div>
                            <div class="row_block right">
                                <div class="block_span">
                                    Type
                                </div>
                                <input type="text" name="type" value="<?php echo $type; ?>">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="album_wrap">
                        <p>User Details</p>
                        <div class="row">
                            <div class="row_block left">
                                <div class="block_span">
                                    User Id
                                </div>
                                <input type="text" name="user_id" value="<?php echo $user_id; ?>">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row">
                            <div class="row_block left">
                                <div class="block_span">
                                    Password
                                </div>
                                <input type="password" name="password">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <section>
                        <div>
                            <input type="submit" value="Create Album" name="album" class="can_sub_btn">
                        </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <script rel="script" src="../../js/jquery-1.8.2.min.js"></script>
        <script rel="script" src="../../js/datepicker.min.js"></script>
        <script rel="script" src="../../js/datepicker.en.js"></script>
        <script rel="script" src="../../js/main.js"></script>
        <script>
        // Initialization
        $('#my-element').datepicker([options])
        // Access instance of plugin
        $('#my-element').data('datepicker')
        </script>
</body>

</html>