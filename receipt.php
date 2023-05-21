<?php
include "connection.php";

$qry = "SELECT * FROM bookingtable WHERE ORDERID = (SELECT MAX(ORDERID) FROM bookingtable)";
$result = mysqli_query($con, $qry);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $order = $row['ORDERID'];
    $fname = $row['bookingFName'];
    $lname = $row['bookingLName'];
    $email = $row['bookingEmail'];
    $mobile = $row['bookingPNumber'];
    $theatre = $row['bookingTheatre'];
    $type = $row['bookingType'];
    $movie = $row['movieID'];
    $seatsBooked = $row['seats_booked'];
    $date = $row['date'];
    $amount = $row['amount'];
}
?>

<!-- Rest of your HTML code -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Receipt</title>
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

        body {
            background-image: url("https://history-computer.com/wp-content/uploads/2022/07/iStock-1355176914-scaled.jpg");
            background-size: cover;
        }
    </style>
</head>

<body>
    <header></header>
    <div class="container">
        <h1>Receipt</h1>
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
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><label>Name:</label></td>
                    <td>
                        <?php echo $fname . " " . $lname; ?>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><label>Movie:</label></td>
                    <td>
                        <?php echo $movie; ?>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><label>System :</label></td>
                    <td>Theatre Management System</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><label>Theatre :</label></td>
                    <td>
                        <?php echo $theatre; ?>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><label>Type :</label></td>
                    <td>
                        <?php echo $type; ?>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><label>Seats Booked :</label></td>
                    <td>
                        <?php echo $seatsBooked; ?>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><label>Amount:</label></td>
                    <td>
                        <?php echo $amount; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
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