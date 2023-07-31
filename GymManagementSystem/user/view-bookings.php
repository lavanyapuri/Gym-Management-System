<?php

    session_start();
    $username=$_SESSION["user"];
    $con = mysqli_connect("localhost","root",""); 
    mysqli_select_db($con,"gym");
    // Cancel the trainer's apppointment
    if(isset($_POST["cancel_trainer"])){
        $trainer = $_POST["trainer_name"];
        $slot=$_POST["slot"];
        $sql = "update trainer_booking set `$slot`='0' where `trainer_username`='$trainer'";
        mysqli_query($con, $sql);
        $sql = "update user set `slot`='0' where `username`='$username'";
        mysqli_query($con, $sql);
        $sql = "update user set `approval`='0' where `username`='$username'";
        mysqli_query($con, $sql);
    }

    // Cancel the equipment's booking
    if(isset($_POST['cancel_equipment'])){
        $eq_id = $_POST["equipment_id"];
        $slot=$_POST["slot"];
        $sql = "update equipment_booking set `$slot`='0' where `equipment_id`='$eq_id'";
        mysqli_query($con, $sql);

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="./view-bookings.css">
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

    <!-- Bookings -->
    <div class="title">Trainers booked</div>
    <section id="trainer" class="bookings">
        <?php
        $sql = "select * from trainer_booking";  
        $result = mysqli_query($con, $sql); 
        $msg=""; 
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            foreach($row as $col=>$val)
            {
                $trainer=$row['trainer_username'];
                if($val==$username)
                {
                    $sql = "select approval from user where `username`='$username'";
                    $result1 = mysqli_query($con, $sql);
                    $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC);
                    $a=$row1['approval'];
                    if($a=='1')
                    {
                        $msg="(Booking Confirmed)";
                    }
                    else
                    {
                        $msg="(To be Confirmed)";
                    }
                    echo "<div class='booking'>
                            <div class='content'>
                                <table>
                                    <tr>
                                        <td><b>Trainer Name: </b></td>
                                        <td><div class='name'>$trainer</div></td>
                                    </tr>
                                    <tr>
                                        <td><b>Booked slot: </b></td>
                                        <td> <div class='slot'>$col</div></td>
                                    </tr>
                                    <tr>
                                        <td>$msg</td>
                                    </tr>
                                </table>
                            </div>
                            <form action='' method='POST'>
                                <input type='hidden' name='trainer_name' value='$trainer'>
                                <input type='hidden' name='slot' value='$col'>
                                <input type='submit' value='❌ Cancel booking' name='cancel_trainer' class='btn-danger'>
                            </form>
                        </div>";
                }
            }
        }
        ?>
        <!-- If there are no trainers booked then echo "<div class='message'>No trainers booked</div>" --> 
    </section>
    
    <div class="title">Equipments booked</div>
    <section id="equipment" class="bookings">
        <?php 
        $sql = "select * from equipment_booking";  
        $result = mysqli_query($con, $sql); 
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            foreach($row as $col=>$val)
            {
                $eq_id=$row['equipment_id'];
                $eq_name=$row['equipment_name'];
                if($val==$username)
                {
                    
                    echo "<div class='booking'>
                            <div class='content'>
                                <table>
                                    <tr>
                                        <td><b>Equipment Name: </b></td>
                                        <td><div class='name'>$eq_name</div></td>
                                    </tr>
                                    <tr>
                                        <td><b>Booked slot: </b></td>
                                        <td> <div class='slot'>$col</div></td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <form action='' method='POST'>
                                <input type='hidden' name='equipment_id' value='$eq_id'>
                                <input type='hidden' name='slot' value='$col'>
                                <input type='submit' value='❌ Cancel booking' name='cancel_equipment' class='btn-danger'>
                            </form>
                        </div>";
                }
            }
        }
        ?>
        <!-- If there are no equipments booked then echo "<div class='message'>No equipments booked</div>" -->

    </section>

</body>
</html>