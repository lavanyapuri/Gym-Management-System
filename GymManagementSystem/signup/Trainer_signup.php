<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"gym");
$query = "insert into user
          (email, username, password, age, experience, identity) values
		  ('$_POST[email]', '$_POST[username]', '$_POST[password]', '$_POST[age]', '$_POST[experience]', '$_POST[identity]')";
mysqli_query($con, $query);
?>