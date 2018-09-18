<?php include 'connect.php';?>
<?php
    if(isset($_POST["album"])){
            $name = $_POST["name"];
            $albumtime = $_POST["date"];
            $location = $_POST["location"];
            $type = $_POST["type"];
            $user_id = $_POST["user_id"];
            $password = $_POST["password"];
            $sql = "INSERT INTO album_details(album_name, album_date, album_location, album_type, album_user, album_password, is_sorted, is_finished) VALUES ('$name', '$albumtime', '$location', '$type', '$user_id', '$password', false, false)";
            if (mysqli_query($con, $sql)) {
               echo '<script type="text/javascript">
                        window.location = "/studio/upload_to_album.php"
                     </script>';
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
         }
         else{
            echo '<script type="text/javascript">
                     window.location = "/studio/create_album.html"
                  </script>';
         }
?>