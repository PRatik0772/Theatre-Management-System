<?php
include "connection.php";

// Assuming $con is the valid database connection variable

$qry = "SELECT * FROM bookingtable ORDER BY bookingID DESC LIMIT 1";
$result = mysqli_query($con, $qry);

if ($result && mysqli_num_rows($result) > 0) {
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
    $time = $row['bookingTime'];

    $amount = $row['amount'];
} else {
    echo "No results found.";
    exit;
}
?>

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
                    <td>3</td>
                    <td><label>Movie:</label></td>
                    <td>
                        <?php echo $movie; ?>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><label>System:</label></td>
                    <td>Theatre Management System</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><label>Theatre:</label></td>
                    <td>
                        <?php echo $theatre; ?>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><label>Type:</label></td>
                    <td>
                        <?php echo $type; ?>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><label>Time:</label></td>
                    <td>
                        <?php echo $time; ?>
                    </td>
                </tr>
                <td>8</td>
                    <td><label>Email Address:</label></td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                </tr>

                <tr>
                    <td>9</td>
                    <td><label>Seats Booked:</label></td>
                    <td>
                        <?php echo $seatsBooked; ?>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><label>Date:</label></td>
                    <td>
                        <?php echo $date; ?>
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><label>Amount:</label></td>
                    <td>
                        <?php echo $amount; ?>
                    </td>
                </tr>

            </tbody>
    </div>
    <button id="downloadBtn">Download PDF</button>

    </table>
    <a href="index.php" style="text-align: center;">
        <button
            style="background-color: #007BFF; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Return
            To Homepage</button>
    </a>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha384-8ilCDHw8XCg7zbp0Kn8B2nTYfSWvxK0FCz/Yy6F+dutOfmcuvd6jTQ3L/TLc2rvr"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
        integrity="sha384-5gBgSywM1w6hfaEqp3rbMxf4ZuRRXoJjksUYPP9C0V4eR0BcnOrt+k6hJ8Z6X1aI"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw8f+ua7X1wblw3fZf3v+Vw9ytkFkWWs1N1E7b+0u4Kto+WfPOT5v18a3bs+L7"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function () {
            console.log("Button clicked!");

            const doc = new jsPDF();

            doc.text("Receipt", 20, 20);
            const table = document.querySelector('table');
            const options = {
                margin: { top: 30 },
                html: table
            };

            doc.autoTable(options);
            doc.save('receipt.pdf');
        });
    </script>


</body>

</html>