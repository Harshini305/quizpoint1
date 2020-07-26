<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'db.php';
$l=$_SESSION['ano'];
 	 $a=$_POST['n'];
 	 $b=$_POST['q'];
 	 $c=$_POST['d'];
 	 $d=$_POST['i'];
 	 $e=$_POST['e'];
 	 $f=$_POST['m'];
 	 $qq="UPDATE admin SET phno='$f',ins='$d',quali='$b',desig='$c',name='$a' WHERE an='$l';";
if (mysqli_query($db,$qq)) {   
    echo "<script type= 'text/javascript'>alert('Profile Updated')</script>";
    echo '<script>window.location= "profile.php"</script>';
       
     }
     else {
        echo "Error: " . $qq . "<br>" . mysqli_error($db);
    } 
 ?>