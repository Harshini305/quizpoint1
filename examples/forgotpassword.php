<?php
session_start();
include 'db.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if($_SESSION['el']==1)
 {

         echo '<script>alert("This Email id already exist");</script>';
        echo '<script>window.location= "frontpage.php"</script>';
 
        }
?>
<html>
	<head>
		
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Quiz point</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  

	</head>
<style>
body{
	font-family: 'IBM Plex Sans', sans-serif;
	background-image: url(bg.jpg);
	background-size: 100% 100%;
	color: #fff;
}
#form2{
	display: none;
}

#sign-in-tab:checked ~ #form2 {
	display: block;
}
#sign-in-tab:checked ~ #form1{
	display: none;
}
#sign-in-tab:checked ~ #form3{
	display: none;
}

#sign-up-tab:checked ~ #form1{
	display: block;
}
#sign-up-tab:checked ~ #form2{
	display: none;
}
#sign-up-tab:checked ~ #form3{
	display: none;
}

#admin-in-tab:checked ~ #form3{
	display: block;
}
#admin-in-tab:checked ~ #form1{
	display: none;
}
#admin-in-tab:checked ~ #form2{
	display: none;
}

.tab:not(:checked) + label{
	opacity: 0.8;
}
.login-form{
	position: absolute;
	top: 30%;
	left: 7%;
	right: 10%;
	width: 400px;
}
.tab{
	display: none;
}
.tab-header{
	width: 20%;
	text-align: center;
	display: inline-block;
	font-size: 18px;
	cursor: pointer;
	
}
.tab-header:after{
	display: block;
	content: '';
	height: 20px;
	border-bottom: 2px solid rgb(173,56,120);
	transform: scaleX(0);
	transition: transform 250ms ease-in-out;
}
.tab:checked + label:after{
	transform: scaleX(1);
}
.header{
	margin: 10px 0 10px 0;
	font-size: 20px;
	text-align: center;
	color: rgba(255,255,255,0.8);
}
.form-input input{
	border-radius: 10px;
	height: 35px;
	margin: 10px 0;
	width: 100%;
	border-width: 0;
	background-color: rgba(255,255,255,0.2);
	padding: 10px;
	color: #fff;
}
input::placeholder, #check{
	color: rgba(255,255,255,0.8);
}
input:focus{
	outline: none;
}
.submit-button{
	margin: 20px 0;
	width: 100%;
	height: 35px;
	border-radius: 10px;
	border-width: 0;
	text-align: center;
	background-color: rgb(173,56,120);
	color: #fff;
}
</style>	
	<body onload="gen_cap()">
		<div style="padding-left:200px;padding-top:75px;font-family: 'Lobster', cursive;color:white;"><h1>QUIZ POINT</h1></div>
		<div class="login-form">
			<input type="radio" name="tab" class="tab" id="sign-up-tab" checked>
			
			<label for="sign-up-tab"  class="tab-header" >EMAIL-ID</label>
							<div class="form-input">
					<input type="email" class="input" id="email" name="email" placeholder="ENTER EMAIL-ID " autocomplete="off" required/>
					<label id="emcheck" > </label>
				</div>
           <input type="submit" id="submit" name="submit" onclick="fpu()" class="submit-button" value="SEND">				
		

			</div>



			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$('#email').keyup(function(){
	 
                emchk();
                     
        });
		function emchk(){
        var email = $('#email').val();
          
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
            
            if(email.length == ''){
              $('#emcheck').show();
              $('#emcheck').html("**please fill your email id");
              $('#emcheck').focus();
              $('#emcheck').css("color","red");
              valid = false;
              
              
              
              
            }
            else if(!regex.test(email)){
              $('#emcheck').show();
              $('#emcheck').html("**invalid email id");
              $('#emcheck').focus();
              $('#emcheck').css("color","red");
             valid = false;
             
            }
            
                      
            else{
            $('#emcheck').hide();
            valid= true;
           }
                         
               console.log(valid);          
            return valid;                
          }


		  function fpu()
{
    var uemail=$('#email').val();
     
   
   $.ajax({
      url:"fpassajax.php",
      type:'post',
      data: { 
          uemail : uemail,
         

       },
         success:function(da){
         
            alert("Check your Mail for the conformation  link...");
      
    }      
       

   });
}



</script>			 




			

	
	
	
	
	
	
	
	</body>
</html>