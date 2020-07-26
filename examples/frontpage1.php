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
		<div style="padding-left:200px;padding-top:75px;font-family: 'Lobster', cursive;"><h1>QUIZ POINT</h1></div>
		<div class="login-form">
			<input type="radio" name="tab" class="tab" id="sign-up-tab" checked>
			<label for="sign-up-tab" class="tab-header">SIGN UP</label>
						
			<form id="form4" action="frontpage.php">
				<div class="header">ENTER OTP</div>
				
				<div class="form-input">
					<input type="text" class="input" id="otp" placeholder="OTP"  >

					</div>
					  <label id="captcha"></label>                   
					 <div class="form-input"> 
					  <input type="text" class="input" id="txt" placeholder="Answer" >
                      </div>
				
					<input type="submit" id="click" onclick="check_cap()" autocomplete="off" class="submit-button" value="VERIFY">
			
			</form>

			</div>
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

</script>			 




			 <script type="text/javascript">
function gen_cap()
{
	
    data1 = Math.round (10 * Math.random() );
	
	data2 = Math.round (10 * Math.random() );
	
	str = `Enter  ${data1} + ${data2}`
	document.querySelector("#captcha").innerHTML= str;
	sum = data1+data2;
	
}
function check_cap(){
	rec = document.querySelector("#txt").value;
	if(rec == sum){
		alert("captcha valid")
		  var otp = $('#otp').val();
   $.ajax({
      url:"login2.php",
      type:'post',
      data: { 
          otp : otp
          },
      })

       .done (function(da) {
     var response = JSON.parse(da);
    console.log(response.statusCode); 
    if (response.statusCode=='200') {
                alert("Please sign in");
                
            }
   
})
.fail (function(jqXHR, textStatus, errorThrown) { 
    alert("Error"); 
})
.always (function(jqXHROrData, textStatus, jqXHROrErrorThrown) { 
     
     console.log(2);
});
     console.log(6);
     alert("New user created"); 

}
	
	else
	{
		alert("captcha invalid")
	}
}
  
  
  
  
  



</script>
			 

	
	
	
	
	
	
	
	</body>
</html>