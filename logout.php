<?php
session_start();
session_unset(); // unset all session variables
session_destroy(); // destroy the session
header("Location: index.php"); // redirect the user to the home page or any other page
exit();
?>