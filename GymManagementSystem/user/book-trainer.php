<?php

    $con = mysqli_connect("localhost","root",""); 
    mysqli_select_db($con,"gym");
    $sql = "select trainer_username from trainer_booking";  
    $result1 = mysqli_query($con, $sql);  
    $msg="";
      
    
    // Book a trainer
    if(isset($_POST["book"])){
        
        $trainer_username = $_POST["trainer"];
        $slot = $_POST["slot"];
        $sql = "select `$slot` from trainer_booking where `trainer_username`='$trainer_username'";  
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row[$slot]!='0') 
        {
            $msg="Slot not available!!";
        }
        else
        {
            session_start();
            $username=$_SESSION["user"];
            $sql = "update trainer_booking set `$slot`='$username' where `trainer_username`='$trainer_username'";
            $result = mysqli_query($con, $sql);
            $sql = "update user set `slot`='$slot' where `username`='$username'";
            $result = mysqli_query($con, $sql);
            $msg="Slot booked Successfully!!";

        }

        //$date = $_POST["date"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book trainer apppointment</title>
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
    <form class="book-form" action="book-trainer.php" method="POST">
        <label for="trainer">Select the trainer you want to consult: </label>
        <select name="trainer" id="trainer">
            <option value="<?php echo "TRAINER_NAME"; ?>"><?php echo "TRAINER_NAME"; ?></option>
            <!-- display all the trainers here, I'll use some dummy slot -->
            <?php
            while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
            {
                echo "<option value=".$row['trainer_username'].">".$row['trainer_username']."</option>";

            };
            ?>
        </select><br>
        <label for="slot">Select the slot from the available ones:</label>
        <select name="slot" id="slot">
            <!-- display all the slots here -->
            <option value="<?php echo "SLOT_ID"; ?>"><?php echo "FROM - TO"; ?></option>
            <option value="Slot-1 (7am - 8am)">Slot-1 (7am - 8am)</option>
            <option value="Slot-2 (8am - 9am)">Slot-2 (8am - 9am)</option>
            <option value="Slot-3 (9am - 10am)">Slot-3 (9am - 10am)</option>
            <option value="Slot-4 (6pm - 7pm)">Slot-4 (6pm - 7pm)</option>
            <option value="Slot-5 (7pm - 8pm)">Slot-5 (7pm - 8pm)</option>
        </select><br>
        <!--<label for="date">Select the day you want to book it for:</label>
        <select name="date" id="date">
            #display all the dates here
            <option value="<?php echo "DATE"; ?>"><?php echo "DATE"; ?></option>
        </select><br>
        -->
        <p><?php echo $msg;?></p><br>
        <input type="submit" name="book" value="Book" class="btn-success">
    </form>
</body>
</html>