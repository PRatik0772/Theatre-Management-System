<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Theatre Management System</title>
    <style>
  .background-image {
    background-image: url('img\One-Cinema-PatternButton.jpg'); /* Replace with the path to your image */
    background-size: cover;
    background-position: center;
    height: 100vh; /* Set the height of the div to occupy the full viewport height */
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
</head>

<body>
    <?php
    include "admin/config.php";
    $sql = "SELECT * FROM movieTable";
    ?>
    <header>Theatre Management System</header>
    <div id="home-section-1" class="movie-show-container">
        <h1>Currently Showing</h1>
        <h3>Book a Ticket to a movie now</h3>

        <div class="movies-container">

        <?php
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            for ($i = 0; $i <= 5; $i++) {
                $row = mysqli_fetch_array($result);
                echo '<div class="movie-box">';
                echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                echo '<div class="movie-info ">';
                echo '<h3>' . $row['movieTitle'] . '</h3>';
                echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                echo '</div>';
                echo '</div>';
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
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite movie</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Book your tickets</h2>
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

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>