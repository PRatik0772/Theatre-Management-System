<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>About Us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>

</head>
<style>
    body {
        background-image: url('https://history-computer.com/wp-content/uploads/2022/07/iStock-1355176914-scaled.jpg');
        background-size: cover;
    }
</style>

<body>
<?php include('includes/header2.php');?>
    <?php
    include "connection.php";
    ?>


    <div class="about-us-section about-us-section1">
        <div class="about-us-container">
            <h1 style="font-weight: bold;">About Us</h1>
        </div>
        <div class="about-us-content">

            <p>Visiting cinema is very popular out-of-home extra activities, influencing several social,
                economic, and cultural events in contemporary civilizations. Since they provide a
                significant social and cultural practice associated with a specific location that serves as a
                common reference or landmark for many people, cinemas are an essential component of
                cities and contribute to the maintenance of the collective memory. When a movie is
                trending which has just been released the tickets are always almost sold out depending
                upon the area the theatre is located so it’s a major problem that usually a viewer goes to
                the theatre to watch the significant movie but when they try to book the ticket its already
                sold out which only troubles the customer and waste their time so its where this project
                comes to help. While using this web application a user can book their ticket without the
                hassle of waiting in long lines whereas they can get know beforehand if the theatre is
                houseful or not. Then they will get their needed piece of information and manage their
                time according to the show time when they can get the tickets.</p>
            <div class="author-name">
                <p>- Pratik Rayamajhi
                    2059747
                </p>
            </div>
        </div>


        <script src="scripts/jquery-3.3.1.min.js "></script>
        <script src="scripts/owl.carousel.min.js "></script>
        <script src="scripts/script.js "></script>
</body>

</html>