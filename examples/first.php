<?php
session_start();
include 'db.php';
$q_no=$_SESSION['q_no'];
$duration="";
date_default_timezone_set('Asia/Kolkata');
$res=mysqli_query($db,"select tot_time from post_ans where ass_no like '$q_no'");
while($row=mysqli_fetch_array($res))
{
	$duration=$row["tot_time"];
	
}
$_SESSION["duration"]=$duration;
$_SESSION["start_time"]=date("Y:m:d H:i:s");
echo $duration;

$end_time=$end_time=date('Y:m:d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));


$_SESSION["end_time"]=$end_time;

?>
