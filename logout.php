<?php
session_start();
session_destroy(); // Destroy the session
header("Location: login.php"); // Redirect to the user login page
exit();
?>
