<?php
include "connection.php";
session_start();

$order_id = $_POST['ORDER_ID'];
$txn_amount = $_POST['TXN_AMOUNT'];

// Save the transaction details in the database or perform any necessary actions

// Redirect back to the payment page with a success parameter
header("Location: paymentPage.php?payment_success=true");
exit;
?>
