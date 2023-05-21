<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Theatre Management System</title>
    <style>
        @media (max-width: 767px) {
            .movies-container {
                max-width: 100%;
                padding: 0 15px;
            }

            .movie-box {
                flex-basis: 100%;
            }

            #home-section-2,
            #home-section-2 h1,
            #home-section-2 h3 {
                text-align: center;
            }

            .services-container {
                text-align: center;
            }
        }

        #home-section-2 {
            margin-top: 5px;

            /* or use padding instead of margin */
            .carousel-inner img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .carousel-inner .item img {
                width: 2000px;
                /* max-width: 1800px; adjust this value as needed */
                height: 800px;
                display: block;
                margin: 0 auto;
            }


            padding-top: 30px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

        #home-section-1,
        #home-section-2 h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 1000;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        #home-section-1,
        #home-section-2 h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 100;
            text-transform: uppercase;
            letter-spacing: 2px;

        }

        .services-container {
            font-family: 'Montserrat', sans-serif;
            font-weight: 100;
            text-transform: uppercase;
            letter-spacing: 2px;

        }

        .movies-container {
            max-width: 3000px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }


        .movie-box {
            margin: 10px;
            position: relative;
            overflow: hidden;

            flex-basis: 300px;
        }

        .movie-box img {
            width: 100%;
            height: 100%;
            transition: transform 1s ease-in-out;
            object-fit: cover;
        }

        .movie-box:hover img {
            transform: scale(1.2);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .movie-box:hover {
            transform: scale(1.2);
            /* increase the size by 20% */
            z-index: 1;
            /* move the container to the top */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            /* add a shadow effect */
        }

        .carousel-container {
            height: 900px;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .carousel-inner {
            height: 100%;
            /* set the height of the inner carousel to fill the container */
        }

        .carousel-inner .item {
            height: 100%;
            /* set the height of each item to fill the container */
        }

        /* CSS code */

        /* Set a max-width for the container to limit its size on larger screens */
        .carousel-container {
            max-width: 100%;
        }

        /* Set a percentage width for the carousel images to maintain their size at 50% viewport */
        .carousel-inner .item img {
            width: 50%;
        }

        /* Adjust the movie box width to maintain the same size at 50% viewport */
        .movie-box {
            width: 50%;
        }

        /* Adjust the font size of movie titles and booking links for better readability */
        .movie-box h3,
        .movie-box a {
            font-size: 16px;
        }

        /* Adjust the service item width to maintain the same size at 50% viewport */
        .service-item {
            width: 50%;
        }

        /* Adjust the font size of service item titles for better readability */
        .service-item h2 {
            font-size: 16px;
        }

        /* Media query to apply the styles when the viewport width is 50% or less */
        @media (max-width: 50%) {

            .carousel-inner .item img,
            .movie-box,
            .service-item {
                width: 100%;
                /* Set width to 100% to occupy the full width of the viewport */
            }
        }

        .services-section {
            padding: 0 10%;
            text-align: center;
        }

        .services-section>h1 {
            color: #007BFF;
            /* Changed text color to #007BFF */
            text-align: left;
            padding: 0 0 10px 0;
        }

        .services-section>h3 {
            color: 888;
            /* Changed text color to 888 */
            text-align: left;
            padding: 0 0 20px 0;
        }

        .services-section>h3:after {
            content: "";
            display: block;
            height: 3px;
            width: 7%;
            background: #007BFF;
            /* Changed line color to #007BFF */
            position: relative;
            bottom: -10px;
        }

        .services-container {
            margin: 40px 0;
            display: grid;
            grid-template-columns: auto auto auto;
            grid-column-gap: 4%;
        }

        .service-item>h2 {
            color: 888;
            /* Changed text color to #007BFF */
            padding: 25px 0;
        }

        .service-item-icon i {
            font-size: 40px;
            color: 888;
            /* Changed text color to 888 */
            height: 120px;
            width: 120px;
            background-color: rgb(126, 126, 126);
            border-radius: 50%;
            border: #c7c7c7 12px solid;
            line-height: 90px;
            transition: all 0.5s ease;
        }

        .service-item-icon i:hover {
            background-color: #c7c7c7;
            color: rgb(126, 126, 126);
        }

        .movie-show-container {
            margin-top: 0;
            padding: 0 10%;
        }

        .movie-show-container>h1 {
            color: #007BFF;
            font-size: 4em;
            font-weight: bold;
            /* Added font-weight property */

            /* Changed text color to #007BFF */
            text-align: left;
            padding: 0 0 10px 0;
        }

        .movie-show-container>h3 {
            color: 888;
            /* Changed text color to 888 */
            text-align: left;
            padding: 0 0 10px 0;
        }

        .movie-show-container>h3:after {
            content: "";
            display: block;
            height: 3px;
            width: 7%;
            background: #007BFF;
            position: relative;
            bottom: -10px;
        }

        #home-section-3.trailers-section {
            margin-top: 0;
            padding: 0 10%;
        }

        #home-section-3.trailers-section>h1.section-title {
            color: #007BFF;
            font-size: 4em;
            font-weight: bold;
            text-align: left;
            padding: 0 0 10px 0;
        }

        #home-section-3.trailers-section>h3 {
            color: #888;
            text-align: left;
            padding: 0 0 10px 0;
        }

        #home-section-3.trailers-section>h3:after {
            content: "";
            display: block;
            height: 3px;
            width: 7%;
            background: #007BFF;
            position: relative;
            bottom: -10px;
        }

        .trailers-section>h1,
        .trailers-section>h3 {
            padding: 0 10%;
        }

        .trailers-section>h1 {
            text-align: left;
            color: #6e5a11;
        }

        .trailers-section>h3 {
            text-align: left;
            color: #969696;
        }

        .trailers-section>h3:after {
            content: "";
            display: block;
            height: 3px;
            width: 7%;
            background: #6e5a11;
            position: relative;
            bottom: -10px;
        }

        .trailers-grid {
            margin: 60px 0;
            display: grid;
            grid-template-columns: auto auto auto;
            height: 80vh;
        }

        .trailers-grid-item {
            font-size: 30px;
            text-align: center;
            overflow: hidden;
            width: 100%;
            height: 100%;
            position: relative;
            vertical-align: middle;
        }

        .trailer-item-video {
            width: 100%;
            height: 100%;
        }

        .trailers-grid-item img {
            width: 100%;
            height: 100%;
            display: block;
        }

        .trailer-item-info {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            width: 100%;
            height: 100%;
            margin: auto;
            vertical-align: middle;
            opacity: 0;
            transition: 0.7s ease;
            background-color: rgb(0, 0, 0);
            padding: 85px 0;
        }

        .trailer-item-info:hover {
            opacity: 0.8;
        }

        .trailer-item-info h3 {
            vertical-align: middle;
            color: rgb(255, 255, 255);
        }

        .trailer-item-info i {
            margin: 10px;
            color: rgb(255, 255, 255);
            cursor: pointer;
            transition: all 0.2s ease;
        }
    </style>
