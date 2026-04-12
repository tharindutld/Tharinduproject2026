<?php
// Start the session
session_start();

// Destroy all session data
session_unset();   // remove all session variables
session_destroy(); // destroy the session

// Redirect to login page (change this if your login page is different)
header("Location: login.php");
exit();
?>
