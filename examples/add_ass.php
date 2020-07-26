<?php
session_start();
$i=0;
$_SESSION['i']=$i;
include 'db.php';
  $ass_no=$_SESSION['ass_no'];
  $ins=$_POST['ins'];
  $dept=$_POST['dept'];
  $yr=$_POST['yr'];
  $sec=$_POST['sec'];
  $t_ins=$_SESSION['t_ins'];
  if($t_ins=='clg')
  {
  $sql="UPDATE `post_ans` set ins='$ins',dept='$dept',yr='$yr',sec='$sec' where ass_no='$ass_no';";
   }
  else
  {
  $sql="UPDATE `post_ans` set ins='$ins',gp='$dept',class='$yr',sec='$sec'where ass_no='$ass_no';";
  }

    if ($db->query($sql) === TRUE) {
      echo "<script type= 'text/javascript'>alert('Registered successfully')</script>";
       echo '<script>window.location= "add_test.php"</script>';
  }
 	?>


