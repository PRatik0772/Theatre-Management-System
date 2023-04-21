<!DOCTYPE html>
<html lang="en">
<?php
$id = $_GET['id'];
include "connection.php";
$movieQuery = "SELECT * FROM movieTable WHERE movieID = $id";
$movieImageById = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book
        <?php echo $row['movieTitle']; ?> Now
    </title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
    <style>
        body {
            background-image: url('https://miro.medium.com/v2/resize:fit:1400/1*aBEw_viBmoHYyugRCC0New.png');
            background-size: cover;
        }
    </style>
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movieImg'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title">
                <?php echo $row['movieTitle']; ?>
            </div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENRE</td>
                        <td>
                            <?php echo $row['movieGenre']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>DURATION</td>
                        <td>
                            <?php echo $row['movieDuration']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>RELEASED DATE</td>
                        <td>
                            <?php echo $row['movieRelDate']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>DIRECTOR</td>
                        <td>
                            <?php echo $row['movieDirector']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>ACTORS</td>
                        <td>
                            <?php echo $row['movieActors']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="verify.php" method="POST">


                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>

                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="13-4">April 13,2023</option>
                        <option value="14-4">April 14,2023</option>
                        <option value="15-4">April 15,2023</option>
                        <option value="16-4">April 16,2023</option>
                        <option value="17-4">April 17,2023</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName">

                    <input placeholder="Phone Number" type="text" name="pNumber" required>
                    <input placeholder="Email" type="email" name="email" required>
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">



                    <button type="submit" value="save" name="submit" class="form-btn">Book a seat</button>

                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>