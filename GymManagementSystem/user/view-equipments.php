<?php

    // Make sure that the user is logged in
    // ^^ Check by seeing if the $_SESSION["user"] variable isset() or not
    // If not set then redirect to either login or landing page

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Info</title>

    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./view-equipments.css">
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

    <main>
        <div class="title">Equipment Info</div>
        <div class="cards">
            <div class="card">
                <div class="card-img">
                    <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
                </div>
                <div class="card-title">Equipment name</div>
                <div class="card-button">
                    <a href="./book-equipments.php?id=<?php echo "eq_1"; ?>" class="btn-primary">Book equipment</a>
                    <a href="./equipment-details.php?id=<?php echo "eq_1"; ?>" class="btn-success">See more</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
                </div>
                <div class="card-title">Equipment name</div>
                <div class="card-button">
                    <a href="./book-equipments.php?id=<?php echo "eq_2"; ?>" class="btn-primary">Book equipment</a>
                    <a href="./equipment-details.php?id=<?php echo "eq_2"; ?>" class="btn-success">See more</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
                </div>
                <div class="card-title">Equipment name</div>
                <div class="card-button">
                    <a href="./book-equipments.php?id=<?php echo "eq_3"; ?>" class="btn-primary">Book equipment</a>
                    <a href="./equipment-details.php?id=<?php echo "eq_3"; ?>" class="btn-success">See more</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
                </div>
                <div class="card-title">Equipment name</div>
                <div class="card-button">
                    <a href="./book-equipments.php?id=<?php echo "eq_4"; ?>" class="btn-primary">Book equipment</a>
                    <a href="./equipment-details.php?id=<?php echo "eq_4"; ?>" class="btn-success">See more</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
                </div>
                <div class="card-title">Equipment name</div>
                <div class="card-button">
                    <a href="./book-equipments.php?id=<?php echo "eq_5"; ?>" class="btn-primary">Book equipment</a>
                    <a href="./equipment-details.php?id=<?php echo "eq_5"; ?>" class="btn-success">See more</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
                </div>
                <div class="card-title">Equipment name</div>
                <div class="card-button">
                    <a href="./book-equipments.php?id=<?php echo "eq_6"; ?>" class="btn-primary">Book equipment</a>
                    <a href="./equipment-details.php?id=<?php echo "eq_6"; ?>" class="btn-success">See more</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>