<?php
include "admin/config.php";

if (isset($_POST['register'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql_query = "SELECT * FROM user WHERE first_name='" . $first_name . "' AND email='" . $email . "' AND password='" . $password . "'";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if ($row['is_banned'] == 1) {
            echo '<div class="alert alert-danger">Your account has been banned. Please contact the administrator.</div>';
        } else {
            $_SESSION['logged_in'] = true;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['email'] = $row['email'];

            header("Location: index.php");
            exit();
        }
    } else {
        echo '<div class="alert alert-danger">Invalid email or password!</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body {
            background-image: url("https://history-computer.com/wp-content/uploads/2022/07/iStock-1355176914-scaled.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f8f8f8;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: none;
            background-color: #f2f2f2;
            margin-bottom: 20px;
            font-size: 16px;
            color: #333;
        }

        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0069d9;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: none;
        }

        .sign-in-line {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>

<body>

    <div class="container">

        <div>
            <form action="login.php" method="post">
                <div class="sign-in-line">Sign In</div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter first name"
                                name="first_name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password"
                        name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="register">Sign In</button>
                </div>
                <p style="margin-top: 20px; text-decoration: underline">Don't have an account? <a
                        href="register.php">Register</a></p>
            </form>
        </div>

    </div>
</body>

</html>


</html>