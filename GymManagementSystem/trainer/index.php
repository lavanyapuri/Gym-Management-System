<?php

    // Make sure that the user is logged in
    // ^^ Check by seeing if the $_SESSION["trainer"] variable isset() or not
    session_start();
    if(isset($_SESSION["trainer"]))
    {
        $trainer=$_SESSION["trainer"];
    }
    else
    {
        // If not set then redirect to either login or landing page
        $trainer="username";
        header("Location: http://localhost/code/login/trainer.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>

    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../nav.css">
</head>
<body>
    <nav class="navbar">
        <div class="title"><a class="black" href="#">ABC Gym</a></div>
        <ul class="links">
            <li><a href="../contact.php">Contact</a></li>
            <li><a class="btn-secondary" href="./signout.php">Sign out</a></li>
        </ul>
    </nav>

    <section class="landing">
        <div class="title-box">
            <h1 class="title">Welcome, <?php echo "$trainer"; ?></h1>
            <h2 class="sub-title">Checkout the below</h2>
            <div class="line"></div>
            <a href="./view-appointments.php" class="btn-primary">View Appointments</a>
            <br>
            <a href="./view-feedback.php" class="btn-primary">View Feedbacks</a>
        </div>
    </section>
</body>
</html>