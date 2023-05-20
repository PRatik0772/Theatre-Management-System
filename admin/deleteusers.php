<?php
include "config.php";

$id = $_GET['id'];

// Delete the user
$sql = "DELETE FROM user WHERE id = $id";

if ($con->query($sql) === TRUE) {
    // Reset the auto-increment value
    mysqli_query($con, "ALTER TABLE user AUTO_INCREMENT = 1");

    header('Location: user.php');
    exit;
} else {
    echo "Error deleting record: " . $con->error;
}
?>