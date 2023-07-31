<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Gym</title>

    <!-- Importing the css -->
    <link rel="stylesheet" href="./global.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./nav.css">
</head>
<body style="background: url(gym_img2.jpg) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <nav class="navbar">
        <div class="title"><a class="black" href="./index.php"><font color="blue"><b>ABC Gym</b></font></a></div>
        <ul class="links">
            <li>
                <font color="blue"><b>Login</b></font>
                <div class="sub-menu">
                    <ul>
                        <li><a href="./login/user.php">User</a></li>
                        <li><a href="./login/trainer.php">Trainer</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <font color="blue"><b>Sign Up</b></font>
                <div class="sub-menu">
                    <ul>
                        <li><a href="./signup/user.php">User</a></li>
                        <li><a href="./signup/trainer.php">Trainer</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="./contact.php"><font color="blue"><b>Contact</b></font></a></li>
            <li><a href="./aboutus.php"><font color="blue"><b>About Us</b></font></a></li>
        </ul>
    </nav>

    <section class="landing">
        <div class="title-box">
            <h1 class="title"><font color="white">ABC Gym</font></h1>
            <h2 class="sub-title"><font color="white">A Modern Gym</font></h2>
            <div class="line"></div>
            <a href="./login/user.php" class="btn-primary">User Login</a>
            <a href="./login/trainer.php" class="btn-primary">Trainer Login</a>
            <div class="line"></div>
            <a href="./signup/user.php" class="btn-secondary">User Signup</a>
            <a href="./signup/trainer.php" class="btn-secondary">Trainer Signup</a>
        </div>
    </section>
</body>
</html>