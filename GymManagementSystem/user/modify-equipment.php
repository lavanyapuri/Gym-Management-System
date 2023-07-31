<?php

    // If you try to access the page without giving a booking_id, redirect to "My bookings" page
    if(!isset($_GET["booking_id"])){
        header("location: ./view-bookings.php");
    }

    $booking_id = $_GET["booking_id"];
    // Get the details of the booked appoinment from the DB, like equipment_id, etc
    $equipment_id = "GET FROM DB";
    // Get the free slots of that equipment from DB and display that in form
    


    // If the user submits "Update booking" form, update the DB with new values 
    if(isset($_POST["update_booking"])){
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify equipment booking</title>
    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="./book-equipment.css">
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
    <form class="book-form" action="" method="POST">
        <label for="trainer">Modifying booking ID: </label>
        <input type="text" name="booking_id" id="booking_id" value="<?php echo $booking_id; ?>" disabled>
        <form class="book-form" action="" method="POST">
        <label for="id">Equipment ID: </label>
        <input type="text" disabled value="<?php echo $equipment_id; ?>"><br>
        <label for="slot">Select the slot from the available ones:</label>
        <select name="slot" id="slot">
            <!-- display all the slots here, I'll use some dummy slot -->
            <option value="<?php echo "SLOT_ID"; ?>"><?php echo "FROM - TO"; ?></option>
        </select><br>
        <label for="date">Select the day you want to book it for:</label>
        <select name="date" id="date">
            <!-- display all the dates here-->
            <option value="<?php echo "DATE"; ?>"><?php echo "DATE"; ?></option>
        </select><br>
        <input type="submit" name="update_booking" value="Update booking" class="btn-primary">
    </form>
    </form>
</body>
</html>