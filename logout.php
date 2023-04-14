<?php

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login.php or any other page
header("Location: login.php");
exit();
?>
