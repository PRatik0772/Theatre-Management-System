<?php
include "config.php";

$id = $_GET['id'];

// Update the user's ban status to 0 (unbanned)
$sql = "UPDATE user SET is_banned = 0 WHERE id = $id";

if ($con->query($sql) === TRUE) {
    header('Location: user.php');
    exit;
} else {
    echo "Error updating record: " . $con->error;
}
?>
