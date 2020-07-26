<?php
include 'db.php';
if($_SESSION['ano']=='')
 {

         echo '<script>alert("Please sign up");</script>';
        echo '<script>window.location= "frontpage.php"</script>';
 
  }
$an=$_SESSION['ano'];
$query="select * from admin where an like '$an'";
  $y=mysqli_query($db,$query);
 while( $r = mysqli_fetch_assoc($y))
 {$a=$r['an'];
  $b=$r['name'];
  $stss=$r['status'];
  $s=$r['pic'];
  $user=$r['user'];
  $admin=$r['admin'];
  $scheass=$r['sche_ass'];
  $compass=$r['comp_ass'];
 }
 ?>