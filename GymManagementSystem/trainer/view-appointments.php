<?php

    // Make sure that the trainer is logged in
    // Fetch the appointments of this trainer and store it in an array
    $con = mysqli_connect("localhost","root",""); 
    mysqli_select_db($con,"gym");
    session_start();
    $trainer=$_SESSION["trainer"];
    $sql = "select * from trainer_booking where trainer_username='$trainer'";  
    $result = mysqli_query($con, $sql);

    // If the trainer presses cancel button, this page will get a POST request
    // So check if isset($_POST["cancel"])
    if (isset($_POST["cancel"]))
    {
        $slot=$_POST["slot"];
        $username=$_POST["user_username"];
        $sql = "update trainer_booking set `$slot`='0' where `trainer_username`='$trainer'";
        mysqli_query($con, $sql);
        $sql = "update user set `slot`='0' where `username`='$username'";
        mysqli_query($con, $sql);
        $sql = "update user set `approval`='0' where `username`='$username'";
        mysqli_query($con, $sql);

    }

    if(isset($_POST["confirm"]))
    {
        $username=$_POST["user_username"];
        $sql = "update user set `approval`='1' where `username`='$username'";
        mysqli_query($con, $sql);
    }
    // ^ If true, then cancel the appointment with id = $_POST["appointment_id"]
    // Same with $_POST["done"]. If isset() then mark the appointment with id = $_POST["appointment_id"] as done

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments | Trainer</title>

    <!-- Importing the css -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="./appointments.css">
</head>
<body>
    <nav class="navbar">
        <div class="title"><a class="black" href="#">Appointments</a></div>
        <ul class="links">
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a class="btn-secondary" href="./signout.php">Sign out</a></li>
        </ul>
    </nav>
    <section class="main">
        <br>
        <h2 class="title text-center">Appointments</h2>

        <!-- Collection of feedbacks -->
            <?php
            $msg=""; 
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                foreach($row as $col=>$val)
                {
                    
                    if($col!="trainer_username" && $val!='0')
                    {
                    $user=$val;
                    $sql = "select approval from user where `username`='$user'";
                    $result1 = mysqli_query($con, $sql);
                    $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC);
                    $a=$row1['approval'];
                    if($a=='1')
                    {
                        $msg="Confirmed";
                    }
                    else
                    {
                        $msg="Not Confirmed";
                    }
                    echo "  <center><div class='appointment'>
                                <div class='booked-by'>Booked by $user</div>
                                <div class='contents'>
                                    <div class='appointment-slot'><b>Appointment slot:</b> $col</div>
                                    <div class='booked-for'><b>Booking Status:</b> $msg</div>
                                </div>
                                <div class='footer'>
                                    <form action='' method='post'>
                                        <input type='hidden' name='user_username' value='$user'>
                                        <input type='hidden' name='slot' value='$col'>
                                        <button type='submit' name='confirm' class='btn-success'>Confirm</button>
                                        <button type='submit' name='cancel' class='btn-danger'>Cancel</button>
                                    </form>
                                </div>
                            </div>";
                    }
                }
            }
            ?>

        </div>
    </section>
</body>
</html>