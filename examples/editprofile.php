<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$l=$_SESSION['ano'];
include 'db.php';
$an=$_SESSION['ano'];
$query="select * from admin where an like '$an'";
  $y=mysqli_query($db,$query);
 while( $r = mysqli_fetch_assoc($y))
 {$a=$r['an'];
  $b=$r['name'];
  $stss=$r['status'];
  $s=$r['pic'];
 }
$query="select * from admin where an like '$an'";
  $y=mysqli_query($db,$query);
 while( $r = mysqli_fetch_assoc($y))
 {
  $ano=$r['an'];
  $an=$r['name'];
  $ins=$r['ins'];
  $desig=$r['desig'];
  $quali=$r['quali'];
  
  $phno=$r['phno']; 
 }
?>
<!DOCTYPE html>
<html>

<head>
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
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <div class="header pb-5 d-flex align-items-center" style="min-height: 500px;  background-position: center top;background-image:url(images/bimage.jpeg);background-size: cover">
      <!-- Mask -->
     
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-10 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $an; ?> </h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can Edit your Personal Details Here ...</p>
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                   
                   
                   <?php
                      if($s == '')
                      {
                          echo '<img alt="Image placeholder" src="../examples/images/male.png">';
                      }
                      else{
                          echo '<img alt="Image placeholder" src="../examples/images/<?php echo $s; ?>">';
                      }
                      ?>
                    
                    
                 
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
            
              
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                  <form method="post" enctype="multipart/form-data">
                    <input type="file" class="btn btn-sm btn-default float-right" name="image"><br><br>
                   
             <div class="card-body pt-0">
              <div class="row" style="padding-left:90px">
                  
                    <input type="submit" class="btn btn-sm btn-default float-right" name="submit" value="save">
                  
              </div>    
             
             </div>      
                  </form>
                  </div>
                </div>
              </div>
             <?php
              if(isset($_POST['submit']))
              {
                include 'db.php';  
               
                $image=$_FILES['image']['name'];
                $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $target = "images/" .basename($a.'.'.$extension);
               
                $sql = "UPDATE admin SET pic='$a.$extension' WHERE an='$a';";
                if(mysqli_query($db,$sql))
                {
                  echo "";
                }
                else{
                  echo "Error: "  . mysqli_error($db);
                }
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
                {
                    echo"";
                }
                
              } 
             ?>
             


              <div class="text-center">
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
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Your Profile </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
            <form action="editupdate.php" method="post">
                <h6 class="heading-small text-muted mb-4">Admin - <?php echo $ano; ?></h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="name">Admin name</label>
                    
                    <input type="text"  id="firstname" class="form-control"  value="<?php echo $an; ?>"  name="n" autocomplete="off" >
                         </div>
                       <h5 id="fncheck">  </h5>         
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Qualification</label>
                        <input type="text" id="input-first-name" class="form-control"  value="<?php echo $quali; ?>"  name="q">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Designation</label>
                        <input type="text" id="input-first-name" class="form-control"  value="<?php echo $desig; ?>"  name="d" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Institution</label>
                        <input type="text" id="input-first-name" class="form-control"  value="<?php echo $ins; ?>"  name="i" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Email Address</label>
                        <input type="email"  id="email" class="form-control" value="<?php echo $ano; ?>" name="e"  autocomplete="off">
                        <h5 id="emcheck"> </h5>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Mobile Number</label>
                        <input type="text" id="phno" class="form-control"  value="<?php echo $phno; ?>"  name="m" autocomplete="off" required>
                        <h5 id="pncheck"> </h5>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
               <!-- Button trigger modal -->

               <button type="submit"  class="btn btn-primary"  name='next' id='next'  >Save Changes</button>
   
    </div>
  </div>
</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Quiz Point</a>
            </div>
          </div>
         
        </div>
      </footer>
    </div>
  </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  type="text/javascript" >
      $(document).ready(function(){
 
      $("#next").click(function(){
      
             $('#fncheck').hide();
      
       $('#pncheck').hide();
       $('#emcheck').hide();
       
       var fn_err = true;
     
       var pn_err = true;
       var em_err = true;
       var fng = true; 
       
              
          var fn_val = $('#firstname').val();
            
            if(fn_val.length == ''){
              $('#fncheck').show();
              $('#fncheck').html("**please fill username");
              $('#fncheck').focus();
              $('#fncheck').css("color","red");
              fn_err = false;
              return false;  
            }else{
            $('#fncheck').hide();
            fn_err == true;
            
             }
                         
             if((fn_val.length < 3) ||(fn_val.length >20)){
              $('#fncheck').show();
              $('#fncheck').html("**please length between 3 and 10");
              $('#fncheck').focus();
              $('#fncheck').css("color","red");
              
              fn_err = false;
              
              return false;  
            }else{
            $('#fncheck').hide();
            
              }
          var inputval = $('#phno').val();
            
             if (inputval.length == 10)
                          {

                          if(isNaN(inputval))
                               {
                                    $('#pncheck').show();
                                    $("#pncheck").html(" * not a phone number");
                  $('#pncheck').focus();
                  $('#pncheck').css("color","red"); 
                  pn_err = false;
                  return false;
                                }
              else {
                $('#pncheck').hide();
              }  
                          }
                            //alert('Phone number must be 10 digits.');
                        else if ((inputval.length < 10)||(inputval.length > 10)){
                             $('#pncheck').show();
               $("#pncheck").html(" *not of length 10");
                             $('#pncheck').focus();
                 $('#pncheck').css("color","red"); 
                 pn_err = false;
                 return false;
                              }
            else{2
              $('#pncheck').hide();
            }  
          var email = $('#email').val();
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
            
            if(email.length == ''){
              $('#emcheck').show();
              $('#emcheck').html("**please fill your emailid");
              $('#emcheck').focus();
              $('#emcheck').css("color","red");
              em_err = false;
              return false;  
            }
            else if(!regex.test(email)){
              $('#emcheck').show();
              $('#emcheck').html("**invalid emailid");
              $('#emcheck').focus();
              $('#emcheck').css("color","red");
              em_err = false;
              return false;
              
            }
            else{
            $('#emcheck').hide();
            em_err = true;
            
             }          
      });
    });

    </script>
    
    
    
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