<?php
    // Include database configuration
    include "admin/config.php";

    // Start sessio // Start session at the beginning of the script

    if (isset($_POST['register'])) {
        // Get form data
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        // Check if email and password match
        $sql_query = "SELECT * FROM user WHERE first_name='". $first_name . "' AND email='" . $email . "' AND password='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Set session variables
            $_SESSION['logged_in'] = true;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['email'] = $row['email'];

            // Redirect to index.php or any other page
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
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #999;
        }

        .container {
            justify-content: left;
            align-items: center;
        }

        body {
            background-image: url('https://history-computer.com/wp-content/uploads/2022/07/iStock-1355176914-scaled.jpg');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign In</h2>
        <div class="container">
            <form action="login.php" method="post">
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
                    <input type="email" class="form-control" id="email" placeholder="Enter
 email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
<input type="password" class="form-control" id="password" placeholder="Enter password"
                     name="password" required>
                </div>
                     <div class="text-center"> <!-- Add text-center class to center align content -->
  <form>
    <!-- Your form content here -->
    <button type="submit" class="btn btn-primary" name="register">Sign In</button>
  </form>
                     </div>
</div>
<p>Don't have an account?<a href="register.php">Register</a></p>
</div>

</body>
</html>
