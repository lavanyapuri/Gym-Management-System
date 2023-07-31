<?php

// You'll get a POST req to this page once the user submits the form
// Check if isset($_POST["login"])
$msg="";
if(isset($_POST['login']))
{
    // If it is set, then get the email and password
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $con = mysqli_connect("localhost","root",""); 
    mysqli_select_db($con,"gym");
    $sql = "select * from trainer where email = '$email' and password = '$pass'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1){ 
        // If they match with our record in DB then set a $_SESSION["trainer"] = username
        session_start();
        $username=$row['username'];
        $_SESSION["trainer"] = $username;
        //Redirect them to index.php inside "trainer" folder 
        header("Location: http://localhost/code/trainer/index.php");
        exit(); 
    }  
    else
    {  
        $msg="Login failed. Invalid username or password.";  
    }     

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Trainer</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="../nav.css">
</head>
<body style="background: url(gym_img3.jpg) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <nav class="navbar">
        <div class="title"><a class="black" href="../index.php">⬅ Go Back</a></div>
    </nav>

    <div class="form">
        <h1 class="title">Trainer Login</h1>
        <form action="" method="post">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
            <p><?php echo $msg;?></p>
            <button class="btn-primary btn-center" name="login">Login</button>
        </form>
    </div>
</body>
</html>