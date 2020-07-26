<?php
session_start();
include 'db.php';
extract($_POST);
function otp_generate($chars) 
{
  $data = '1234567890';
  return substr(str_shuffle($data), 0, $chars);
}
function password_generate($chars)  
{
   $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';   
   return substr(str_shuffle($data), 0, $chars);
    }

$pass1=password_generate(7);
$otp=otp_generate(5);

if(isset($_POST['email']))
{
  
  $_SESSION['uno1']=$email;
  $pass2=md5($pass1);
  $_SESSION['pass']=$pass1;


$query="select * from user where un like '$email' and is_deleted like 'not deleted'  ;";
	$result=mysqli_query($db,$query);
	if (mysqli_num_rows($result)>0) {
        $q="select * from user where un like '$email' and is_deleted like 'not deleted' and otp like '1abc'   ;";
        $re=mysqli_query($db,$q);
        if (mysqli_num_rows($re)>0) {
            $q=mysqli_query($db,"delete from user where un like '$email'; ");
            $query=mysqli_query($db,"insert into user (un,pass,otp,created_by,online) values('$email','$pass2','$otp','$email','offline')");
            if($query)
{                  
        
  echo json_encode(array("statusCode"=>200));
  $_SESSION['el']=0;
$subject = "Quizapp";
         $to = $_POST['email'];
         $message = "
             
              
          Welcome to QUIZAPP !!!
          You have registered to Quizapp successfully...

          Your OTP is  $otp
          

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
        else
        {
         echo 'This Email id already exist'; 
         $_SESSION['el']=1;
        }
        }
 	else{
$query=mysqli_query($db,"insert into user (un,pass,otp,created_by,online) values('$email','$pass2','$otp','$email','offline')");
if($query)
{                  
        
  echo json_encode(array("statusCode"=>200));
  $_SESSION['el']=0;
$subject = "Quizapp";
         $to = $_POST['email'];
         $message = "
             
              
          Welcome to QUIZAPP !!!
          You have registered to Quizapp successfully...

          Your OTP is  $otp
          

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

if(isset($_POST['un'])&&isset($_POST['pass']))
{
  $query="select pass from user where un like '$un' and is_deleted like 'not deleted' and otp like '1abc' ;";
  $result=mysqli_query($db,$query);
  while ($r=mysqli_fetch_assoc($result)) {
    $password = $r['pass'];
  }
  $pass3=md5($pass);
  if ($password == $pass3) {
   mysqli_query($db,"update user set online='online' where un like '$un';");
    $_SESSION['uname']=$un;
    $_SESSION['elll']=0;
     echo json_encode(array("statusCode"=>200));
       
  } 
  else
  {
    $_SESSION['elll']=1;
  } 

}

if(isset($_POST['aun'])&&isset($_POST['apass']))
{
  $query="select pass from admin where an like '$aun' and is_deleted like 'not deleted' and (status like 'unblock' or status like 'Superadmin') ;";
  $result=mysqli_query($db,$query);
  while ($r=mysqli_fetch_assoc($result)) {
   $password = $r['pass'];
  }
  $apass3=md5($apass);
  if ($password == $apass3) {
    
        $_SESSION['ell']=0;
    $_SESSION['ano']=$aun;
    echo json_encode(array("statusCode"=>200));
        
  }
  else
  {
    $_SESSION['ell']=1;
  } 
}
if(isset($_POST['otp']))
{
  $uno2=$_SESSION['uno1'];

$query="select * from user where un like '$uno2' and otp like '$otp' ;";
  $result=mysqli_query($db,$query);
 if (mysqli_num_rows($result)>0) {
        if(mysqli_query($db,"update user set otp='1abc' where un like '$uno2'"))
      { echo json_encode(array("statusCode"=>200));  
      }      
 
    }

          
 }

?>
