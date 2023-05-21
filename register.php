<?php
if (isset($_POST['register'])) {
    include "admin/config.php";
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if ($password != $confirm_password) {
        echo '<div class="alert alert-danger">Passwords do not match!</div>';
    } else {
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="alert alert-danger">This email already exists. Please choose a different email.</div>';
        } else {
            $stmt = $con->prepare("INSERT INTO user (first_name, last_name, email, phone, password) 
                                  VALUES (?, ?, ?, ?, ?)");

            $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $password);

            if ($stmt->execute()) {
                $stmt->close();

                header("Location: login.php");
                exit();
            } else {
                echo '<div class="alert alert-danger">Error: ' . $stmt->error . '</div>';
                $stmt->close();
            }
        }
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
        <h2>Sign Up</h2>
        <div class="container">
            <form action="register.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter first name"
                                name="first_name" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter last name"
                                name="last_name" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone"
                        required autocomplete="off">
                </div>
                <script>
                    var phoneInput = document.getElementById('phone');
                    phoneInput.addEventListener('input', function () {
                        var inputValue = phoneInput.value;

                        var cleanedValue = inputValue.replace(/\D/g, '');

                        if (cleanedValue.length != 10) {
                            phoneInput.setCustomValidity('Phone number must be at least 10 digits long');
                        } else {
                            phoneInput.setCustomValidity('');
                        }
                    });
                </script>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password"
                        name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password"
                        name="confirm_password" required>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="agree" required> I agree to the terms and
                        conditions.
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
            </form>
        </div>
    </div>
    <p style="text-decoration: underline">Already have an account? <a href="login.php">Sign In</a></p>
    </div>
    </div>



</body>

</html>