<?php
// unset the $_SESSION["trainer"] and redirect to either login or landing page
session_destroy();
unset($_SESSION["trainer"]);
header('location:http://localhost/code/index.php');
?>