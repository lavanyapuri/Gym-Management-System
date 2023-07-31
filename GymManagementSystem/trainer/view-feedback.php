<?php

    // Make sure that the trainer is logged in
    // Fetch the feedback given to this trainer from DB and store it in an array
    session_start();
    if(isset($_SESSION["trainer"])){
        $trainer=$_SESSION['trainer'];
        $con = mysqli_connect("localhost","root",""); 
        mysqli_select_db($con,"gym");
        $sql = "select * from feedback where trainer_username = '$trainer'";  
        $result = mysqli_query($con, $sql);   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks | Trainer</title>

    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="./feedback.css">
</head>
<body>
    <nav class="navbar">
        <div class="title"><a class="black" href="#">Feedbacks</a></div>
        <ul class="links">
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a class="btn-secondary" href="./signout.php">Sign out</a></li>
        </ul>
    </nav>
    <section class="main">
        <br>
        <h2 class="title text-center">Feedbacks recieved</h2>

        <!-- Collection of feedbacks -->
        <div class="feedbacks">
            <!-- Dummy data -->
            <div class="feedback">
                <?php
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<div class=from>From : ".$row['user_username']."</div>";
                    echo "<div class=message>Message : ".$row['fdbck']."</div>";
                 }
                ?>
            </div>
        </div>
    </section>
</body>
</html>