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

    <title>Verification Page</title>
    <script src="_.js "></script>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    <style>
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 50px;
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

        .btn-pay:hover {
            background-color: #0056b3;
        }

        body {
            background-image: url("https://history-computer.com/wp-content/uploads/2022/07/iStock-1355176914-scaled.jpg");
            background-size: cover;
        }
    </style>
</head>

<body>
    <header></header>
    <div class="container">
        <h1>Proceed for Payment</h1>
        <form method="post" action="pgRedirect.php">
            <table>
                <tbody>
                    <tr>
                        <th>S.No</th>
                        <th>Label</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><label>ORDER_ID:</label></td>
                        <td>
                            <?php echo $order; ?>
                            <input type="hidden" name="ORDER_ID" value="<?php echo $order; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><label>Name:</label></td>
                        <td>
                            <?php echo $_POST['fName'] . " " . $_POST['lName']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><label>Movie:</label></td>
                        <td>
                            <?php echo $_POST['movie_id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><label>System :</label></td>
                        <td>
                            <?php echo "Theatre Management System"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><label>Theatre :</label></td>
                        <td>
                            <?php echo $_POST['theatre']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><label>Type :</label></td>
                        <td>
                            <?php echo $_POST['type']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><label>Seats Booked :</label></td>
                        <td>
                            <?php echo $_POST['seats']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><label>txnAmount*</label></td>
                        <td>
                            <?php
                            $ta = 0; // Initialize $ta with a default value
                            if ($_POST['type'] == "2d") {
                                $ta = 20;
                            }
                            if ($_POST['type'] == "3d") {
                                $ta = 50;
                            }

                            $numberOfSeats = count(explode(',', $seatsBooked));
                            $price = $ta * $numberOfSeats;
                            ?>
                            <input type="text" name="TXN_AMOUNT" value="Rs.<?php echo $price; ?>/-" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" onclick="redirectToKhalti()" class="btn-pay">Proceed To Pay</button>
        </form>
    </div>


    <!-- <script src="https://khalti.com/static/khalti-checkout.js"></script> -->
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

    <script>
        function redirectToKhalti() {
            var config = {
                "publicKey": "test_public_key_c9ddd99941924015910af6d11dcc2ac9",
                "productIdentity": "<?php echo $order; ?>",
                "productName": "Movie Ticket",
                "productUrl": "http://yourwebsite.com/product/movie-ticket",
                "eventHandler": {
                    onSuccess(payload) {
                        // Handle successful payment here
                        console.log(payload);
                        var fileUrl = "successful.php"; // Replace with the actual file path
                        window.open(fileUrl, "");
                       

                    },
                    onError(error) {
                        // Handle payment error here
                        console.log(error);
                        window.location.href = "paymentError.php?order_id=<?php echo $order; ?>";
                    },
                    onClose() {
                        // Handle when payment popup is closed
                        console.log("Payment closed");
                    }
                }
            };

            var checkout = new KhaltiCheckout(config);
            checkout.show({
                amount: <?php echo $price * 100; ?>,
                mobile: "<?php echo $mobile; ?>",
                email: "<?php echo $email; ?>",
                productIdentity: "<?php echo $order; ?>",
                productName: "Movie Ticket",
                productUrl: "http://yourwebsite.com/product/movie-ticket"
            });
        }
    </script>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>