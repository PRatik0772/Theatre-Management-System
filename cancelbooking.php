<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "cinema_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the booking ID from the AJAX request
    $booking_id = $_POST["booking_id"];

    // Perform the cancellation (modify the query according to your database structure)
    $sql = "DELETE FROM bookingtable WHERE id = $booking_id";
    
    if ($conn->query($sql) === TRUE) {
        // Booking canceled successfully
        http_response_code(200);
    } else {
        // Error occurred while canceling the booking
        http_response_code(500);
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
