<?php
// Start the session to access session variables
session_start();

// Destroy all session variables to log the user out
session_unset();
session_destroy();

// Redirect the user to the landing page
header("Location: landing_page.php");
exit();
?>