</head>

<body>
    <div>
        <?php include('includes/header.php') ?>

        <div class="carousel-container">
            <div id="home-section-2" class="carousel slide" data-ride="carousel" data-interval="1500">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#home-section-2" data-slide-to="0"></li>
                    <li data-target="#home-section-2" data-slide-to="1"></li>
                    <li data-target="#home-section-2" data-slide-to="2"></li>
                    <li data-target="#home-section-2" data-slide-to="3"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/Amie-Donald-plays-M3GAN-f293ea1.jpg" alt="Image 1">
                    </div>

                    <div class="item">
                        <img src="img/avatar2.jpg" alt="Image 2">
                    </div>

                    <div class="item">
                        <img src="img/p21562309_v_h8_aa.jpg" alt="Image 3">
                    </div>
                    <div class="item">
                        <img src="img/guardians-galaxy-web.jpg" alt="Image 4">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#home-section-2" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#home-section-2" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>


        <?php
        include "connection.php";
        $sql = "SELECT * FROM movieTable";
        ?>

        <div id="home-section-1" class="movie-show-container">
            <h1>Currently Showing</h1>

            <h3>Book a Ticket to a movie now</h3>

            <div class="movies-container">
                <?php
                if ($result = mysqli_query($con, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0; // Initialize $i to 0
                        while ($row = mysqli_fetch_array($result)) {
                            // Add the following code to assign the seat ID
                            $seatID = $i; // Replace ... with the actual seat ID value
                            $sqlUpdate = "UPDATE movietable SET seatid = '$seatID' WHERE movieID = " . $row['movieID'];
                            if ($con->query($sqlUpdate) === true) {
                                // No need to echo an empty string
                            } else {
                                echo "Error updating seat ID: " . $con->error;
                            }

                            echo '<div class="movie-box">';
                            echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                            echo '<div class="movie-info">';
                            echo '<h3>' . $row['movieTitle'] . '</h3>';
                            echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                            echo '</div>';
                            echo '</div>';
                            $i++; // Increment $i after displaying a product
                        }
                        mysqli_free_result($result);
                    } else {
                        echo '<h4 class="no-annot">Out of Tickets</h4>';
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }

                // Close connection
                mysqli_close($con);
                ?>

            </div>
        </div>


        <div id="home-section-2" class="services-section">
            <h1>How it works</h1>
            <h3>3 Simple steps to book your favourite movie!</h3>

            <div class="services-container">
                <div class="service-item">
                    <div class="service-item-icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <h2>1. Sign In/Up to the System</h2>
                </div>
                <div class="service-item">
                    <div class="service-item-icon">
                        <i class="fas fa-4x fa-video"></i>
                    </div>
                    <h2>2. Select a movie and pick your seats</h2>
                </div>
                <div class="service-item">
                    <div class="service-item-icon">
                        <i class="fas fa-4x fa-theater-masks"></i>
                    </div>
                    <h2>3. Pay for your tickets & Enjoy watching</h2>
                </div>
                <div class="service-item"></div>
                <div class="service-item"></div>
            </div>
        </div>
        <div id="home-section-3" class="trailers-section">
            <h1 class="section-title">Explore Trailers of the new movies</h1>
            <h3>NOW SHOWING</h3>
            <div class="trailers-grid">
                <div class="trailers-grid-item">
                    <img src="img/maxresdefault.jpg" alt="">
                    <div class="trailer-item-info" data-video="d9MyW72ELq0">
                        <div class="overlay">
                            <h3 class="title">Avatar</h3>
                        </div>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/210398_thumb_665.jpg" alt="">
                    <div class="trailer-item-info" data-video="9fux9swQ5AQ">
                        <div class="overlay">
                            <h3 class="title">Varisu</h3>
                        </div>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/jhon.jpg" alt="">
                    <div class="trailer-item-info" data-video="qEVUtrk8_B4">
                        <div class="overlay">
                            <h3 class="title">John Wick: Chapter 4</h3>
                        </div>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/maxresdefault (1).jpg" alt="">
                    <div class="trailer-item-info" data-video="LCxnmfdxJ6s">
                        <div class="overlay">
                            <h3 class="title">Jung_E</h3>
                        </div>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/maxresdefault (2).jpg" alt="">
                    <div class="trailer-item-info" data-video="BmllggGO4pM">
                        <div class="overlay">
                            <h3 class="title">The Gray Man</h3>
                        </div>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/96873817.jpg" alt="">
                    <div class="trailer-item-info" data-video="vqu4z34wENw">
                        <div class="overlay">
                            <h3 class="title">Pathaan</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <script src="scripts/jquery-3.3.1.min.js "></script>
        <script src="scripts/script.js "></script>
</body>

</html>