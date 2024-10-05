<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the login page
echo "<script>alert('You have been logged out successfully.');</script>";
echo "<script>window.open('admin_login.php', '_self');</script>";
?>