<?php

    // Make sure that the user is logged in
    // ^^ Check by seeing if the $_SESSION["user"] variable isset() or not
    session_start();
    if(isset($_SESSION["user"]))
    {
        $username=$_SESSION["user"];
    }
    else
    {
        // If not set then redirect to either login or landing page
        $username="username";
        header("Location: http://localhost/code/login/user.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../nav.css">
</head>
<body>
    <nav class="navbar">
        <div class="title"><a class="black" href="#">ABC Gym</a></div>
        <ul class="links">
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="./view-equipments.php">Equipment Info</a></li>
            <li><a href="./view-bookings.php">My bookings</a></li>
            <li><a href="./give-feedback.php">Feedback</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a class="btn-secondary" href="./signout.php">Sign out</a></li>
        </ul>
    </nav>

    <main class="landing">
        <div class="title-box">
            <h1 class="title">Welcome, <?php echo "$username"; ?></h1>
            <h2 class="sub-title">Hope you're having a good day</h2>
            <div class="arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
        </div>
    </main>
    <section id="equipments-trainers" class="section">
        <div class="title">Get to know about Gym equipments and trainers</div>
        <a href="./view-equipments.php" class="btn-primary">View Equipments</a>
        <a href="./book-trainer.php" class="btn-primary">Book Trainers</a>
    </section>
    <section id="bookings" class="section">
        <div class="title">Check your bookings</div>
        <a href="./view-bookings.php" class="btn-secondary">View Bookings</a>
    </section>
    <section id="feedback" class="section">
        <div class="title">Want to tell your trainer something?</div>
        <a href="./give-feedback.php" class="btn-primary">Write a feedback</a>
    </section>
</body>
</html>