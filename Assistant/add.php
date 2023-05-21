<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
    exit(); // Add this line to stop executing the code
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
    exit(); // Add this line to stop executing the code
}

// Assuming you have already established a database connection

// Fetch the data from the "movietable" table
$query = "SELECT movieID FROM movietable";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Fetch all rows from the result set
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the query error
    // You can display an error message or perform other actions here
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add entry</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($link, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM feedbackTable"));
    $moviesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM movieTable"));
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>

        <div class="admin-section admin-section2">
            <div class="admin-section-column">

                <div class="seatsmovie">
                    <div class="center container">
                        <div class="seats">
                            <?php include('seat reservation2.php'); ?>
                        </div>

                        <div class="admin-section-panel admin-section-panel2">
                            <div class="admin-panel-section-header">
                                <h2>ADD ENTRY</h2>
                                <i class="fas fa-film" style="background-color: #4547cf"></i>
                            </div>
                            <div class="booking-form-container">
                                <form action="spot.php" method="POST">
                                    <select name="theatre" class="form-control" required>
                                        <option value="" disabled selected>THEATRE</option>
                                        <option value="Auditorium 1">Auditorium 1</option>
                                        <option value="Auditorium 2">Auditorium 2</option>
                                    </select>
                                    <select name="time" class="form-control" required>
                                        <option value="" disabled selected>Time</option>
                                        <option value="time 1">7:00 AM</option>
                                        <option value="time 2">10:30 AM</option>
                                        <option value="time 3">1:30 PM</option>
                                    </select>
                                    <select name="type" class="form-control" required>
                                        <option value="" disabled selected>TYPE</option>
                                        <option value="3d">3D</option>
                                        <option value="2d">2D</option>
                                    </select>
                                    <input placeholder="First Name" type="text" name="fName" class="form-control"
                                        required>
                                    <input placeholder="Last Name" type="text" name="lName" class="form-control">
                                    <input placeholder="Phone Number" type="phone" name="pNumber" class="form-control"
                                        required>
                                    <input placeholder="Email" type="email" name="email" class="form-control" required>
                                    <input type="text" name="date" class="form-control datepicker" required
                                        placeholder="Date">
                                    <input placeholder= "Movie ID" type="movie" name="movieID" class="form-control"
                                        value="<?php echo isset($_GET['movieID']) ? $_GET['movieID'] : ''; ?>"required>
                                    <input type="hidden" id="seatsInput" name="seats" value="">
                                    <button type="submit" value="save" name="submit" class="form-btn">Book a
                                        seat</button>
                                </form>
                            </div>
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                            <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../scripts/jquery-3.3.1.min.js"></script>
            <script src="../scripts/owl.carousel.min.js"></script>
            <script src="../scripts/script.js"></script>
        </div>
    </div>
</body>

</html>