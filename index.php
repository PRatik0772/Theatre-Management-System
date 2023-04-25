<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Theatre Management System</title>
    <style>
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
    
    #home-section-1 h1
     {
        font-family: 'Montserrat', sans-serif;
        font-weight: 1000;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    #home-section-1 h3{
        font-family: 'Montserrat', sans-serif;
        font-weight: 100;
        text-transform: uppercase;
        letter-spacing: 2px;

    }
</style>
</head>

<body>
    <div>
        <?php include('includes/header.php'); ?>
    </div>
    <div id="home-section-2" class="carousel slide" data-ride="carousel" data-interval="1500">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#home-section-2" data-slide-to="0"></li>
            <li data-target="#home-section-2" data-slide-to="1"></li>
            <li data-target="#home-section-2" data-slide-to="2"></li>
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
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#home-section-2" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#home-section-2" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>


        <?php
        include "admin/config.php";
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
                            echo '<div class="movie-box">';
                            echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                            echo '<div class="movie-info ">';
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
            <h3>3 Simple steps to book your favourit movie!</h3>

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
                    <h2>2. Select a movie</h2>
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
            <h3>Now showing</h3>
            <div class="trailers-grid">
                <div class="trailers-grid-item">
                    <img src="img/maxresdefault.jpg" alt="">
                    <div class="trailer-item-info" data-video="d9MyW72ELq0">
                        <h3>Avatar</h3>
                        <i class="far fa-3x fa-play-circle"></i>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/210398_thumb_665.jpg" alt="">
                    <div class="trailer-item-info" data-video="9fux9swQ5AQ">
                        <h3>Varisu</h3>
                        <i class="far fa-3x fa-play-circle"></i>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/jhon.jpg" alt="">
                    <div class="trailer-item-info" data-video="qEVUtrk8_B4">
                        <h3>Jhon Wick 4</h3>
                        <i class="far fa-3x fa-play-circle"></i>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/maxresdefault (1).jpg" alt="">
                    <div class="trailer-item-info" data-video="LCxnmfdxJ6s">
                        <h3>Jung_E</h3>
                        <i class="far fa-3x fa-play-circle"></i>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/maxresdefault (2).jpg" alt="">
                    <div class="trailer-item-info" data-video="BmllggGO4pM">
                        <h3>The Gray Man</h3>
                        <i class="far fa-3x fa-play-circle"></i>
                    </div>
                </div>
                <div class="trailers-grid-item">
                    <img src="img/96873817.jpg" alt="">
                    <div class="trailer-item-info" data-video="vqu4z34wENw">
                        <h3>Pathaan</h3>
                        <i class="far fa-3x fa-play-circle"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>