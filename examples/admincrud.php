<?php
session_start();
include 'db.php';
$n=0;
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$k=$_SESSION['k'];
$an=$_SESSION['ano'];
$stss=$_SESSION["stss"];
extract($_POST);
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}
  $dd=date("Y:m:d H:i:s");

$pass3=password_generate(7);
$pass1=md5($pass3);
if(isset($_POST['email'])&&isset($_POST['ii'])&&isset($_POST['ii1'])&&isset($_POST['ii2'])&&isset($_POST['ii3']))
{
explode(",",$ii);
explode(",",$ii1);
explode(",",$ii2);
explode(",",$ii3);
$ii4='view';
 $output1 = preg_split("/( |,|\n)/", $ii );
        $user1 = array();
        for ($x = 0; $x < sizeof($output1); $x++) {
            array_push($user1,$output1[$x]) ;
          }
          for ($x = 0; $x < sizeof($user1); $x++) {

           if($user1[$x]=='user')
            {
              $n=1;
            }
            if($user1[$x]=='admin')
            {
              $n1=1;
            }
            if($user1[$x]=='scheass')
            {
              $n2=1;
            }
            if($user1[$x]=='compass')
            {
              $n3=1;
            }
          }
          if($n!=1)
          {
            $ii1=NULL;
          }
          if($n1!=1)
          {
            $ii4=NULL;
          }
          if($n2!=1)
          {
            $ii2=NULL;
          }
          if($n3!=1)
          {
            $ii3=NULL;
          }
$query="select * from admin where an like '$email' and is_deleted like 'not deleted' ;";
  $result=mysqli_query($db,$query);
  if (mysqli_num_rows($result)>0) {
         echo 'This Email id already exist'; 
        
  } 
  else{

$h=mysqli_query($db,"insert into admin (an,pass,is_deleted,created_by,user,admin,sche_ass,comp_ass) values('$email','$pass1','not deleted','$an','$ii1','$ii4','$ii2','$ii3')");

if($h)
{
  echo 'Data Successfully Added';
   $subject = "Quizapp";
  $to = $_POST['email'];
  $message = "
      
       
   Welcome to QUIZAPP !!!
   You have registered to Quizapp successfully...

   Your UserName is $email
   Your Password is  $pass1
   

   Go Back to your Quiz app and enter the OTP for complete Registration.
   

    ";
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: <akharshinibbtechit@gmail.com>' . "\r\n";
 $headers .= 'Cc: ' . "\r\n";
 if(mail($to,$subject,$message,$headers))
 {

echo"yes";
 }
else
{
 echo "failed";
 }
        
}

}

}
if(isset($_POST['ass1'])&&isset($_POST['idb'])&&isset($_POST['iiu'])&&isset($_POST['iiu1'])&&isset($_POST['iiu2'])&&isset($_POST['iiu3']))
{
explode(",",$iiu);
explode(",",$iiu1);
explode(",",$iiu2);
explode(",",$iiu3);
$iiu4='view';
 $output1 = preg_split("/( |,|\n)/", $iiu );
        $user1 = array();
        for ($x = 0; $x < sizeof($output1); $x++) {
            array_push($user1,$output1[$x]) ;
          }
          for ($x = 0; $x < sizeof($user1); $x++) {

           if($user1[$x]=='user')
            {
              $n=1;
            }
            if($user1[$x]=='admin')
            {
              $n1=1;
            }
            if($user1[$x]=='scheass')
            {
              $n2=1;
            }
            if($user1[$x]=='compass')
            {
              $n3=1;
            }
          }
          if($n!=1)
          {
            $iiu1=NULL;
          }
          if($n1!=1)
          {
            $iiu4=NULL;
          }
          if($n2!=1)
          {
            $iiu2=NULL;
          }
          if($n3!=1)
          {
            $iiu3=NULL;
          }
          

$h=mysqli_query($db,"update admin set updated_by='$an' , user ='$iiu1' , admin ='$iiu4' , sche_ass = '$iiu2' , comp_ass = '$iiu3' where an = '$idb' " );
if($n1!=1 && $n2!=1 && $n3!=1 && $n!=1)
{
 $w=mysqli_query($db,"update admin set updated_by='$an' , status='block' where an = '$idb' " );   
}
if($h)
{
  echo 'Data Successfully Edited';
        
}



}
if(isset($_POST['aid_u'])&&isset($_POST['ass'])&&isset($_POST['name_u'])&&isset($_POST['desig_u'])&&isset($_POST['quali_u'])&&isset($_POST['ins_u'])&&isset($_POST['phno_u']))
{   

  $qq="UPDATE admin SET name = '$name_u', desig ='$desig_u', quali ='$quali_u', ins ='$ins_u', phno ='$phno_u' WHERE an='$aid_u';";
if (mysqli_query($db,$qq)) {   
        echo "<script type= 'text/javascript'>alert('Profile Updated')</script>";
     }
 }
