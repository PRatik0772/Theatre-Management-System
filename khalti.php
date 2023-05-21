<?php

// Khalti Transaction verification
// PHP Script 

$token = $_POST['token'];
$amount = $_POST['amount'];

$args = http_build_query(array(
    'token' => $token,
    'amount'  => $amount
));

$url = "https://khalti.com/api/payment/verify/";

# Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: Key YOUR_KHALTI_MERCHANT_SECRET_KEY'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
    // Handle the error appropriately (e.g., log, display message, etc.)
    die("cURL Error: " . $error_msg);
}

// Close cURL session
curl_close($ch);

// Process the response
$verification_result = json_decode($response, true);

// Check the verification status
if ($verification_result['idx']) {
    // Payment verified successfully
    // Perform necessary actions (e.g., update database, send confirmation email, etc.)
    // ...

    // Return success response
    echo json_encode(array('status' => 'success', 'message' => 'Payment verified successfully.'));
} else {
    // Payment verification failed
    // Handle the failure appropriately (e.g., display error message, redirect to payment page, etc.)
    // ...

    // Return failure response
    echo json_encode(array('status' => 'error', 'message' => 'Payment verification failed.'));
}
