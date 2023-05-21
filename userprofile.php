<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="style/user.css">

</head>

<body>
    <?php include('includes/header.php'); ?>
    <div id="home-section-1" class="movie-show-container">
        <h1>User Profile</h1>
        <h2>Booked Movies</h2>
    </div>
    <div class="container">
        <?php
        include('connection.php');

        if (isset($_POST['cancel']) && isset($_POST['booking_id'])) {
            $bookingid = $_POST['booking_id'];
        
            $deleteQuery = "DELETE FROM `bookingtable` WHERE bookingID = '$bookingid'";

            if (mysqli_query($con, $deleteQuery)) {
                echo 'Booking cancelled successfully.';
            } else {
                echo 'Error cancelling booking: ' . mysqli_error($con);
            }
        }

        $logged_in_user_email = $_SESSION['email'];
        $select = "SELECT * FROM `bookingtable` WHERE bookingEmail = '$logged_in_user_email' ORDER BY bookingid DESC";
        $run = mysqli_query($con, $select);

        echo '<table>';
        echo '<tr>';
        echo '<th>Booking ID</th>';
        echo '<th>Movie ID</th>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>Mobile</th>';
        echo '<th>Email</th>';
        echo '<th>Date</th>';
        echo '<th>Theatre</th>';
        echo '<th>Type</th>';
        echo '<th>Order ID</th>';
        echo '<th>Seats Booked</th>';
        echo '<th>Status</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_array($run)) {
            $bookingid = $row['bookingID'];
            $movieID = $row['movieID'];
            $bookingFName = $row['bookingFName'];
            $bookingLName = $row['bookingLName'];
            $mobile = $row['bookingPNumber'];
            $email = $row['bookingEmail'];
            $date = $row['date'];
            $theatre = $row['bookingTheatre'];
            $type = $row['bookingType'];
            $ORDERID = $row['ORDERID'];
            $seatsBooked = $row['seats_booked'];

            echo '<tr>';
            echo '<td>' . $bookingid . '</td>';
            echo '<td>' . $movieID . '</td>';
            echo '<td>' . $bookingFName . '</td>';
            echo '<td>' . $bookingLName . '</td>';
            echo '<td>' . $mobile . '</td>';
            echo '<td>' . $email . '</td>';
            echo '<td>' . $date . '</td>';
            echo '<td>' . $theatre . '</td>';
            echo '<td>' . $type . '</td>';
            echo '<td>' . $ORDERID . '</td>';
            echo '<td>' . $seatsBooked . '</td>';
            echo '<td><button onclick="cancelBooking(' . $bookingid . ')">Cancel</button></td>';
            

            echo '</tr>';
        }

        echo '</table>';
        mysqli_close($con);
        ?>
    </div>

    <script>
        function cancelBooking(bookingid) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    alert(this.responseText);
                }
            };
            xhttp.open("POST", "cancelbooking.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("cancel=true&bookingid=" + bookingid);
        }

    </script>


</body>

</html>