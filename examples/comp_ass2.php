<?php
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$k=$_SESSION['k'];


include 'db.php';
include 'udb.php';



$un=$_SESSION['uname'];
$t_ins=$_SESSION['t_ins'];
$dept=$_SESSION['dept'];
$class=$_SESSION['yr'];
$ins=$_SESSION['ins'];
$query="select * from user where un like '$un'";
  $y=mysqli_query($db,$query);
while( $r = mysqli_fetch_assoc($y))
 {
  $n=$r['un'];
  $m=$r['fn']." ".$r['ln'];
  $s=$r['pic'];
  $gen=$r['gender'];
}
    
?>


<html>
<head>
  <style type="text/css">
 .button1 {border-radius: 12px;}

  button {
  background-color: #5e72e4;
  color: white;
  border-radius:12px;
  padding: 14px 14px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.7;
}



/* Set a style for all buttons */
button {
  background-color: #9966ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  width: 100%;
  height: 160%;
  position: absolute;
  top: 0;
   /* Enable scroll if needed */
  display: flex;
  
  background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
  text-align:right;
  padding-left:20px;
  padding-right:200px;
  padding-top: 0px;
  padding-bottom: 30px;
  display: hidden;
}

/* Modal Content/Box */
.modal-content {
   width: 150%;
  height: 50%;
  overflow: auto;
 background-color: white;
 border radius: 4px;
 text-align: center;
 padding: 20px;
 position: relative;
}

/* The Close Button (x) */
.close {
  position: absolute;
  text-align: right;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}
.wrapper {
    text-align: center;
}

.button {
    position: absolute;
    top: 50%;
}
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#FFFFFF ;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 100px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #6A5ACD;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 100px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
body  {
  background-color: #fff;
 
}
img {
  border-radius: 50%;
}


input[type=text],input[type=date],input[type=time],input[type=number]{
 border:none;
}
</style>


  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Quiz</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">

</head>


<body  onunload="ajaxFunction()">
  <!-- Sidenav -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background-color:black">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          
      <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
              <a class="nav-link active" href="dashboard2.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a><br>
        <a class="nav-link" href="profile_user.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a><br>
        <a class="nav-link" href="tables2.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">scheduled  assessments</span>
              </a><br>
        <a class="nav-link" href="comp_ass2.php">
               <i class="ni ni-collection"  style="color:green;"></i>
                     
                <span class="nav-link-text">Completed assessments</span>
              </a><br>
        <a class="nav-link" href="ranks.php">
           
                    <i class="ni ni-chart-bar-32" style="color:red;"></i>
                    
                      <span  class="nav-link-text" > Ranking</span>
                 
              </a>
</div>
<span style="font-size:30px;color: #FFFFFF;cursor:pointer" onclick="openNav()" >&#9776; </span>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              
            </li>
           
       <div class="main-content" id="panel">
    <!-- Topnav -->
    
      
            
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
             <li>
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><i class="ni ni-single-02"></i>
                  <span>My profile</span></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
               <a href="#!" class="dropdown-item">
                  <div class="media align-items-center">
                   <?php
                    if($gen=='male')
                    {
                      echo
                    '<span class="avatar avatar-sm rounded-circle">
                  

                    <img alt="Image placeholder" src="images/male.png">
                  </span>';
                }
                elseif($gen=='female')
                {
                  echo '<span class="avatar avatar-sm rounded-circle">
                  

                    <img alt="Image placeholder" src="images/female.png">
                  </span>';

                }
                else
                {
                   echo '<span class="avatar avatar-sm rounded-circle">
                  

                    <img alt="Image placeholder" src="images/'.$s.'>
                  </span>';

                }
                ?>
                 
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $m; ?></span>
                  </div>
                </div>
            
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-badge"></i>
                  <span><?php echo $n; ?></span>
                </a>
                <a href="change_pass.php" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Change password</span>
                </a>
                 <a href="#!" class="dropdown-item">
                   <span class="badge badge-dot mr-4">
                        <i class="bg-success"  style=""></i>
                        <span class="status">&nbsp &nbsp status</span>
                      </span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout1.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
                 </div>
              </div>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "750px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6" style="background-image:url(images/bimage.jpeg);background-size: cover";>
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">User</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Completed ass</a></li>
                  
                </ol>
              </nav>
            </div>
            
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->

                    <div class="container-fluid mt--6">
   <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h2 class="mb-0">Assessments Completed</h2><br>
             <div class="row">
            <div class="col-4">
       
              <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0" >
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" id="search" onkeyup="showUser(this.value)" type="text">
              </div>
            </div>
      
          </form>
     </div> 

            

             
</div>	   



            

</div>
<div class="col-12" style="padding-top:20px;">
  <div id="txtHint"><b></b></div> 
</div>  
            <div class="table-responsive" id="recorddisplay">
              
                    
                    <?php
                    $i=1;
                  
                    if(isset($_GET['page']))
                     {
                       $page=$_GET['page'];
                       //echo $page;
                     //echo "<script> console.log(".$page.");</script>";
                       $_SESSION["pg"] = $page;
                       //echo "<script>console.log(".$_SESSION['page'].")</script>";
                       
                      ?>
                      

<?php
                     }
?>

  </form>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
      </div>
    </div>

  </div>
               
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#search').keyup(function(){
      var search = $('#search').val();
    if(search.length != ''){
    $("#tab").hide();      
	 $("#nnav").hide();
    }    
    else
    {
     readrecords();
    }

        });
    
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","compass2.php?q="+str,true);
  xmlhttp.send();

  
}
</script>
  <script type="text/javascript">
$(document).ready(function(){
  readrecords();
});
     function readrecords(){

$.ajax({
url:"compass2.php",
type:'post',


success:function(response){
$('#recorddisplay').html(response);
}
});
}


 

  $(document).on('click','.update',function(e) {
      
   var sts = $(this).attr("data-sts");
   var stt= $(this).attr("data-stt");
   var mark =$(this).attr("data-mark");
  var tot =$(this).attr("data-tot");
  console.log(sts);
  console.log(stt);
  console.log(mark);
  console.log(tot);

   
     $('#dateexam').val(sts);
     $('#timeexam').val(stt);
     $('#marks').val(mark);
      $('#tot').val(tot);

     
    
  });

              

   </script>
   
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  
  
</body>
<script src="on.js"></script>
</html>