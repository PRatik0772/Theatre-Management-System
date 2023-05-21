<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
} ?>
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
    <link rel="stylesheet" href="style/booking.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book
        <?php echo $row['movieTitle']; ?> Now
    </title>
    <link rel="icon" type="image/png" href="img/logo.png">



 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>

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
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title">
                <?php echo $row['movieTitle']; ?>

            </div>
            <div class="status-buttons">
                <button class="status-button available" style="background-color: yellow;">
                    <span class="status-box"></span>
                </button>
                <a class="status-label">Available</a>

                <button class="status-button selected" style="background-color: #00ff00;">
                    <span class="status-box"></span>
                </button>
                <a class="status-label">Selected</a>

                <button class="status-button booked" style="background-color: red;">
                    <span class="status-box"></span>
                </button>
                <a class="status-label">Booked</a>
            </div>

            <div class="seatsmovie">
                <div class="center container">
                    <div class="seats">
                        <?php include('admin/seat reservation.php'); ?>
                    </div>


                    <div class="booking-form-container">

                        <form action="verify.php" method="POST">
                            <select name="theatre" class="form-control" required>
                                <option value="" disabled selected>THEATRE</option>
                                <option value="Auditorium 1">Auditorium 1</option>
                                <option value="Auditorium 2">Auditorium 2</option>
                            </select>

                            <select name="type" class="form-control" required>
                                <option value="" disabled selected>TYPE</option>
                                <option value="3d">3D</option>
                                <option value="2d">2D</option>
                            </select>


                            <input placeholder="First Name" type="text" name="fName" class="form-control" required>
                            <input placeholder="Last Name" type="text" name="lName" class="form-control">
                            <input placeholder="Phone Number" type="phone" name="pNumber" class="form-control" required>

                            <input placeholder="Email" type="email" name="email" class="form-control" required
                                value="<?php echo $_SESSION['email']; ?>" required readonly>
                            <input type="text" name="date" class="form-control datepicker" required readonly
                                placeholder="Date">
                            <input type="hidden" name="movie" value="<?php echo $id; ?>">
                            <input type="hidden" name="seats" id="seatsInput">
                            <button type="submit" value="save" name="submit" class="form-btn">Book a seat</button>
                        </form>
                    </div>
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                    <script>
                        $(document).ready(function () {
                            $(".datepicker").datepicker({
                                dateFormat: "yy-mm-dd",
                                minDate: 0, 
                                maxDate: "+4", 
                                showButtonPanel: true,
                            });
                        });
                    </script>


</body>

</html>