if(isset($_POST['deleteid']))
{
  $aid=$_POST['deleteid'];
  mysqli_query($db,"UPDATE `admin` SET  `deleted_by` = '$an', `is_deleted` = 'deleted', `deleted_on` = '$dd' WHERE `admin`.`an` = '$aid';");
  echo "<script type= 'text/javascript'>alert('Data Deleted Successfully ')</script>";
}


if(isset($_POST['ubid']))
{
  $ubid=$_POST['ubid'];
  mysqli_query($db,"UPDATE admin SET  `updated_by` = '$an',`updated_on` = '$dd' , status='unblock' WHERE an='$ubid';");
  
}


if(isset($_POST['bid']))
{
  $bid=$_POST['bid'];
  mysqli_query($db,"UPDATE admin SET  `updated_by` = '$an',`updated_on` = '$dd' ,  status='block' WHERE an='$bid';");
  
}

?>


<?php
        $q = $_GET['q'];
         $page=$_SESSION['pg'];
         $stss=$_SESSION['stss'];
         if($page)
{
                       if($page==1)
                       {
                        $k=1;
                       }
                       else
                       {
                        $k=(($page-1)*5)+1;
                       }
                       $page=mysqli_real_escape_string($db,$page);
                       $page=htmlentities($page);
                     }
                     else{
                       $page=1;
                     }

echo '<table class="table align-items-center  table-dark" id="tab">
<thead class="thead-dark">
  <tr>
    <th scope="col" class="sort" data-sort="name">s.no</th>
    <th scope="col" class="sort" data-sort="budget">Admin Name</th>
    <th scope="col">Designation</th>
	<th scope="col" class="sort" data-sort="status">EMAIL</th>
    <th scope="col" class="sort" data-sort="completion">Option</th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
  </tr>
</thead>

