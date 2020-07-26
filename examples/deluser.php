<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 if($_SESSION['ano']=='')
 {

         echo '<script>alert("Please sign up");</script>';
        echo '<script>window.location= "frontpage.php"</script>';
 
        }
include 'db.php';
$an=$_SESSION['ano'];
$k=$_SESSION['k'];
include 'adb.php';
$output1 = preg_split("/( |,|\n)/", $user );
        $user1 = array();
        for ($x = 0; $x < sizeof($output1); $x++) {
            array_push($user1,$output1[$x]) ;
          }
?>

<!DOCTYPE html>
<html>

<head>
<style type="text/css">
  button {
  background-color:#5e72e4;
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
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #FFFFFF;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}


.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 17px;
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
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Quiz Point</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark  border-bottom" style="background-color:black">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          
      <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
  
  <a class="nav-link active" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a><br>
              <a class="nav-link " href="view_admin.php?page=1">
                <i class="ni ni-single-02 text-red"></i>
                <span class="nav-link-text">View Admin</span>
              </a><br>
              <a class="nav-link" href="user.php?page=1">
                <i class="ni ni-circle-08 text-primary"></i>
                <span class="nav-link-text">View user</span>
              </a><br>
              <a class="nav-link " href="sche_ass.php?page=1">
                <i class="ni ni-single-copy-04 text-green"></i>
                <span class="nav-link-text">View Scheduled Assessments</span>
              </a><br>
              <a class="nav-link" href="comp_ass.php?page=1">
                <i class="ni ni-book-bookmark "></i>
                <span class="nav-link-text">View Completed Assessments</span>
              </a> <br>
         <?php
              if($stss=='Superadmin')
              {
                echo'
         <a class="dropdown-btn">
          <i class="fa fa-trash-o" style="font-size:25px"></i>
                    <span class="nav-link-text">DELETED</span>
          
          </a>
          
          
          <div class="dropdown-container">
          <a class="nav-link" href="deluser.php?page=1">
                    <i class="ni ni-basket"></i>
                     <span class="nav-link-text">User</span>
                       </a>
           <a class="nav-link" href="del_admin.php?page=1">
                    <i class="ni ni-basket"></i>
                     <span class="nav-link-text">Admin</span>
                       </a>
                      
                               
          
          </div>
                </a>';
              }
                ?>
</div>
<span style="font-size:30px;color: #FFFFFF;cursor:pointer" onclick="openNav()" >&#9776; </span>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              
                
            </li>
           
            
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
                <a href="profile.php" class="dropdown-item">
                  <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <?php
                      if($s == '')
                      {
                          echo '<img alt="Image placeholder" src="../examples/images/male.png">';
                      }
                      else{
                          echo '<img alt="Image placeholder" src="../examples/images/<?php echo $s; ?>">';
                      }
                      ?>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $b; ?></span>
                  </div>
                </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-badge"></i>
                  <span><?php echo $a; ?></span>
                </a>
                <a href="admin_cpass.php" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Change Password</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <span class="badge badge-dot mr-4">
                       <i class="bg-success"  style=""></i>
                       <span class="status">&nbsp &nbsp status</span>
                     </span>
               </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
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
}/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}


</script>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6" style="background-image:url(images/bimage.jpeg);background-size: cover";>
      <div class="container-fluid">
        <div class="header-body">
         <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">
             Super Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Deleted Users</a></li>
                  
                </ol>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--4">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
          <div class="card-header border-0">
              <h2 class="mb-0">Admin</h2>
              <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="search" placeholder="Search" onkeyup="showUser(this.value)" type="text">
              </div>
            </div>
          </form>
                <div id="txtHint"><b></b></div>  
            </div>
            <div class="card-body">
              <div class="row icon-examples" >

<h4 id="del" class="text-danger" style="padding-left:45%"></h4>

                    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




         
                    </div>
                    
                    <div class="table-responsive" id="recorddisplay">
              
              
                    <?php
                    $i=1;
                    if(isset($_GET['page']))
                     {
                       $page=$_GET['page'];
                       
                      $_SESSION["pg"] = $page;
                     ?>

<div id="recorddisplay">

</div>

<?php
                     }
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#search').keyup(function(){
      var search = $('#search').val();
      if(search.length == ''){
    readrecords();
    }    
    else
    {
      $("#table").hide(); 
      $("#nnnav").hide(); 
      
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
  xmlhttp.open("GET","deluserajax.php?q="+str,true);
  xmlhttp.send();

  
}
</script>



<script type="text/javascript">

$(document).ready(function(){
    readrecords();
});






     function readrecords(){

$.ajax({
url:"deluserajax.php",
type:'post',


success:function(response){
$('#recorddisplay').html(response);
}
});
}




</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

function restore(restoreid){
        var conf = confirm("Are You Sure.You want to Restore the user.");
        console.log(restoreid);
        if(conf==true){
          $.ajax({
            url:"deluserajax.php",
            type:"post",
            data:{ restoreid:restoreid },
            success:function(data,status){

              $("h4").text(" Restored Successfully");
              setTimeout(function(){  

  
$('#del').fadeOut("Slow");  


}, 3000);
              readrecords();

            }

          });
        }
      }


</script>





            </div>

                
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>