<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        /* Add your own CSS styles to make it appealing */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .cancel-btn {
            padding: 5px 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cinema_db";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Fetch booked seats for the user (modify the query according to your database structure)
        $user_id = 123; // Replace with the actual user ID
        $sql = "SELECT * FROM bookingtable WHERE user_id = $user_id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Movie</th><th>Date</th><th>Seat</th><th>Action</th></tr>";
            
            while ($row = $result->fetch_assoc()) {
                $booking_id = $row["id"];
                $movie = $row["movie"];
                $date = $row["date"];
                $seat = $row["seat"];
                
                echo "<tr>";
                echo "<td>$movie</td>";
                echo "<td>$date</td>";
                echo "<td>$seat</td>";
                echo "<td><button class='cancel-btn' onclick='cancelBooking($booking_id)'>Cancel</button></td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>No bookings found.</p>";
        }
        
        $conn->close();
        ?>
    </div>
    

            <script>
    function cancelBooking(booking_id) {
        // Perform an AJAX request to cancel the booking
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Booking canceled successfully
                    location.reload();
                } else {
                    // Error occurred while canceling the booking
                    console.error(xhr.responseText);
                    alert('An error occurred while canceling the booking.');
                }
            }
        };
        
        xhr.open("POST", "cancel_booking.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("booking_id=" + booking_id);
    }
</script>
</body>
</html>
