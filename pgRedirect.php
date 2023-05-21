<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the payment response

    // Check if the payment is successful
    if (isset($_POST['status']) && $_POST['status'] === 'Success') {
        // Payment is successful, create ticket or perform other necessary actions

        // Generate a unique ticket number
        $ticketNumber = "TMS" . rand(10000, 99999999);

        // Save the ticket details in the database or perform any other necessary actions
        // ...

        // Redirect to the ticket page
        header("Location: ticket.php?ticket=$ticketNumber");
        exit();
    } else {
        // Payment is not successful or has been canceled

        // Handle payment failure or cancellation
        header("Location: payment_failed.php");
        exit();
    }
} else {
    // Redirected to the page without a valid request, handle accordingly

    header("Location: verify.php");
    exit();
}
?>
