<?php include 'connect.php';?>
<?php
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

            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
    }
}
?>