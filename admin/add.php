<?php
include "config.php";

if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add custom entry</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
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


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>ADD ENTRY</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form action="spot.php" method="POST">


                            <select name="theatre" required>
                                <option value="" disabled selected>Theatre</option>
                                <option value="main-hall">Main Hall</option>
                                <option value="vip-hall">VIP Hall</option>
                                <option value="private-hall">Private Hall</option>
                            </select>

                            <select name="type" required>
                                <option value="" disabled selected>Show Type</option>
                                <option value="3d">3D</option>
                                <option value="2d">2D</option>
                            </select>

                            <select name="date" required>
                                <option value="" disabled selected>Date</option>
                                <option value="12-3">April 12,2023</option>
                                <option value="13-3">April 13,2023</option>
                                <option value="14-3">April 14,2023</option>
                                <option value="15-3">April 15,2023</option>
                                <option value="16-3">April 16,2023</option>
                            </select>

                            <select name="hour" required>
                                <option value="" disabled selected>Time</option>
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
                            <form method="post" action="process_form.php">
                                <div class="container">
                                    <label for="movie_id"></label>
                                    <select name="movie_id" id="movie_id">
                                        <?php
                                        $mysqli = new mysqli("localhost", "root", "", "cinema_db");
                                        if ($mysqli->connect_error) {
                                            die("Connection failed: " . $mysqli->connect_error);
                                        }

                                        $sql = "SELECT movieID FROM movietable";
                                        $result = $mysqli->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["movieID"] . "'> " . $row["movieID"] . "</option>";
                                            }
                                        }
                                        $mysqli->close();
                                        ?>
                                        <?php
                                        if (isset($_POST['ticket_quantity'])) {
                                            $ticketQuantity = $_POST['ticket_quantity'];

                                        
                                            $servername = "localhost"; 
                                            $username = "root"; 
                                            $password = ""; 
                                            $dbname = "cinema_db"; 
                                        
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "INSERT bookingtable SET tickets = ?"; 
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("i", $ticketQuantity); 
                                            $stmt->execute();
                                            $stmt->close();

                                            $conn->close();
                                        } else {
                                            echo "Error: Ticket quantity not provided";
                                        }
                                        ?>
                                        <div class="ticket-container">
                                            <label for="ticket_quantity"></label>
                                            <input type="number" name="ticket_quantity" id="ticket_quantity"
                                                value="No. of Tickets" min="1" max="100" placeholder="Ticket Quantity">




                                            <input placeholder="Amount" type="text" name="cash" required>

                                            <button type="submit" value="submit" name="submit" class="form-btn">ADD
                                                ENTRY</button>

                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>

    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>