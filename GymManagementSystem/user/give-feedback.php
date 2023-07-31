<?php

    // Get all the registered trainer's name(and id). Store it in a variable
    // We'll display the name to the user in a <select></select> and when they submit the form, we use the id to identify the trainer
    // And insert a row in database that has feedback to that trainer_id with the feedback message they submitted
    session_start();
    if(isset($_SESSION["user"])){
        $user=$_SESSION["user"];
    }
    $con = mysqli_connect("localhost","root",""); 
    mysqli_select_db($con,"gym");
    $sql = "select username from trainer";  
    $result1 = mysqli_query($con, $sql);
    if(isset($_POST["Submit"])){
        $query = "insert into feedback
          (user_username, trainer_username, fdbck) values
          ('$user', '$_POST[trainer]', '$_POST[message]')";
        mysqli_query($con, $query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give trainer feedback</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="./give-feedback.css">
</head>
<body>
    <nav class="navbar">
        <div class="title"><a class="black" href="./view-equipments.php" style="color: white">⬅ Go Back</a></div>
    </nav>

    <main>
        <form action="http://localhost/code/user/give-feedback.php" method="post">
            <div class="title">Give your feedback here</div>
            <label for="trainer">Select the trainer: </label><br>
            <select name="trainer" id="trainer">
                <!-- For each trainer that is stored in the array(which was fetched from the DB) -->
                <option value="<?php echo "TRAINER_ID";?>"><?php echo "TRAINER_NAME"; ?></option>
                <?php
                    while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
                    {
                        echo "<option value=".$row['username'].">".$row['username']."</option>";

                    };
                ?>
            </select>
            <div class="line"></div>
            <label for="message">Enter the feedback: </label><br>
            <textarea name="message" id="message" rows=10 cols=70></textarea><br>
            <button type="submit" name="Submit" class="btn-success">Submit</button>
        </form>        
    </main>
</body>
</html>