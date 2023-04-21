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

        $_SESSION['logged_in'] = true;
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['email'] = $row['email'];

        header("Location: index.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Invalid email or password!</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .btn-primary {
            border-radius: 40px;
        }

        .container span {
            position: absolute;
            right: 10px;
            width: 30px;
            cursor: pointer;
            color: whitesmoke;
            line-height: 30px;
            height: 30px;
            text-align: center;
            top: 10px;
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <!-- Include your CSS and JS files here -->
</head>

<body>

    <div class="container">

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="login.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" style="text-decoration: underline">First
                                            Name:</label>
                                        <input type="text" class="form-control" id="first_name"
                                            placeholder="Enter first name" name="first_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" style="text-decoration: underline">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" style="text-decoration: underline">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="register">Sign In</button>
                            </div>

                            <p style="margin-top: 20px; text-decoration: underline">Don't have an
                                account?<a href="register.php">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript to trigger modal on page load -->
    <script>
        $(document).ready(function () {
            $('#loginModal').modal('show');
        });
    </script>

</body>

</html>


</html>