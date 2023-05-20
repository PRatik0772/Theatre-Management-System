<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .contact-us-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 500px;
            padding: 20px;
            text-align: center;
        }

        .contact-us-section h1 {
            color: #444;
            margin-bottom: 20px;
        }

        .contact-us-section p {
            color: #888;
            margin-bottom: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .contact-form button {
            background-color: #007BFF;
            /* Blue color */
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            transition: background-color 0.2s ease-in-out;
            width: 100%;
        }

        .contact-form button:hover {
            background-color: #3367d6;
        }

        /* Additional Styles */
        .title-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .title-container h1 {
            font-size: 40px;
            margin-left: 1px;
        }
    </style>
</head>

<body>
    <?php
    include "connection.php";
    ?>


    <header>

    </header>

    <div class="contact-us-container">

        <div class="contact-us-section contact-us-section1">
            <div class="title-container">
                <h1 style="font-weight: bold;">Contact Us</h1>
            </div>
            <form action="" method="POST" class="contact-form">
                <input placeholder="First Name" name="fName" required><br>
                <input placeholder="Last Name" name="lName"><br>
                <input placeholder="E-mail Address" name="eMail" required><br>
                <textarea placeholder="Enter your message!" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit" style="background-color: #007BFF; color: white;">Send
                    your Message</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $insert_query = "INSERT INTO 
                        feedbackTable ( senderfName,
                                        senderlName,
                                        sendereMail,
                                        senderfeedback)
                        VALUES (        '" . $_POST["fName"] . "',
                                        '" . $_POST["lName"] . "',
                                        '" . $_POST["eMail"] . "
',
                                        '" . $_POST["feedback"] . "')";
                $add = mysqli_query($con, $insert_query);

                if ($add) {
                    echo "<script>alert('Successfully Submitted');</script>";
                }
            }
            ?>
        </div>
    </div>


    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>