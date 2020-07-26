<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if($_SESSION['elll']==1)
 {

         echo '<script>alert("Incorect un and pass");</script>';
        echo '<script>window.location= "frontpage.php"</script>';
 
        }
?>
<?php
include 'db.php';
include 'udb.php';
//$_SESSION['uname']='harsh@gmail.com';



$_SESSION['k']=1;



?>
<!DOCTYPE html>
<html>

<head>
  <style>
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
</style>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
          
           
      
    <!-- Topnav -->
    
      
            
            
          </ul>

          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
             <li>
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><i class="ni ni-single-02"></i></span>
                  <span>My profile</span>
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

  <!-- Main content -->
  
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6" style="background-image:url(images/bimage.jpeg);background-size: cover"; >
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">No of assessments scheduled</h5>
                      <span class="h2 font-weight-bold mb-0"><?php 
                       date_default_timezone_set('Asia/Kolkata');
                    $today = date("Y-m-d"); 
                  
                    
                    $ttt=date('H:i:s');
                    $quu="select t_ins from post_ans where t_ins like 'general' and is_deleted like 'not deleted' and e_date>='$today' ";

                      $y=mysqli_query($db,$quu);
                     $rq= mysqli_num_rows($y);
                     //echo $rq."general";
                     if($t=='clg')
                     {
                      $quu1="select t_ins from post_ans where ins like '$ins'  and yr like'$yr' and dept like'$dept' and is_deleted like 'not deleted' and e_date>='$today'";


                     }
                       elseif($t=='school')

                       {
                        $quu1="select t_ins from post_ans where ins like '$ins'  and class like  '$yr' and gp like '$dept' and is_deleted like 'not deleted' and e_date>'$today' ";


                       }

                    

                      $y1=mysqli_query($db,$quu1);
                     $rq1= mysqli_num_rows($y1);
                
                 // echo $rq1."school";
                     echo $rq+$rq1;
                     ;
                     ?>
</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">No of assessments completed</h5>
                      <span class="h2 font-weight-bold mb-0">
                      <?php 
                    

                        $cd= mysqli_query($db,"select count(ass_no) as c  from result where un='$uno' ");
                         $r = mysqli_fetch_assoc($cd);
                           $ss=$r['c'];
                           echo $ss;
                           ?>
                           </span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total points</h5>
                      <p></p>
                      <span class="h2 font-weight-bold mb-0"><?php 
                       
                     
                      

                      $qu=mysqli_query($db," select  SUM(marks_scored) as m, SUM(tot_m) as tm  from result where  un like '$uno'");
                     while( $r = mysqli_fetch_assoc($qu))
                          {
  
                        $s=$r['m'];
                        $tm=$r['tm'];
                    }
                        echo $s."/".$tm;
                       
                        ?>
                          
                        </span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Ranking</h5>
                       <p></p>
                      <span class="h2 font-weight-bold mb-0">
                        
                        <?php 
                       
                   
                  
                      
                    $i=1;
                    
                    $n=1;
                    $j=0;
                    $cnt=0;
                   
                      $query="select sum(marks_scored)/count(ass_no) as m,fn,ln,result.un from result inner join user on result.un=user.un group by result.un order by m desc";
                      $y=mysqli_query($db,$query);
                     while( $r = mysqli_fetch_assoc($y))
                       {  while($n!=0)
                        {
                          $_SESSION['m']=$r['m'];
                          $n=0;
                          $cnt=0;
                        }

                        $u=$r['un'];
                          $mark=$r['m'];
                         
                    if($_SESSION['m']==$mark){
                      if($cnt==0)
                      {
                        $j++;
                      }
                    
                      $n=0;
                      $cnt++;
                     
                    }
                    else
                    {
                      $n=1;
                       ++$j;
                    }
                    if($u==$uno)
                    {
                    echo $j;
                }
                    
                   
                     
                  
                }

                   
                       
                        ?>


                      </span>
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
        </div>
      </div>
    </div>
    <!-- Page content -->
   <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <center>
                  <button type="button" class="btn btn-default">
  <span>    Top 5 Rankers   </span>
 
</button>
                  </center>
                </div>
                
              </div>
            </div>
      <div class="col-xl-12">

	<div class="row" style="padding-left:100px">
    
  <?php
    $i=1;
    $query="select sum(marks_scored)/count(ass_no) as m,fn,ln,pic,gender,sum(tot_m)/count(ass_no) as mm from result inner join user on result.un=user.un group by result.un order by m desc limit 0 , 5";
    $y=mysqli_query($db,$query);
   while( $r = mysqli_fetch_assoc($y))
     {  
        $un=$r['fn']." ".$r['ln'];
        $p=$r['pic'];
        $g=$r['gender'];
        $mark=$r['m'];
        $t_mark=$r['mm'];
        $per=($mark/$t_mark)*100;

  if($p==NULL and $g=='male' )
  {
    echo'
  <div class="col-sm-2 py-2" >
  <div class="card">
    <div class="row justify-content-center">
     <img src="images/avatar1.jpg "   class="rounded-circle" style="width:50%">
    </div>
    <br>';
  }
  elseif($p==NULL and $g=='female' )
  {
    echo'
  <div class="col-sm-2 py-2">
  <div class="card">
    <div class="row justify-content-center">
     <img src="images/avatar2.jpg "   class="rounded-circle" style="width:50%">
    </div>
    <br>';
  }
  else{
    echo'
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
  </div>';

  }
  ?>
  </div>
  </div>
  
  
  <div class="col-xl-12">
        <div class="card" style="padding-bottom:100px">
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
             <div class="card-body" style="position: absolute;left:200px;top:100px;">
            <div class="row" >
            
                <div class="col-sm-3 py-2" >
                <div class="card">
                  <div class="row justify-content-center">
                   <img src="images/Bronze.jpeg "   class="rounded-circle" style="width:70%">
                  </div>
                   <?php
             $as="SELECT count(batch) as m,batch,un FROM result where un='$uno' and  batch='Bronze' ";
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
                   <img src="images/Gold.jpeg "   class="rounded-circle" style="width:80%">
                  </div>
              <?php
             $as="SELECT count(batch) as m,batch,un FROM result where un='$uno' and  batch='Gold' ";
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
                   <img src="images/Silver.jpeg" class="rounded-circle" style="width:70%">
                  </div>
              <?php
             $as="SELECT count(batch) as m,batch,un FROM result where un='$uno' and  batch='Silver' ";
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
        
      
           
      <!-- Footer -->
      
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
</body>
 <script src="on.js"></script>

</html>