<tbody class="list">
  
  <tr>';
  if($q!='')
  {
    $sql="SELECT * FROM admin WHERE an LIKE  '$q%' or name  LIKE  '$q%' or desig  LIKE  '$q%'  and is_deleted like 'not deleted' ";
     
    }
    else
    {

  $sql="select * from admin where is_deleted like 'not deleted' and status not like 'Superadmin'";
    }
                     $res=mysqli_query($db,$sql);
                     $count=mysqli_num_rows($res);
                     $per_page=5;
                     $no_of_page=ceil($count/$per_page);
                     $start=($page-1)*$per_page;

                     if($q!='')
                     {
                       $ql="SELECT * FROM admin WHERE an LIKE  '$q%' or name  LIKE  '$q%' or desig  LIKE  '$q%'  and is_deleted like 'not deleted' ";
                        $y = mysqli_query($db,$ql);
                       $k=1;
                       }
                       else
                       {
                    
                     $query="select * from admin where is_deleted like 'not deleted' and  status not like 'Superadmin' limit $start,$per_page";
                      $y=mysqli_query($db,$query);
                       }
                     while( $r = mysqli_fetch_assoc($y))
                       {  $aa=$r['an'];
                          $name=$r['name'];
                          $desig=$r['desig'];
                          $ins=$r['ins'];
                          $sts=$r['status'];
                          $quali=$r['quali'];
                          $phno=$r['phno'];
                         
                          $user1=$r['user'];
  $admin1=$r['admin'];
  $scheass1=$r['sche_ass'];
  $compass1=$r['comp_ass'];
                        
                        echo '    
                        <tr>    
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm">'.$k++.'</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">'
                      .$name.'
                    </td>
                    <td class="budget">'
                      .$desig.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        
                        <span class="status">'.$aa.'</span>
                      </span>
                    </td>
                    
                    <td>
                      '; ?>
                       <div class="d-flex align-items-center">
                      <a href="#viewModal" class="edit" data-toggle="modal">
              <i class="material-icons update"  
              data-id="<?php echo $aa ; ?>"
              data-aid="<?php echo $aa ; ?>"
              data-name="<?php  echo $name; ?>"
              data-desig="<?php  echo $desig; ?>"
              data-quali="<?php echo $quali; ?>"
              data-ins="<?php echo $ins; ?>"
              data-phno="<?php  echo $phno; ?>"
              
              
              title="Edit"><button class="btn btn-primary">View</button></i>
            </a>
                                         
                      
                        <div id="viewModal" class="modal fade" >
    <div class="modal-dialog modal-lg modal-dialog-centered" >
      <div class="modal-content" >
        <form id="update_form">
          <div class="modal-header">            
            <h4 class="modal-title">View Admin</h4>
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal" data-dismiss="modal" aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body">
            
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">NAME</label><br>
                        <input type="text" id="name_v" name="name"   readonly>
						
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">QUALIFICATION</label><br>
                        <input type="text" id="quali_v" name="quali"    readonly>
						
                      </div>
                    </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">DESIGNATION</label><br>
                         <input type="text" id="desig_v" name="desig"    readonly>
                        
                     
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">EMAIL ADDRESS</label><br>
                           <input type="text"  id="aid_v" name="aid"   readonly>
                       
                       
                      </div>
                    </div>
					 <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">INSTITUTION</label><br>
                       <input type="text" id="ins_v" name="ins"   readonly>
                       
                       
                      </div>
                    </div>
				 <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">PHONE NO</label><br>
                        <input type="text" id="phno_v" name="phno"   readonly>
                       
                       
                      </div>
                    </div>
                    </div>
                
                     
          
          <div class="modal-footer">
          <input type="hidden" value="2" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>


                      
                        
                      <?php echo'</div>
                      
                    </td> ';
                   
?>
                    




                        <?php
                       if( $stss=='Superadmin')
             {
    
                        
                        if($sts=='block')
                          {
                     echo '<td>
                      <div class="d-flex align-items-center">
                        <button  onclick="unblock(`'.$aa.'`)" class="btn btn-primary" value='.$aa.' name="but2" style="vertical-align:middle"><span>Unblock</span></button></div>
                        </td>';
                  }
                        else 
                          {echo '<td>';
                          ?>
                          <div class="d-flex align-items-center">
                      <a href="#acessModal" class="edit" data-toggle="modal">
              <i class="material-icons update" 
              data-id="<?php echo $aa ; ?>"
              data-user1="<?php echo $user1 ; ?>"
              data-admin1="<?php echo $admin1 ; ?>"
              data-sche1="<?php echo $scheass1 ; ?>"
              data-comp1="<?php echo $compass1 ; ?>"
              
              
              
              title="Edit"><button class="btn btn-primary" >Assessibility</button></i>
            </a>
                                         
                      
                        <div id="acessModal" class="modal fade"  >
    <div class="modal-dialog modal-sm modal-dialog-centered"  >
      <div class="modal-content"  >
        <form id="update_form">
          <div class="modal-header">            
            <h4 class="modal-title">Acessibility of Admin</h4>
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal" data-dismiss="modal" aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body" >
            
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">NAME</label><br>
                       <input type="text" id="id_a" name="id1" style="width:325px;"   readonly><br>
                       
                     

                 
                
                  
                 
                 
                        <label class="form-control-label" for="uname"><b>ACCESSIBILITY OF ADMIN</b></label><br>
                        <label class="form-control-label" for="uname">Admin</label><br>
     <input type="text" id="admin1" name="id1" style="width:325px;"   readonly><br>
    <label class="form-control-label" for="uname"> User</label><br>
     <input type="text" id="user1" name="id1" style="width:325px;"   readonly><br>
    <label class="form-control-label" for="uname"> Scheduled assessment</label><br>
     <input type="text" id="sche1" name="id1" style="width:325px;"   readonly><br>
     <label class="form-control-label" for="uname">Completed assessment</labe><br>
     <input type="text" id="comp1" name="id1" style="width:325px;"   readonly><br>
     
       <button type="submit" class="btn btn-default"  data-dismiss="modal" value="Cancel">cancel</button>
   </div>
            
                      </div>
                    </div>
                    
                    </div>
                    </div>
                
                     
          
          <div class="modal-footer">
          
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
                          echo '<td>
                      '; ?>
                       <div class="d-flex align-items-center">
                      <a href="#blockModal" class="edit" data-toggle="modal">
              <i class="material-icons update"  
              data-id="<?php echo $aa ; ?>"
              data-ad="<?php echo $ad ; ?>"
              
              
              
              title="Edit"><button class="btn btn-primary" >Block</button></i>
            </a>
                                         
                      
                        <div id="blockModal" class="modal fade"  >
    <div class="modal-dialog  modal-dialog-centered"  >
      <div class="modal-content"  >
        <form id="update_form">
          <div class="modal-header">            
            <h4 class="modal-title">View Admin</h4>
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal" data-dismiss="modal" aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body" >
            
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">NAME</label><br>
                       <input type="text" id="id_b" name="id1" style="width:425px;"   readonly><br>
                       
                     

                 
                
                  
                 
                 
                        <label class="form-control-label" for="uname"><b>ACCESSIBILITY OF ADMIN</b></label>
      <div style="padding-left:60px;" >
      <label class="form-control-label" for="uname"> USERPAGE :</label>&nbsp;&nbsp;&nbsp;
     <input type="checkbox" name="pri1[]" onchange="sh(this.checked)" value='user' id="pri1" > <label class="form-control-label"><b>view user</b></label><br>
     </div>
     <div id="hF" style="display:none;padding-left:120px;">
     <input type="checkbox" name="us1" id="us1" value='add'> <label class="form-control-label" >ADD</label>&nbsp;&nbsp;
     <input type="checkbox" name="us1" id="us1" value='remove'> <label class="form-control-label" >REMOVE</label>&nbsp;&nbsp;
     
    </div>
       <div class="col-lg-9" style="padding-left:39px">
     <div style="padding-left:10px" >
   <label class="form-control-label" for="uname"> ADMINPAGE :</label>&nbsp;&nbsp;&nbsp;&nbsp;
     
   <input type="checkbox" name="pri1[]" onchange="sh1(this.checked)" value='admin' id="pri1"> <label class="form-control-label" ><b>view admin</b></label>
      </div>     
   </div>   
     
    <div class="col-lg-15">
     
   <label class="form-control-label" for="uname" style="padding-left:40px">SCH_ASS PAGE :</label>&nbsp;&nbsp;
    <input type="checkbox" name="pri1[]" onchange="sh2(this.checked)" value='scheass' id="pri1"> <label class="form-control-label" ><b>view scheduled assessments</b></label>
     </div>       
     <div id="hF2" style="display:none;padding-left:120px;">
     
   <input type="checkbox" name="sa1" id="sa1" value='add' > <label class="form-control-label" >ADD</label>&nbsp;&nbsp;
     <input type="checkbox" name="sa1" id="sa1" value='remove'> <label class="form-control-label" >REMOVE</label>&nbsp;&nbsp;
     <input type="checkbox" name="sa1" id="sa1" value='edit'> <label class="form-control-label" >EDIT</label>
      <br>
     </div>
     <div class="col-lg-15">
      <label class="form-control-label" style="padding-left:40px" for="uname">COMP_ASS PAGE :</label>
     <input type="checkbox" name="pri1[]"   onchange="sh3(this.checked)" value='compass' id="pri1"> <label class="form-control-label" ><b>view completed assessments</b></label><br>
        </div>     
     <div id="hF3" style="display:none;padding-left:120px;">
     <input type="checkbox" name="ca1" id="ca1" value='indrank' > <label class="form-control-label" >Individual ranking</label>&nbsp;&nbsp;
     <input type="checkbox" name="ca1" id="ca1" value='rank'> <label class="form-control-label" >Ranking</label>&nbsp;&nbsp;
     <input type="checkbox" name="ca1" id="ca1" value='upload'> <label class="form-control-label" >Upload</label>     
   </div>
    </div>
   <?php 
   echo'
        
      <button type="submit" id="next1" value='.$aa.' class="btn btn-default" style="width: 100%"  onclick="editass(`'.$aa.'`)">update</button>';
      ?>
     
       <button type="submit" class="btn btn-default"  data-dismiss="modal" value="Cancel">cancel</button>
   </div>
            
                      </div>
                    </div>
                    
                    </div>
                    </div>
                
                     
          
          <div class="modal-footer">
          
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>


                      
                        
                      <?php echo'</div>                      
                    </td> ';
                  }
                        echo '<td>
                        <div class="d-flex align-items-center">
                        <button  onclick="deleteadmin(`'.$aa.'`)" class="btn btn-danger" value='.$aa.' name="but3" style="vertical-align:middle"><span>Remove</span></button>                  
                      </div>
                    </td>';
}
                    echo'</tr>';
                   }
                       
                  
                  ?>
                  
                  </tr>
                 
                </tbody>
              </table>
            

            
