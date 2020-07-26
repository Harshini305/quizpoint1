<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'db.php';
if($_SESSION['el1']==2)
 {

         echo '<script>alert("Otp is found to be wrong...New otp is sent to ur email again");</script>';
        echo '<script>window.location= "frontpage1.php"</script>';
 
       }
      else{

        }
?><html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
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
	
	<body>
		<div style="padding-left:200px;padding-top:75px;font-family: 'Lobster', cursive;"><h1>QUIZ POINT</h1></div>
		<div class="login-form">
			<input type="radio" name="tab" class="tab" id="sign-up-tab" checked>
			<label for="sign-up-tab" class="tab-header">SIGN UP</label>
			<input type="radio" name="tab" class="tab" id="sign-in-tab">
			<label for="sign-in-tab" class="tab-header">SIGN IN</label>	
          	<input type="radio" name="tab" class="tab" id="admin-in-tab">
			<label for="admin-in-tab" class="tab-header">ADMIN</label>				
			<form id="form1" action="frontpage1.php" method="post">
				
				<div class="header">JOIN WITH US</div>
				
				<div class="form-input">
					<input type="email" class="input" id="email" name="email" placeholder="Email Address" autocomplete="off" required/>
					<label id="emcheck" > </label>
				</div>
				
				<input type="submit" id="sign-up" onclick="adduser()" class="submit-button" value="SIGN UP">
			
			</form>
			<form id="form2" action="dashboard2.php">
				
				<div class="header">Welcome Back</div>
				<div class="form-input">
					<input type="text" class="input" id="un" placeholder="User Name" autocomplete="off" required/>
					<label id="emcheck1"> </label>
				</div>
				<div class="form-input">
					<input type="password" class="input" id="pass" placeholder="Password"  autocomplete="off" required/>
				</div>
				<div>
				<input type="checkbox" id="chk">show password 
				<a style="padding-left:140px;color:white;hover-color:red"; href="forgotpassword.php">forgot password</a>
				</div>
				<input type="submit" id="sign-in" onclick="signin()" class="submit-button" value="SIGN IN">
			 
			</form>
				    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$("#chk").click(function(){
	     if($(this).prop('checked'))
		 {
		  $("#pass").attr("type","text");
		 }
		 else
		 {
		    $("#pass").attr("type","password");
		 }
	
	});
	</script>
				
				
				
			<form id="form3" action="dashboard.php">
			   <div class="form-input">
					<input type="text" class="input" id="aun" placeholder="User Name" autocomplete="off" required/>
				</div>
				<label id="emcheck2"> </label>
				<div class="form-input">
					<input type="password" class="input" id="apass" placeholder="Password" autocomplete="off" required/>
				</div>
			    <input type="checkbox" id="chkk">show password
				<a style="padding-left:140px;color:white;hover-color:red"; href="adminforgotpassword.php">forgot password</a>
				<input type="submit" id="signin" onclick="asignin()" class="submit-button" value="SIGN IN">
				
				
			</form>
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			 <script>
	$("#chk").click(function(){
	     if($(this).prop('checked'))
		 {
		  $("#pass").attr("type","text");
		 }
		 else
		 {
		    $("#pass").attr("type","password");
		 }
	
	});
	</script>
	<script>
	$("#chkk").click(function(){
	     if($(this).prop('checked'))
		 {
		  $("#apass").attr("type","text");
		 }
		 else
		 {
		    $("#apass").attr("type","password");
		 }
	
	});
	</script>
			</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$('#un').keyup(function(){
	                emchk1();
                
                      
        });
$('#aun').keyup(function(){
	   
                emchk2();
                   
        });
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
          function emchk1(){
         var email = $('#un').val();

          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
            
            if(email.length == ''){
              $('#emcheck1').show();
              $('#emcheck1').html("**please fill your emailid");
              $('#emcheck1').focus();
              $('#emcheck1').css("color","red");
              valid1 = false;
              
              
              
              
            }
            else if(!regex.test(email)){
              $('#emcheck1').show();
              $('#emcheck1').html("**invalid emailid");
              $('#emcheck1').focus();
              $('#emcheck1').css("color","red");
             valid1 = false;
             
            }
            
            
            
            
            else{
            $('#emcheck1').hide();
            valid1= true;
           }
             console.log(valid1);          
                        
            return valid1;                
          }
          function emchk2(){
          var email = $('#aun').val();

          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
            
            if(email.length == ''){
              $('#emcheck2').show();
              $('#emcheck2').html("**please fill your emailid");
              $('#emcheck2').focus();
              $('#emcheck2').css("color","red");
              valid2 = false;
              
              
              
              
            }
            else if(!regex.test(email)){
              $('#emcheck2').show();
              $('#emcheck2').html("**invalid emailid");
              $('#emcheck2').focus();
              $('#emcheck2').css("color","red");
             valid2 = false;
             
            }
            
            
            
            
            else{
            $('#emcheck2').hide();
            valid2= true;
           }
                         
                    console.log(valid2);     
            return valid2;                
          }
function adduser(){
   var email = $('#email').val();
   var valid;
   valid=emchk();
   if(valid)
   {
   $.ajax({
      url:"login.php",
      type:'post',
      data: { 
          email : email
          },

         
       success:function(da){
         var response = JSON.parse(da);
    console.log(response.statusCode); 
    if (response.statusCode=='200') {
                alert("Check your mail for otp");
       }
    }
   });
 }
     console.log(valid);
     alert("Data inserted"); 

}

function signin(){
   var un = $('#un').val();
   var pass = $('#pass').val();
    var valid1;
   valid1=emchk1();
   console.log(valid1);
   if(valid1)
   {
   $.ajax({
      url:"login.php",
      type:'post',
      data: { 
          un : un,
          pass : pass
          },

     
       success:function(da){
         var response = JSON.parse(da);
    console.log(response.statusCode); 
    if (response.statusCode=='200') {
                alert("Welcome");
       }
    }
   });
 }
     console.log(valid1);
     alert("User"); 

}
function asignin(){
   var aun = $('#aun').val();
   var apass = $('#apass').val();
    var valid2;
   valid2=emchk2();
    console.log(valid2);
   if(valid2)
   {
   	$.ajax({
      url:"login.php",
      type:'post',
      data: { 
          aun : aun,
          apass : apass,
          },

       success:function(da){
         var response = JSON.parse(da);
    console.log(response.statusCode); 
    if (response.statusCode=='200') {
                alert("Welcome");
       }
    }
   });
 }

   
     console.log(aun);
     console.log(apass);
     alert("Admin"); 

}



</script>

	</body>
</html>