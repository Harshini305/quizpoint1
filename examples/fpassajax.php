<?php
include "db.php";
include "adb.php";
extract($_POST);
if(isset($_POST['pass']) && isset($_POST['cpass']))
{
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
	session_start();
	$email=$_SESSION['femail'];
    $id=$_SESSION['fid'];
    
    if($pass == $cpass)
    { $pass2=md5($pass);
        if($id == 'user')
        {
        $query=mysqli_query($db,"update user set pass='$pass2' where un='$email';");
            if($query)
            {
                echo '<script>alert("New Password is successfully updated...");</script>';
                 echo '<script>window.location= "frontpage.php"</script>';
 
            }
            else{
                echo '<script>alert("Something went Wrong !!!");</script>';
                 echo '<script>window.location= "frontpage.php"</script>';
 
            }

        }
        if($id == 'admin')
        {
        $query=mysqli_query($db,"update admin set pass='$pass2' where an='$email';");
        
 
            if($query)
            {
                echo '<script>alert("New Password is successfully updated...");</script>';
                 echo '<script>window.location= "frontpage.php"</script>';
 
            }
            else{
                echo '<script>alert("Something went Wrong !!!");</script>';
                 echo '<script>window.location= "frontpage.php"</script>';
 
            }

        }
    }
	else
	{
		echo'<script>alert("password miss match");</script>';
		echo '<script>window.location= "fpass.php"</script>';
	}
  
  
}

if(isset($_POST['uemail']))
{
	$uemail=$_POST['uemail'];
	session_start();
	$_SESSION['femail']=$uemail;
	$_SESSION['fid']="user";
  
  $query="select * from user where un like '$uemail' and is_deleted like 'not deleted'  ;";
	  $result=mysqli_query($db,$query);
	  if (mysqli_num_rows($result)>0) {
          echo json_encode(array("statusCode"=>200));
		$subject = "Quizapp";
		$to = $_POST['uemail'];
		$message = "
			
			 
		 Welcome to QUIZAPP !!!
		 Your Conformation Link for Changing Password is below...
		 
		 https://quizpoint.goldfieldfitness.com/argon-dashboard-master/examples/fpass.php
		 
		 Click the below Link to change your password.	 

	
		  ";
	   $headers = "MIME-Version: 1.0" . "\r\n";
	   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	   $headers .= 'From: <mkharishkumarbtech@gmail.com>' . "\r\n";
	   $headers .= 'Cc: ' . "\r\n";
	   if(mail($to,$subject,$message,$headers))
	   {
        
		echo '<script>alert("Check your Mail for the conformation  link");</script>';
	   }
	 else
	  {
		echo '<script>alert("failed");</script>';
	   }	  
	
	
	}
}


if(isset($_POST['aemail']))
{
	$aemail=$_POST['aemail'];
	session_start();
	$_SESSION['femail']=$aemail;
	$_SESSION['fid']="admin";
  
  $query="select * from admin where an like '$aemail' and is_deleted like 'not deleted'  ;";
	  $result=mysqli_query($db,$query);
	  if (mysqli_num_rows($result)>0) {
          echo json_encode(array("statusCode"=>200));
		$subject = "Quizapp";
		$to = $_POST['aemail'];
		$message = "
			
			 
		 Welcome to QUIZAPP !!!
		 Your Conformation Link for Changing Password is below...
		 
		 https://quizpoint.goldfieldfitness.com/argon-dashboard-master/examples/fpass.php
		 
		 Click the below Link to change your password.	 

	
		  ";
	   $headers = "MIME-Version: 1.0" . "\r\n";
	   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	   $headers .= 'From: <mkharishkumarbtech@gmail.com>' . "\r\n";
	   $headers .= 'Cc: ' . "\r\n";
	   if(mail($to,$subject,$message,$headers))
	   {
        
		echo '<script>alert("Check your Mail for the conformation  link");</script>';
	   }
	 else
	  {
		echo '<script>alert("failed");</script>';
	   }	  
	
	}
}





?>