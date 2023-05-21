<?php
include "connection.php";
session_start();

$fname = $_POST['fName'];
$lname = $_POST['lName'];
$email = $_POST['email'];
$mobile = $_POST['pNumber'];
$theatre = $_POST['theatre'];
$type = $_POST['type'];
$movie = $_POST['movie_id'];
$order = "TMS" . rand(10000, 99999999);
$date = $_POST['date'];

$seatsBooked = '';
if (isset($_POST['seats'])) {
    if (is_array($_POST['seats'])) {
        $seatsBooked = implode(',', $_POST['seats']);
    } elseif (is_string($_POST['seats'])) {
        $seatsBooked = $_POST['seats'];
    }
}

if ((!$_POST['submit'])) {
    echo "<script>alert('You are Not Supposed to come Here Directly');window.location.href='index.php';</script>";
}

if (isset($_POST['submit'])) {
    $qry = "INSERT INTO bookingtable(`movieID`, `bookingTheatre`, `bookingType`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingEmail`,`amount`, `ORDERID`,`seats_booked`,`date`)VALUES ('$movie','$theatre','$type','$fname','$lname','$mobile','$email','Paid','$order','$seatsBooked','$date')";

    $result = mysqli_query($con, $qry);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Pratik Rayamajhi</title>
    <script src="_.js "></script>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    <style>
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            text-align: center;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        .btn-pay {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background-color: #007BFF;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-pay:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Confirm Payment</h1>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><?php echo $order; ?></td>
                <td><?php echo $amount; ?></td>
                <td>
                    <button id="khaltiBtn" class="btn-pay" disabled>Pay with Khalti</button>
                </td>
            </tr>
        </table>
    </div>

    <script>
        var config = {
            "publicKey": "YOUR_KHALTI_PUBLIC_KEY",
            "productIdentity": "<?php echo $order; ?>",
            "productName": "Movie Booking",
            "productUrl": "http://example.com",
            "eventHandler": {
                onSuccess(payload) {
                    // Khalti payment successful
                    var token = payload.token;
                    var amount = payload.amount / 100; // Divide by 100 to get the actual amount
                    verifyPayment(token, amount);
                },
                onError(error) {
                    // Khalti payment error
                    console.log(error);
                },
                onClose() {
                    // Khalti payment modal closed
                }
            }
        };

        var checkout = new KhaltiCheckout(config);

        document.getElementById("khaltiBtn").addEventListener("click", function () {
            // Open Khalti payment modal
            checkout.show({ amount: <?php echo $amount * 100; ?> }); // Multiply by 100 to convert to paisa
        });

        function verifyPayment(token, amount) {
            // Khalti Transaction verification
            // PHP Script 

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "khalti_verification.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    console.log(response);

                    if (response.khalti && response.khalti.idx === "SUCCESS") {
                        // Payment verification successful
                        window.location.href = "success.php";
                    } else {
                        // Payment verification failed
                        window.location.href = "failure.php";
                    }
                }
            };
            xhr.send("token=" + token + "&amount=" + amount);
        }
    </script>

</body>

</html>
