<?php session_start(); ?>
<?php include 'connect.php';?>
<?php
    $err = "Login";
    if ($_SESSION["admin_logged_status"] === true) {
        echo '<script type="text/javascript">
                window.location = "album_list.php"
            </script>';
    } else {
        if(isset($_POST["login"])){
            $err = "Login";
            $name = $_POST["username"];
            $password = hash('sha512', $_POST["password"]);
            $checksql = "SELECT * FROM user_detail WHERE user_name='$name' AND password='$password'";
            $result =$con->query($checksql);
            if ($result && $result->num_rows > 0) {
                $_SESSION["admin_logged_status"] = true;
                echo '<script type="text/javascript">
                        window.location = "album_list.php"
                        </script>';
            } else{
                $err = "Username and Password NOT Found";
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
        <div>
            <?php echo $err; ?>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            username <br>
            <input type="text" name='username'/> <br><br>
            password <br>
            <input type="password" name='password' />
            <div>
                <input type="submit" value="Login" name="login" class="can_sub_btn">
            </div>
        </form>
</div>
</body>
</html>