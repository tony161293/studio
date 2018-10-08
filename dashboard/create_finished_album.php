<?php include 'connect.php';?>
<?php
session_start();
if ($_SESSION["admin_logged_status"] != true) {
    echo '<script type="text/javascript">
            window.location = "login.php"
        </script>';
}
if(isset($_GET)){
    $albumname = $_GET['albumname'];
    $fetchsql = "SELECT * FROM album_details WHERE album_name='$albumname'";
    $result = $con->query($fetchsql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $finished_albumname = $albumname." finished";
            $albumtime = $row['album_date'];
            $location = $row['album_location'];
            $type = $row['album_type'];
            $user_id = $row['album_user'];
            $sql = "INSERT INTO finished_album(album_name, album_date, album_location, album_type, album_user) VALUES ('$finished_albumname', '$albumtime', '$location', '$type', '$user_id')";
            if (mysqli_query($con, $sql)) {
                $redirect_url = "album_list_finished.php";
                echo '<script type="text/javascript">
                    window.location = "'.$redirect_url.'"
                </script>';
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
    }
}
?>