<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add entry</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($link, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM feedbackTable"));
    $moviesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM movieTable"));
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>ADD ENTRY</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form action="spot.php" method="POST">


                            <select name="theatre" required>
                                <option value="" disabled selected>THEATRE</option>
                                <option value="Auditorium 1">Auditorium 1</option>
                                <option value="Auditorium 2">Auditorium 2</option>



                            </select>

                            <select name="type" required>
                                <option value="" disabled selected>TYPE</option>
                                <option value="3d">3D</option>
                                <option value="2d">2D</option>
                            </select>

                            <input type="text" name="date" class="form-control datepicker" required readonly
                                placeholder="Date">

                            <script>
                                $(document).ready(function () {
                                    $(".datepicker").datepicker({
                                        dateFormat: "yy-mm-dd",
                                        minDate: 0, // Set minimum date to today
                                        maxDate: "+4", // Set maximum date to 4 days from today
                                        showButtonPanel: true,
                                        onSelect: function (dateText, inst) {
                                            var selectedDate = new Date(dateText);
                                            var currentDate = new Date();

                                            if (selectedDate > currentDate) {
                                                // If the selected date is in the future, set status to 'Pending'
                                                $('input[name="status"]').val('Pending');
                                            } else if (selectedDate < currentDate) {
                                                // If the selected date is in the past, set status to 'Closed'
                                                $('input[name="status"]').val('Closed');
                                            } else {
                                                // If the selected date is the same as the current date, set status to 'Cancelled'
                                                $('input[name="status"]').val('Cancelled');
                                            }
                                        }
                                    });
                                });
                            </script>

                            <select name="hour" required>
                                <option value="" disabled selected>TIME</option>
                                <option value="09-00">09:00 AM</option>
                                <option value="12-00">12:00 AM</option>
                                <option value="15-00">03:00 PM</option>
                                <option value="18-00">06:00 PM</option>
                                <option value="21-00">09:00 PM</option>
                                <option value="24-00">12:00 PM</option>
                            </select>

                            <input placeholder="First Name" type="text" name="fName" required>

                            <input placeholder="Last Name" type="text" name="lName">

                            <input placeholder="Phone Number" type="text" name="pNumber" required>
                            <input placeholder="email" type="email" name="email" required>
                            <input placeholder="Movie ID" type="text" name="movie_id">

                            <input placeholder="Amount" type="text" name="cash" required>

                            <button type="submit" value="submit" name="submit" class="form-btn">ADD ENTRY</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>