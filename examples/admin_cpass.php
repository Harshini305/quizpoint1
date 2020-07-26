<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
include 'db.php';
include 'adb.php';


?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<script type="text/javascript" language="javascript" src="javascripts/jquery.js"></script>
<script type="text/javascript" language="javascript" ></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>quiz app</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">

  <style>
           



            .demoInputBox {
                padding: 7px;
                border: #F0F0F0 1px solid;
                border-radius: 4px;
            }

            #password-strength-status {
              
                color: #FFFFFF;
               
            }

            .medium-password {
                background-color: #b7d60a;
              
            }

            .weak-password {
                background-color: #ff4d4d;
               
            }

            .strong-password {
                background-color: #12CC1A;

              
            }
        </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body class="bg-default">
  <!-- Navbar -->

  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">
        
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
               
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Change password!</h1>
             
            </div>
          </div>
          
        </div>
        
      </div>
      
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
            
            <div class="card-body px-lg-5 py-lg-5">
                <form   id="registration_form" method="post" >
                
             
                <div class="form-group mb-3" name="frmCheckPassword" id="frmCheckPassword">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="old password" type="password" id="old_pass" name="old_pass" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder=" new-Password" type="password"  id="password"  class="demoInputBox" onKeyUp="checkPasswordStrength();"  name="password"  autocomplete="off" required> 
                     <span class="error_form" id="password_error_message"></span>
                 
                    </div>
                       <p id="password-strength-status"></p>
                          <input type="checkbox" onclick="myFunction1()">Show Password
                  </div>
               

                  
                   <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    
                    <input class="form-control" placeholder=" Re-typePassword" type="password"   autocomplete="off"  id="retypepassword"  name="form_retype_password" required />
                  </div>
                 
                      <input type="checkbox" onclick="myFunction()">Show Password<br>
                         <span class="error_form" id="retype_password_error_message"></span>
                  </div>
                

                
                <div class="text-center">
                  <input  type="submit" name="submit"  class="btn btn-primary my-4" ></input>
               
                
                 
              </div>
</form>
             <form action="dashboard.php">
              <button  type="submit"   class="btn btn-primary my-4">Back</button>
             </form>
           
            </div>

          </div>
    
        </div>
      </div>
    </div>
  </div>
  
  
  <?php
  
  if(isset($_POST['submit']))
 {
     
    $retypepassword=$_POST['form_retype_password'];
    $old_pass=$_POST['old_pass'];
	$a=md5($retypepassword);
	$b=md5($old_pass);

  $query="select * from admin where  pass like '$b' and an ='$an' ";
	$result=mysqli_query($db,$query);
	if (mysqli_num_rows($result)>0) 
	{   
		
 		$qu="UPDATE  admin SET pass='$a' where pass like '$b'  and an='$an' ";
	   
	    if( mysqli_query($db,$qu))
	    {
         echo '<script>alert("Password Changed Successfully");</script>';
        echo '<script>window.location= "dashboard.php"</script>';
       }



 	} 
 	else
 	{
 		  echo '<script>alert("Old password is Mismatched");</script>';
        
         
 	}
 
 	
        
        
  }
  
  ?>
  </script>
  <script>
        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 8 characters.)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong password");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
        }

</script>
<script>

$(function() {

  

  $("#retype_password_error_message").hide();
  

  
  var error_password = false;
  var error_retype_password = false;

  $("#retypepassword").focusout(function() {

    check_retype_password();
    
  });

  });




  function check_retype_password() {
  
    var password = $("#password").val();
    var retype_password = $("#retypepassword").val();
    //console.log(retype_password);
     // console.log(password);
    
    if(password !=  retype_password) {
      $("#retype_password_error_message").html(" *Passwords don't match");
      $("#retype_password_error_message").css("color","red");
      $("#retype_password_error_message").show();
      error_retype_password = true;
    } else {
      $("#retype_password_error_message").hide();
    }
    //return false;
  }


  
  $("#registration_form").submit(function() {
    
    error_password = false;
    error_retype_password = false;
  
                      
    
    
    check_retype_password();
  
    
    if(  error_password == false && error_retype_password == false ) {
      return true;
    } else {
      return false; 
    }

  });
</script>
<script>

function myFunction() {
  var x = document.getElementById("retypepassword");

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

 function myFunction1() {

  var y = document.getElementById("password");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
       
    </script>
  <!-- Footer -->
 
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>