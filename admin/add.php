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

           <div class="seats">
                    <?php include('seat reservation.php'); ?>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>ADD ENTRY</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    
                    <div class="booking-form-container">
                    

                    <div class="booking-form-container">
                        <form action="spot.php" method="POST">
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
                            <input placeholder="Phone Number" type="text" name="pNumber" class="form-control" required>
                            <input placeholder="Email" type="email" name="email" class="form-control" required>
                            <input type="text" name="date" class="form-control datepicker" required readonly
                                placeholder="Date">
                          
                    </div>
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
                                    


                                            <input placeholder="Amount" type="text" name="cash" required>
                                            <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="seats" id="seatsInput" value="">
                        
                                            <button type="submit" value="submit" name="submit" class="form-btn">ADD
                                                ENTRY</button>

                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

  

    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>