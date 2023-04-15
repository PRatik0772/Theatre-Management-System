<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>about Us</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
    <style>
        .about-us-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f8f8f8;
            border-radius: 10px;
            font-family: 'Lato', sans-serif;
            color: #333;
        }

        .about-us-section1 h1 {
            font-family: 'Lobster', cursive;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about-us-section1 p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .about-form {
            width: 80%;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the form horizontally */
            padding: 20px;
            /* Add padding for spacing */
        }

        /* Import Google Fonts */
        @import url("https://fonts.googleapis.com/css?family=Lato");
        @import url("https://fonts.googleapis.com/css?family=Lobster");

        /* Style for the container */
        .about-us-container {
            font-family: 'Lato', sans-serif;
            /* Set Lato as the font for the container */
        }

        /* Style for the section */
        .about-us-section1 {
            font-family: 'Lobster', cursive;
            /* Set Lobster as the font for the section */
            font-size: 18px;
            /* Set the font size for the text */
            line-height: 1.5;
            /* Set the line height for the text */
        }

        .background-image {
            background-image: url('https://img.freepik.com/premium-vector/movie-doodle-element-seamless-pattern_3865-374.jpg');
            /* Replace with the path to your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            /* Set the height of the div to occupy the full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <header></header>

    <div class="about-us-container">
        <div class="about-us-section about-us-section1">
            <h1>About</h1>
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

            <p>In this work, we show a full solution for ticket booking that is both intuitive and simple to
                use, providing clients with the ease and speed of point-and-click navigation. The system
                improves the speed and privacy of our reservation process. Hassle free browsing and a
                management system where an admin can manage their employees which works their and
                allocate their shift as well as work to-do. Different artifacts and features will be
                implemented in this project which will make the theatre management system more
                appealing and easier to use. </p>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>