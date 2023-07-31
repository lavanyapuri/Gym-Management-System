<?php

    // If you try to access the page without giving a booking_id, redirect to "view-equipments.php" page
    if((!isset($_GET["id"]))){
        header("location: ./view-equipments.php");
    }
    
    $equipment_id = $_GET["id"];
    $con = mysqli_connect("localhost","root",""); 
    mysqli_select_db($con,"gym");
    $sql = "select * from equipment_booking where `equipment_id`='$equipment_id'";  
    $result = mysqli_query($con, $sql); 
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $msg="";
    
    // Get the available slots for this equipment(use equip id to find)
    // If the given equipment_id does not exists in DB then redirect to "view-equipments.php" page



    // Book a slot, then redirect to some page idk
    if(isset($_POST["book"])){
        session_start();
        $username=$_SESSION["user"];
        $equipment_id;
        $slot = $_POST["slot"];
        $sql = "update equipment_booking set `$slot`='$username' where `equipment_id`='$equipment_id'";
        $result1 = mysqli_query($con, $sql);
        $msg="Slot booked Successfully!!";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book equipment</title>
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
    <form class="book-form" action="./book-equipments.php?id=<?php echo "$equipment_id";?>" method="POST">
        <label for="id">Equipment ID: </label>
        <input type="text" disabled value="<?php echo $equipment_id; ?>"><br>
        <label for="slot">Select the slot from the available ones:</label>
        <select name="slot" id="slot">
            <!-- display all the slots here, I'll use some dummy slot -->
            <option value="<?php echo "SLOT"; ?>"><?php echo "FROM - TO"; ?></option>
            <?php
            foreach($row as $slot=>$val)
            {
                if($val=='0' && $slot!='equipment_id')
                {
                    echo "<option value='".$slot."''>".$slot."</option>";
                    echo "$slot";
                }
            }
            ?>
        </select><br>
        <!--<label for="date">Select the day you want to book it for:</label>
        <select name="date" id="date">
            # display all the dates here
            <option value="<?php echo "DATE"; ?>"><?php echo "DATE"; ?></option>
        </select><br>
        -->
        <p><?php echo $msg;?></p>
        <input type="submit" name="book" value="Book" class="btn-success">
    </form>
</body>
</html>