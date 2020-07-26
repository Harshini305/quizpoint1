<?php
$servername = "bulls";
$username = "goldfiel_user";
$password = "quiz2m";
$dbname = "goldfiel_quiz2m";
 $db = mysqli_connect($servername, $username, $password, $dbname);
  if (!$db) 
    die("Connection failed: " . mysqli_connect_error());
 


?> 
	