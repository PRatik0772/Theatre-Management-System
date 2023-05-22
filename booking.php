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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book
        <?php echo $row['movieTitle']; ?> Now
    </title>
    <link rel="icon" type="image/png" href="img/logo.png">



    <style>
        .seatsmovie {
            margin-left: 450px max-width: fit-content;
            background-color: whitesmoke;
            border: 1px solid #ccc;
            padding: 2px;
            border-radius: 5px;
            display: inline-block;
        }

        .status-buttons {
            margin-left: 0 auto;
        }

        .status-button {

            display: flex;

            align-items: center;
            justify-content: space-between;
            /* Align items horizontally */
            margin-top: 10px;
            margin-bottom: 10px;
            display: inline-block;

        }

        .status-box {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            display: inline-block;

        }

        .status-label {
            flex-direction: column;

            margin-left: 10px;
            white-space: nowrap;
            /* Prevent line break for long text */
        }


        .booking-panel {
            display: grid;
            grid-gap: 20px;
            grid-template-columns: 1fr 3fr;
            background-color: #fff;
            padding: 20px;
            box-shadow: 1px 0px 23px 3px rgba(0, 0, 0, 0.45);
            transition: all 0.7s ease;
            width: 90%;
            height: auto;
            margin: 0 auto;
        }

        .booking-panel-section2>i {
            background-color: #b6b6b6;
            color: #fff;
            padding: 10px;
            float: right;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .booking-panel-section2>i:hover {
            color: #8b8b8b;
        }

        .booking-panel-section3>.movie-box {
            border-radius: 10px;
            overflow: hidden;
        }

        .booking-panel-section3 img {
            max-width: 100%;
        }

        .booking-panel-section4 {
            border-radius: 10px;
            border: 1px solid #6e5a11;
            background-color: #fff;
            padding: 20px;
        }

        .booking-panel-section4>.title {
            border-bottom: 1px solid #969696;
            color: #6e5a11;
            margin: 0;
            font-size: 24pt;
            padding-bottom: 15px;
            font-weight: bold;
        }

        .movie-information>table {
            padding: 0;
        }

        .movie-information td {
            padding: 20px 0;
            text-align: left;
            color: #969696;
        }

        .movie-information table tr td:first-child {
            color: #585858;
            font-weight: bold;
        }

        .booking-panel-section4 {
            display: grid;
            grid-gap: 1px;
        }

        .movie-information {
            margin-top: 20px;
        }

        .booking-form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .form-control {
            width: 30%;
            height: 42px;
            margin-bottom: 50px;
            margin-left: 150px;
        }

        .form-btn {

            background-color: #007bff;
            color: white;
            width: 500px;
            height: 42px;
            margin-left: 350px;
        }

        .warning-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }


        @media (max-width: 768px) {
            .booking-panel {
                grid-template-columns: 1fr;
            }
    </style>
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
                                <option value="3D">3D</option>
                                <option value="2D">2D</option>
                            </select>
                            <select name="time" class="form-control" required>
                                <option value="" disabled selected>TIME</option>
                                <option value="9:00 AM">9:00 AM </option>
                                <option value="12:30 PM">12:30 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="7:00 PM">7:00 PM</option>


                            </select>



                            <input placeholder="First Name" type="text" name="fName" class="form-control" required>
                            <input placeholder="Last Name" type="text" name="lName" class="form-control">
                            <input placeholder="Phone Number" type="phone" name="pNumber" class="form-control" required>

                            <input placeholder="Email" type="email" name="email" class="form-control" required
                                value="<?php echo $_SESSION['email']; ?>" required readonly>
                            <input type="text" name="date" class="form-control datepicker" required readonly
                                placeholder="Date">
                            <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="seats" id="seatsInput" value="">
                            <input type="hidden" name="status" value="">

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
                                minDate: 0, // Set minimum date to today
                                maxDate: "+4", // Set maximum date to 4 days from today
                                showButtonPanel: true,
                                onSelect: function (dateText, inst) {
                                    var selectedDate = new Date(dateText);
                                    var currentDate = new Date();

                                    if (selectedDate > currentDate) {
                                        // If the selected date is in the future, set status to 'Pending'
                                        $('input[name="status"]').val('Pending');
                                    } else if (selectedDate < currentDate) {
                                        // If the selected date is in the past, set status to 'Closed'
                                        $('input[name="status"]').val('Closed');
                                    } else {
                                        // If the selected date is the same as the current date, set status to 'Cancelled'
                                        $('input[name="status"]').val('Cancelled');
                                    }
                                }
                            });
                        });
                    </script>


</body>

</html>