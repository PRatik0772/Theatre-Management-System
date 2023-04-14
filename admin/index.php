<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <!-- Add Bootstrap CSS -->
    <!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://red.msudenver.edu/wp-content/uploads/2022/07/Piturro-Vincent_SciFiFilm_07062022_AM-21.jpg'); /* Replace with the actual path to your image */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 360px;
            padding: 15px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .textbox {
            margin-bottom: 10px;
        }

        #div_login {
            padding: 20px;
        }

        /* Add CSS to center the button */
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <form method="post" action="">
            <div id="div_login" class="bg-white">
                <h1 class="text-center mb-4">Admin Panel</h1>
                <div>
                    <input type="text" class="textbox form-control" id="txt_uname" name="txt_uname"
                        placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox form-control" id="txt_uname" name="txt_pwd"
                        placeholder="Password" />
                </div>
                <div class="mt-3 center"> <!-- Add center class to the parent div -->
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>

</body>

</html>


<?php
include "config.php";

if (isset($_POST['but_submit'])) {

    $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
    $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);

    if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from users where username='" . $uname . "' and password='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            header('Location: admin.php');
        } else {
            echo "Invalid username and password";
        }
    }
}
?>
