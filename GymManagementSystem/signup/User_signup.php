<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"gym");
$query = "insert into user
          (email, username, password, age, current_weight, target_weight, diseases, approvl) values
		  ('$_POST[email]', '$_POST[username]', '$_POST[password]', '$_POST[age]', '$_POST[cur_weight]', '$_POST[target_weight]', '$_POST[diseases]', 0)";
mysqli_query($con, $query);
?>