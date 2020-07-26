<?php
session_start();
$count=0;
$p=0;
$q_n=$_SESSION['quiz_num'];
$un=$_SESSION["uname"];
include 'db1.php';
$q="select * from post_ans where ass_no='$q_n';";
$result=mysqli_query($db,$q);
 while($r = mysqli_fetch_assoc($result))  
     {  $m=$r['mark'];
        $nm=$r['neg_mark'];
        $no_qn=$r['no_of_qn'];
      
     }
$sql = "SELECT * FROM qn INNER JOIN ans_user on  qn.qn = ans_user.qn and un='$un' and ans_user.ass_no='$q_n' ; ";  
   $result=mysqli_query($db, $sql);
   while($r = mysqli_fetch_assoc($result))  
     {  
     	$ans=$r['ans'];
     	$u=$r['ans_key'];
      $j=0;
     	
     	$output = preg_split("/( |,|\n)/", $ans );
        $user = array();
        for ($x = 0; $x < sizeof($output); $x++) {
            array_push($user,$output[$x]) ;
        }
             
        $output1 = preg_split("/( |,|\n)/", $u );
        $user1 = array();
        for ($x = 0; $x < sizeof($output1); $x++) {
            array_push($user1,$output1[$x]) ;
        }
          
        $i=0;
        $nn=$m/sizeof($user1);
        $nnn=$nm/sizeof($user1);
        
        $tm=$m*$no_qn;
        
         
      while ($j<sizeof($user1)) { 
      while($i<sizeof($user))
     {  
       
        $user[$i] = strtolower($user[$i]);
        $user1[$j] = strtolower($user1[$j]);
	     if($user1[$j]==$user[$i])
		  {  $i=0;
        
        $count=$count+$nn; 
        
        $p=0;
		    break;
		  }
	     else
       {
		     $i++;
         $p++;
       }
      }
      $i=0;
      if($p!=0)
      {
      $count=$count-$nnn;
     
      }
      $j++;
    }
      
   }
   //echo 'Your Score is : ' .$count;
   $c=($count/$tm)*100;
   if($c>=90)
   {
    $s='Gold';
   }
   elseif ($c>=75) {
     $s='Silver';
   }
    elseif ($c>=50) {
     $s='Bronze';
   }
   else
   {
    $s='none';
   }
 $sql = "insert into result(`ass_no`, `un`, `marks_scored`, `tot_m`, `batch`) values ('$q_n','$un','$count','$tm','$s') ; ";
 if(mysqli_query($db, $sql))
 {
 echo "<script>window.location='dashboard2.php';</script>";
}
else
echo "Error: " . $sql . "<br>" . mysqli_error($db);
?>
