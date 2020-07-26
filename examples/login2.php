<?php
session_start();
include 'db.php';
extract($_POST);
function otp_generate($chars) 
{
  $data = '1234567890';
  return substr(str_shuffle($data), 0, $chars);
}

if(isset($_POST['otp']))
{
$uno2=$_SESSION['uno1'];
$pass=$_SESSION['pass'];
$query="select * from user where un like '$uno2' and otp like '$otp' ;";
  $result=mysqli_query($db,$query);
 if (mysqli_num_rows($result)>0) {
        if(mysqli_query($db,"update user set otp='1abc' where un like '$uno2'"))
      {  
          
          $subject = "Quizapp";
         $to = $uno2;
         $message = "
             
              
          Welcome to QUIZAPP !!!
          You have registered to Quizapp successfully...

          Your username is   $uno2
          
          your password is   $pass
          

          Go Back to your Quiz app and enter the OTP for complete Registration.
          
    
           ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <mkharishkumarbtech@gmail.com>' . "\r\n";
        $headers .= 'Cc: ' . "\r\n";
        if(mail($to,$subject,$message,$headers))
        {

   echo"yes";
        }
      else
       {
        echo "failed";
        }

          echo json_encode(array("statusCode"=>200));
                   $_SESSION['el1']=0;
                     echo json_encode(array("statusCode"=>200));

  
      }      
 
    }
    else
    {         $_SESSION['el1']=2;

    	$pass1=otp_generate(5);
    	if(mysqli_query($db,"update user set otp='$pass1' where un like '$uno2'"))
    	{
    	     $subject = "Quizapp";
         $to = $uno2;
         $message = "
             
              
          Welcome to QUIZAPP !!!
          You have registered to Quizapp successfully...

          Your OTP is   $pass1
          
         

          Go Back to your Quiz app and enter the OTP for complete Registration.
          
    
           ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <mkharishkumarbtech@gmail.com>' . "\r\n";
        $headers .= 'Cc: ' . "\r\n";
        if(mail($to,$subject,$message,$headers))
        {

   echo"yes";
        }
      else
       {
        echo "failed";
        }

    	}
    }

          
 }

?>
