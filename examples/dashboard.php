<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if($_SESSION['ell']==1)
 {

         echo '<script>alert("Incorect un and pass");</script>';
        echo '<script>window.location= "frontpage.php"</script>';
 
        }
        
        
$_SESSION['j']=1;

$_SESSION['k']=1;
include 'adb.php';
 $_SESSION['stss']=$stss;

?>



<!DOCTYPE html>
<html>

<head>
  <style>
img {
  border-radius: 50%;
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
<link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">

</head>

<body onunload="ajaxFunction()">
 

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
<script type="text/javascript"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "750px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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
      <div class="container-fluid" >
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7" >
              <h6 class="h2 text-white d-inline-block mb-0"><?php
              if($stss=='Superadmin')
                echo 'Super Admin';
              else
                echo'Admin';
              ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard
                  </a></li>
                  
                </ol>
              </nav>
            </div>
            
          </div>
         
                   
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users registered</h5>
                      <span class="h2 font-weight-bold mb-0"><?php 
                     $cnt = mysqli_num_rows(mysqli_query($db,"SELECT * FROM user"));
                     echo $cnt;
                      ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                 </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users online</h5>
                      <span class="h2 font-weight-bold mb-0"><?php 
                     $cnt = mysqli_num_rows(mysqli_query($db,"SELECT * FROM user where online='online'"));
                     echo $cnt;
                      ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Challenges posted</h5>
                      <span class="h2 font-weight-bold mb-0"><?php 
                     $cnt = mysqli_num_rows(mysqli_query($db,"SELECT * FROM post_ans"));
                     echo $cnt;
                      ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Challenges solved</h5>
                      <span class="h2 font-weight-bold mb-0"><?php 
                     date_default_timezone_set('Asia/Kolkata');
                     $today = date("Y-m-d"); 
                     $ttt=date('h:i:s');
                     $cnt = mysqli_num_rows(mysqli_query($db,"SELECT * FROM post_ans where e_date <='$today';"));
                     if($r['e_date']==$today and $ttt > $r['e_time'])
                     echo $cnt;
                     else if($r['e_date']<$today )
                     echo $cnt;
                      ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form action="t_quiz.php" method="post" enctype="multipart/form-data">
          <center>
           
        </center>
      </form>
         </div>
      </div>
    </div>
    </div>
    <!-- Page content -->
    <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <center>
                  <button type="button" class="btn btn-default">
  <span>    Top 3 Rankers   </span>
 
</button>
                  </center>
                </div>
                
              </div>
            </div>
            <div class="col-xl-12 ">
    <div class="row" style="padding-left:100px">
    
  <?php
    $i=1;
    $query="select sum(marks_scored)/count(ass_no) as m,fn,ln,pic,gender,sum(tot_m)/count(ass_no) as mm from result inner join user on result.un=user.un group by result.un order by m desc limit 0 , 3";
    $y=mysqli_query($db,$query);
   while( $r = mysqli_fetch_assoc($y))
     {  
        $un=$r['fn'].$r['ln'];
        $p=$r['pic'];
        $g=$r['gender'];
        $mark=$r['m'];
        $t_mark=$r['mm'];
        if($t_mark!= 0){
		$per=($mark/$t_mark)*100;
		}
		else
		{
			$per=0;
		}
  if($p==NULL and $g=='male' )
  {
    echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <div class="col-sm-2 py-2" >
  <div class="card">
    <div class="row justify-content-center">
     <img src="images/avatar1.jpg "   class="rounded-circle" style="width:50%">
    </div>
  
    <br>';

  }
  elseif($p==NULL and $g=='female' )
  {
    echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <div class="col-sm-2 py-2">
  <div class="card">
    <div class="row justify-content-center">
     <img src="images/avatar2.jpg "   class="rounded-circle" style="width:50%">
    </div>
   
    <br>';
  }
  else{
    echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <div class="col-sm-2 py-2" >
  <div class="card" >
    <div class="row justify-content-center">
     <img src="images/'.$p.' "   class="rounded-circle" style="width:50%">
    </div>
    
    <br>';
  }
    echo'
    <center>
    <h4><i class="ni ni-single-02 text-dark"></i>  '.$un.'</h4>
    <p class="title">Score - '.$mark.'</p>
    <p>Rank - '.$i++.'  <i class="fas fa-arrow-up text-success mr-3"></i></p>
    <h4><u>Percentage</u></h4>
    <span class="mr-2"> '.floor($per).'%</span>
    <div class="progress">
          <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:  '.floor($per).'%;"></div>
    </div>
    </div>
    </div>             
  ';

  }
  ?>
  </div>
</div>
<br><br><br>

      <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-3 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                  <?php 

                      include 'db.php';
                     
                      $sql = "SELECT * FROM admin WHERE status = 'superadmin'";
                      $sth = mysqli_query($db,$sql);
                      $r=mysqli_fetch_array($sth);
                      $p=$r['pic'];
                      $ano=$r['an'];
                      $an=$r['name'];
                      $ins=$r['ins'];
                      $desig=$r['desig'];
                      $quali=$r['quali'];
                      $email=$r['email'];
                      $phno=$r['phno'];
                      if($p == '')
                      {
                          echo'<img src="images/male.png " alt="image" class="rounded-circle">';
                      }
                      else{
                          
                              echo'<img src="images/'.$p.' " alt="image" class="rounded-circle">';
                      }
                  ?>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
              
              <h2 class="badge badge-default">SuperAdmin Details</h2>
                <h5 class="h3">
                <?php echo $an; ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>India
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $desig. "-" .$ins; ?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $quali; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-9 order-xl-1">
        <div class="card" style="padding-bottom:80px">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Scored</h6>
                  <h5 class="h3 mb-0">Total Batches</h5>
                </div>
              </div>
            </div>
            <div class="card-body" style="height:300px">
            <div class="row" style="padding-left:50px">
             <div class="card-body" style="position: absolute;left:100px;top:100px;">
            <div class="row" >
            
                <div class="col-sm-3 py-2" >
                <div class="card">
                  <div class="row justify-content-center">
                   <img src="images/Bronze.jpeg "   class="rounded-circle" style="width:80%">
                  </div>
                   <?php
             $as="SELECT count(batch) as m,batch,un FROM result where  batch='Bronze' ";
            $cnt = mysqli_query($db,$as); 
            $r=mysqli_fetch_assoc($cnt);
            
              $bat=$r['m'];
                

            ?>
             <center>
    <h2><i class="ni ni-trophy text-yellow"></i>Bronze</h2>
    
    <h1>
    <span class="mb-0 text-sm  font-weight-bold"><?php echo $bat;?></span>
    </h1>
              </div>
            </div>
                 
                <div class="col-sm-3 py-2" >
                <div class="card">
                  <div class="row justify-content-center">
                   <img src="images/Gold.jpeg "   class="rounded-circle" style="width:100%">
                  </div>
              <?php
             $as="SELECT count(batch) as m,batch,un FROM result where  batch='Gold' ";
            $cnt = mysqli_query($db,$as); 
             $r=mysqli_fetch_assoc($cnt);
            
              $bat=$r['m'];
                

            ?>
             <center>
    <h2><i class="ni ni-trophy text-yellow"></i>Gold</h2>
    
    <h1>
    <span class="mb-0 text-sm  font-weight-bold"><?php echo $bat;?></span>
    </h1>
                  </div>  
                  </div>             
                <div class="col-sm-3 py-2" >
                <div class="card" >
                  <div class="row justify-content-center">
                   <img src="images/Silver.jpeg" class="rounded-circle" style="width:80%">
                  </div>
              <?php
             $as="SELECT count(batch) as m,batch,un FROM result where batch='Silver' ";
            $cnt = mysqli_query($db,$as); 
            $r=mysqli_fetch_assoc($cnt);
            
              $bat=$r['m'];
              
             
                  

            ?>
             <center>
    <h2><i class="ni ni-trophy text-yellow"></i>Silver</h2>
    
    <h1>
    <span class="mb-0 text-sm  font-weight-bold"><?php echo $bat;?></span>
    </h1>
                </div>
              </div>
   
    
 
            </div>
          </div>
        </div>
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
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
 <script src="on.js"></script>
</body>

</html>