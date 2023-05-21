
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
       .seats-container{
        
        max-width: fit-content;
            background-color: whitesmoke;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 40px;
            display: inline-block;
            margin: 70px auto;
            margin-left: 230px;
       }

        .seat-row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            margin-left: 50px;
        }

        .seat {
            width: 50px;
            height: 30px;
            border: #ff0000;
            border-radius: 5px;
            margin-right: 10px;
            margin-bottom: 10px;
            background-color: #e1e1e1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #555555;
            background-color: yellow;

        }

        .booked {
            background-color: #ff0000;
            cursor: not-allowed;
            color: #ffffff;
        }

        .selected {
            background-color: #00ff00;
            cursor: not-allowed;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the selected seats from the form
        $selectedSeats = $_POST['seats'] ?? [];

        // Connect to the database (replace with your own database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cinema_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Convert seat numbers to row-column format
        $seatsBooked = [];
        foreach ($selectedSeats as $seatNumber) {
            $rowNumber = ceil($seatNumber / $columnCount);
            $columnNumber = ($seatNumber - 1) % $columnCount + 1;
            $seatsBooked[] = $rowNumber . '-' . $columnNumber;
        }

        // Update the database with the selected seats
        $seatsBookedStr = implode(',', $seatsBooked);
        $sql = "UPDATE bookingtable SET seats_booked2 = '$seatsBookedStr'";
        if ($conn->query($sql) === true) {
            echo "Seats successfully booked!";
        } else {
            echo "Error updating seats: " . $conn->error;
        }

        $conn->close();
    }

    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="center container">
            <?php
            // Retrieve already booked seat numbers from the database
// Retrieve already booked seat numbers from the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cinema_db";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT seats_booked2 FROM bookingtable";
            $result = $conn->query($sql);

            $bookedSeats = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (!empty($row['seats_booked2'])) {
                        $seatsBooked = explode(',', $row['seats_booked2']);
                        $bookedSeats = array_merge($bookedSeats, $seatsBooked);
                    }
                }
            }

            $conn->close();
            ?>
            <div class="seats-container">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="seats">
            <?php
            // Generate seat buttons
            $rowCount = 10; // Number of seats in each column
            $columnCount = 10; // Number of seats in each row
            $columnNames = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

            for ($row = 1; $row <= $rowCount; $row++) {
                echo '<div class="seat-row">';
                for ($column = 1; $column <= $columnCount; $column++) {
                    $seatNumber = ($row - 1) * $columnCount + $column;
                    $seatClass = in_array($seatNumber, $bookedSeats) ? 'seat booked' : 'seat';
                    $columnName = $columnNames[$column - 1];

                    // Add custom class for columns E and F
                    if ($column === 5 || $column === 6) {
                        echo '<button type="button" class="' . $seatClass . ' seat-partitioned" id="seat-' . $seatNumber . '" onclick="toggleSeatSelection(' . $seatNumber . ')">' . $columnName . $row . '</button>';
                    } else {
                        echo '<button type="button" class="' . $seatClass . '" id="seat-' . $seatNumber . '" onclick="toggleSeatSelection(' . $seatNumber . ')">' . $columnName . $row . '</button>';
                    }
                }
                echo '</div>'; 
            }
            ?>
        </div>
    </form>
</div>

                </form>
            </div>




        </div>
    </form>



    <script>
        var selectedSeats = [];

        function toggleSeatSelection(seatNumber) {
            var seatButton = document.getElementById('seat-' + seatNumber);

            if (seatButton.classList.contains('booked')) {
                // Show already booked popup
                alert('This seat is already booked!');
                return;
            }

            if (selectedSeats.includes(seatNumber)) {
                // Remove seat from selection
                selectedSeats = selectedSeats.filter(function (seat) {
                    return seat !== seatNumber;
                });
                seatButton.classList.remove('selected');
            } else {
                // Add seat to selection
                selectedSeats.push(seatNumber);
                seatButton.classList.add('selected');
            }

            // Update hidden input value with selected seats
            document.getElementById('seatsInput').value = selectedSeats.join(',');
        }
    </script>
</body>

</html>