<?php
// Assuming you have a database connection code in admin/config.php
include('admin/config.php');

function cancelBooking($bookingid, $con)
{
    // Check if the connection is available
    if (!$con) {
        die("Error: Connection failed. " . mysqli_connect_error());
    }

    $sql = "DELETE FROM bookingtable WHERE bookingID = $bookingid";

    if (mysqli_query($con, $sql)) {
        echo "Booking has been cancelled and deleted successfully.";
    } else {
        echo "Error cancelling booking: " . mysqli_error($con);
    }
}

if (isset($_POST['cancel']) && isset($_POST['bookingid'])) {
    // Get the booking ID from the POST request
    $bookingid = $_POST['bookingid'];

    cancelBooking($bookingid, $con);
}
?>