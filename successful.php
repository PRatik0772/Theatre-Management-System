<!DOCTYPE html>
<html>

<head>
    <title>Thank You for Booking</title>
    <style>
        /* CSS styles for the thank you page */
        body {
            background-image: url('https://history-computer.com/wp-content/uploads/2022/07/iStock-1355176914-scaled.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 30px auto;
        }

        .message {
            margin-bottom: 30px;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
        }

        p {
            font-size: 14px;
            color: #999999;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="logo"
            src="img/png-transparent-social-media-logo-organization-green-tick-blue-computer-network-angle.png"
            alt="Tick Logo">
        <div class="message">
            <h1>Thank you for booking with Theatre Management System!</h1>
            <p>Your booking has been confirmed.</p>
        </div>
        <a class="button" href="receipt.php">View Receipt</a>
    </div>
</body>

</html>