<?php
              if($q=='')
    {
      ?>  



           <nav aria-label="Page navigation example" id="nnnav">
  <ul class="pagination justify-content-end">
    <li 
    <?php
       if($page==1)
       {
         echo "class='page-item disabled'";
       }  
       else{
         echo "class='page-item'";
       }
    ?>
    >
      <a class="page-link" href="view_admin.php?page=<?php echo $page-1; ?>" tabindex="-1">
        <i class="fa fa-angle-left"></i>
      </a>
    </li>
    <?php
      for($i=1;$i<=$no_of_page;$i++)
      {
        ?>
           <li
            <?php 
              if($page==$i)
              {
              echo "class='page-item active'";
              }
              else{
                echo "class='page-item'";
              }

            ?>
           ><a class="page-link" href="view_admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
      }
    ?>
   
    <li 
    <?php
       if($page==$no_of_page)
       {
         echo "class='page-item disabled'";
       }  
       else{
         echo "class='page-item'";
       }
    ?>
    >
      <a class="page-link" href="view_admin.php?page=<?php echo $page+1; ?>">
        <i class="fa fa-angle-right"></i>
        
      </a>
    </li>
  </ul>
</nav>
<?php
        }
          ?>
          <script type="text/javascript">
            
       
       $('#name_u').keyup(function(){
             firstchk();
       });
             
        function firstchk(){
          
          var fn_val = $('#name_u').val();
            
            if(fn_val.length == ''){
              $('#fncheck').show();
              $('#fncheck').html("**please fill username");
              $('#fncheck').focus();
              $('#fncheck').css("color","red");
              valid1=false;
              
              
            }else{
            $('#fncheck').hide();
            valid1=true;
            
             }
                         
                      if((fn_val.length < 3) ||(fn_val.length >10)){
              $('#fncheck').show();
              $('#fncheck').html("**please length between 3 and 10");
              $('#fncheck').focus();
              $('#fncheck').css("color","red");
              
              valid1=false;

              
              
            }else{
            $('#fncheck').hide();
            valid1=true;
              }       
             
         return valid1;
        }
                 
       
                 
        
        
        
        $('#desig_u').keyup(function(){
                 lastchk();
                      });
        

                


           function lastchk(){
          
          var ln_val = $('#desig_u').val();
            
            if(ln_val.length == ''){
              $('#lncheck').show();
              $('#lncheck').html("**please fill lastname");
              $('#lncheck').focus();
              $('#lncheck').css("color","red");
              valid2=false;
              
              
              
            }else{
            $('#lncheck').hide();
            valid2=true;
             }
                         
                      if((ln_val.length < 3) ||(ln_val.length >10)){
              $('#lncheck').show();
              $('#lncheck').html("**please length between 3 and 10");
              $('#lncheck').focus();
              $('#lncheck').css("color","red");
              valid2=false;
              
              
              
            }else{
            $('#lncheck').hide();
             valid2=true;
             }        
            return valid2;                
          }


         
        $('#phno_u').keyup(function(){
                 phonenochk();
                      });
        

                


           function phonenochk(){
          
          var inputval = $('#phno_u').val();
            if(inputval.length == ''){
             $('#pncheck').show();
                                    $("#pncheck").html(" * not a phone number");
                  $('#pncheck').focus();
                  $('#pncheck').css("color","red"); 
                  valid3=false;
            }
           else{
             valid3=true;
           }  
             
             
             
             
             
             if (inputval.length == 10)
                          {

                          if(isNaN(inputval))
                               {
                                    $('#pncheck').show();
                                    $("#pncheck").html(" * not a phone number");
                  $('#pncheck').focus();
                  $('#pncheck').css("color","red"); 
                  valid3=false;
                                }
              else {
                $('#pncheck').hide();
                   valid3=true;
              }               
                          }
                            //alert('Phone number must be 10 digits.');
                        else if ((inputval.length < 10)||(inputval.length > 10)){
                             $('#pncheck').show();
               $("#pncheck").html(" *not of length 10");
                             $('#pncheck').focus();
                 $('#pncheck').css("color","red"); 
                 valid3=false;
                              }
            else{
              $('#pncheck').hide();
                valid3=true;
            }   
            return valid3;
                            
            }     
          </script>
          <script>
function sh(checked)
{
  if(checked === true)
  
    $("#hF").fadeIn();
  
  else
    $("#hF").fadeOut();


}
function sh1(checked)
{
  if(checked === true)
  
    $("#hF1").fadeIn();
  
  else
    $("#hF1").fadeOut();
}
function sh2(checked)
{
  if(checked === true)
  
    $("#hF2").fadeIn();
  
  else
    $("#hF2").fadeOut();
}
function sh3(checked)
{
  if(checked === true)

    $("#hF3").fadeIn();

  else
    $("#hF3").fadeOut();
}


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

