<?php

    // If no ID is given to fetch then redirect to the view equipments page
    if(!isset($_GET["id"])){
        header('location: ./view-equipments.php');
    }
    $equipment_id = $_GET['id']; // The id will be in the url(https://xyz.domain/sub?id="ID")



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "EQUIPMENT NAME"; ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="./equipment-details.css">
</head>
<body>
    <nav class="navbar">
        <div class="title"><a class="black" href="./view-equipments.php">⬅ Go Back</a></div>
    </nav>

    <main>
        <div class="title"><?php echo "EQUIPMENT NAME"; ?></div>
        <div class="img-container">
            <img src="https://i.imgur.com/0r4Ai9g.png" alt="equipment">
        </div>
        <div class="info">
            <div class="title">What's this used for?</div>
            <div class="content">
                A treadmill is a device generally used for walking, running, or climbing while staying in the same place.
                Treadmills were introduced before the development of powered machines to harness the power of animals or humans to do work, often a type of mill operated by a person or animal treading the steps of a treadwheel to grind grain.
                In later times, treadmills were used as punishment devices for people sentenced to hard labor in prisons. 
                The terms treadmill and treadwheel were used interchangeably for the power and punishment mechanisms.
            </div>
        </div>
        <div class="usage">
            <div class="title">How to use it</div>
            <div class="content">
            For a good start, focus on a  straight back or leaning slightly forward , while  wrapping the abdominal strap . Strong and sheathed abs limit the stresses on the lower back.<br><br>
            The treadmill offers a  multitude of exercises  : possible work on  walking ,  running at a  moderate pace (jogging) or at a faster pace. The use of  the inclination  also makes it possible to modify the difficulty of the effort and to use more certain muscles, in particular the glutes and thighs.
            The  march steep  provides more comfort in the joints and back, while burning up to 4x more calories.
            </div>
        </div>
    </main>
</body>
</html>