
<?php
//session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'db.php';

//$unum=$_SESSION['unum'];
$unum="103";




if(isset($_POST['submit']))
{



$fn=$_POST['fn'];
$ln=$_POST['ln'];
$dob=$_POST['dob'];
//$email=$_POST['email'];
$gen=$_POST['gen'];
$phno=$_POST['phno'];
//$un=$_POST['un'];
$t_ins=$_POST['t_ins'];
$abtme=$_POST['abtme'];

  if($t_ins=='school')
{
$ins=$_POST['ins'];
$class=$_POST['class'];
$gp=$_POST['gp'];
$rno=$_POST['rno'];
$q="update user set fn='$fn',ln='$ln',dob='$dob',gender='$gen',phno='$phno',t_ins='$t_ins',ins='$ins',class='$class',gp='$gp',rno= '$rno' where un like '$unum' ";
}


 if($t_ins=='clg')
{
$ins=$_POST['ins'];
$class=$_POST['yr'];
$gp=$_POST['dept'];
$rno=$_POST['rno'];
$q="update user set fn='$fn',ln='$ln',dob='$dob',gender='$gen',phno='$phno',t_ins='$t_ins',ins='$ins',yr='$class',dept='$gp',rno= '$rno' where un like '$unum' ";
}





if(mysqli_query($db,$q))
{
  echo '<script>alert("profile updated");</script>';
   echo '<script>window.location.href="dashboard2.php";</script>';

}
else
{
  echo "Error: " . $q . "<br>" . mysqli_error($db);
}



}


?>




