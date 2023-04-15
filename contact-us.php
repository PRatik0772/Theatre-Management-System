<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
    <style>
        .contact-form {
            width: 80%;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the form horizontally */
            padding: 20px;
            /* Add padding for spacing */
        }

        .contact-us-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f8f8f8;
            border-radius: 10px;
            font-family: 'Lato', sans-serif;
            color: #333;
        }

        .contact-us-section1 h1 {
            font-family: 'Lobster', cursive;
            font-size: 36px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <header></header>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Contact</h1>
            <p>Feel Free to Contact Us </p>
            <form action="" method="POST" class="contact-form">
                <input placeholder="First Name" name="fName" required><br>
                <input placeholder="Last Name" name="lName"><br>
                <input placeholder="E-mail Address" name="eMail" required><br>
                <textarea placeholder="Enter your message!" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit">Send your Message</button>
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
                                        '" . $_POST["eMail"] . "',
                                        '" . $_POST["feedback"] . "')";
                $add = mysqli_query($con, $insert_query);

                if ($add) {
                    echo "<script>alert('Succesfully Submitted');</script>";
                }
            }
            ?>
            </form>

        </div>

    </div>

    <footer></footer>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>