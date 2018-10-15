<?php include 'connect.php';?>
<?php
session_start();
if ($_SESSION["user_logged_status"] == true) {
    if(isset($_POST)){
        $mysql = "UPDATE image_uploads SET is_sorted=true ";
        $album_name = $_SESSION["album_name"];
        $names = $_POST['namesArray'];
        foreach($names as $name){
            $mysql = $mysql."WHERE image_name='".$name."' AND album_name='".$album_name."'";
        }
        if(mysqli_query($con, $mysql)){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
?>