<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'db.php';
$an=$_SESSION['ano'];
$ass=$_SESSION['ass_no']-1;
$query="select * from admin where an like '$an'";
  $y=mysqli_query($db,$query);
 while( $r = mysqli_fetch_assoc($y))
 {$a=$r['an'];
  $b=$r['name'];
 }
  
  $no=$_SESSION['no'];
  if(isset($_POST['submit']))
  {
      $i=$_SESSION['i'];
      $qn=$_POST['qn'];
      $su=$_POST['le'];
     
     
    $sql="INSERT INTO `qn`  VALUES ( '$ass', '$i', '$qn', '$su');";
    if ($db->query($sql) === TRUE) {
      $i=$_SESSION['i']+1;
      $_SESSION['i']=$i;
      if($i>$no)
    {   echo "<script type= 'text/javascript'>alert('Registered successfully')</script>";
     echo '<script>window.location="sche_ass.php"</script>';
   }
 }
   
  }
  else
  {
    $i=$_SESSION['i']+1;
    $_SESSION['i']=$i;
  }
?>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
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
.container {
  padding: 16px;
}
form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 42px;
      font-size: 42px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 25px 0 #d6e0f5; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: 
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.3); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input[type="text"] {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
          .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #d6e0f5;
      color: #d6e0f5;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 28px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .btn-block {
      margin-top: 10px;
      padding: 10px;
      text-align: center;
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
  margin-left: 50px;
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
              <a class="nav-link " href="view_admin.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">View Admin</span>
              </a><br>
              <a class="nav-link" href="user.php">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">View user</span>
              </a><br>
              <a class="nav-link " href="sche_ass.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">View Scheduled Assessments</span>
              </a><br>
              <a class="nav-link" href="comp_ass.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">View Completed Assessments</span>
              </a>
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
                    <img alt="Image placeholder" src="../examples/images/<?php echo $s; ?>">
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
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
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
}
</script>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6" style="background-image:url(images/bimage.jpeg);background-size: cover";>
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Super Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">View Admin</a></li>
                  
                </ol>
              </nav>
            </div>
            
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
     <div class="testbox">
      <form action="add_test.php" method='post'>
         <div class="item">
          <p>Question. <?php echo $i ;?></p>
          <textarea rows="3" name='qn'></textarea>
        </div>
        <p>Keyword </p>
        
        <input type="text" id="demo" name="le"> <br><br>
        
          
         <div class="btn-block">
          <button type="submit" name='submit'>Add</button>
        </div>
      </form>
    </div>
     
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
</html>