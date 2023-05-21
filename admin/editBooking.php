<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>update</title>
</head>

<body>
    <?php

    include "config.php";
    $id = $_GET['id']; 
    $setting = "select * from bookingtable where bookingID='$id'";
    $qry = mysqli_query($con, $setting); // select query
    
    // while($row = mysqli_fetch_array($qry)){
    //     $First_Name = $row['bookingFName'];
    //     $Last_Name = $row['bookingLName'];
    //     $phone_mobile = $row['bookingPNumber'];
    //     $email1 = $row['bookingEmail'];
    // }
    
    $data = mysqli_fetch_array($qry);
    
    if (isset($_POST['update'])) 
    {
        $firstname = $_POST['first'];
        $lastname = $_POST['last'];
        $phone = $_POST['number'];
        $email = $_POST['email'];
        $amount = $_POST['amount'];

        $edit = mysqli_query($con, "update bookingtable set bookingFName='$firstname', bookingLName='$lastname',bookingPNumber='$phone',bookingEmail='$email',amount='$amount' where bookingID='$id'");

        if ($edit) {
            mysqli_close($con);
            header("location:view.php"); 
            exit;
        } else {
            echo "error";
        }
    }
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">
        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>UPDATE DATA</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form method="POST">
                            <input type="text" name="first" value="<?php echo $data['bookingFName'] ?>"
                                placeholder="Enter First Name" Required>
                            <input type="text" name="last" value="<?php echo $data['bookingLName'] ?>"
                                placeholder="Enter Last Name" Required>
                            <input type="text" name="number" value="<?php echo $data['bookingPNumber'] ?>"
                                placeholder="Enter Phone Number" Required>
                            <input type="text" name="email" value="<?php echo $data['bookingEmail'] ?>"
                                placeholder="Enter Email" Required>
                            <input type="text" name="amount" value="<?php echo $data['amount'] ?>"
                                placeholder="Enter Amount" Required>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-TSNsjKjQVadAq5D5CZB5eKf5M5gIUlCZzOzM/iI8KXEeoPuklF81rjK9/gO9EsDQx"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"></script>
</body>

</html>