<?php
// unset the $_SESSION["user"] and redirect to either login or landing page
session_destroy();
unset($_SESSION['user']);
header('location: http://localhost/code/index.php');
?>