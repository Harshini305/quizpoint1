<?php
session_start();
include 'db.php';
$an=$_SESSION['ano'];
$k=$_SESSION['k'];
include 'adb.php';
$output1 = preg_split("/( |,|\n)/", $user );
        $user1 = array();
        for ($x = 0; $x < sizeof($output1); $x++) {
            array_push($user1,$output1[$x]) ;
            
             if($user1[$x]=='remove')
              $n3=1;
          }
error_reporting(E_ERROR | E_WARNING | E_PARSE);
extract($_POST);
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}
  $dd=date("Y:m:d H:i:s");

$pass1=password_generate(7);
$pass3=md5($pass1);
if(isset($_POST['email']))
{

$query="select * from user where un like '$email' and is_deleted like 'not deleted' ;";
  $result=mysqli_query($db,$query);
  if (mysqli_num_rows($result)>0) {
         echo '<script>alert("This Email id already exist")</script>'; 
        
  } 
  else{

$h=mysqli_query($db,"insert into user (un,pass,is_deleted,created_by,online,otp) values('$email','$pass3','not deleted','$an','offline','1abc')");

if($h)
{
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



if(isset($_POST['deleteid']))
{
  $uid=$_POST['deleteid'];
  mysqli_query($db,"UPDATE user SET `deleted_by` = '$an', `is_deleted` = 'deleted', `deleted_on` = '$dd' , `is_deleted` = 'deleted' WHERE un = '$uid'");
  echo "<script type= 'text/javascript'>alert('Data Deleted Successfully ')</script>";
}


?>





<?php
$q = $_GET['q'];
$page=$_SESSION['pg'];
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

echo'<table  id="table" class="table align-items-center table-dark">
<thead class="thead-dark">
  <tr>
    <th scope="col" class="sort" data-sort="name">s.no</th>
    <th scope="col" class="sort" data-sort="budget">FIRST NAME</th>
    <th scope="col" class="sort" data-sort="status">LAST NAME</th>
    <th scope="col">Institution</th>   
   <th scope="col">Email</th>
	<th scope="col" class="sort" data-sort="completion">Option</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody class="list">
  <tr>';
  if($q!='')
                     {
                       $sql="SELECT * FROM user WHERE un LIKE  '$q%' or fn  LIKE  '$q%'   and is_deleted like 'not deleted' ";
                        
                       }
                       else
                       {
$sql="select * from user where is_deleted like 'not deleted' ";
                       }
$res=mysqli_query($db,$sql);
$count=mysqli_num_rows($res);
$per_page=5;
$no_of_page=ceil($count/$per_page);
$start=($page-1)*$per_page;


if($q!='')
{
  $ql="SELECT * FROM user WHERE un LIKE  '$q%' or fn  LIKE  '$q%'   and is_deleted like 'not deleted' ";
   $y = mysqli_query($db,$ql);
  $k=1;
  }
  else
  {
$query="select * from user where is_deleted like 'not deleted' limit $start,$per_page ";
 $y=mysqli_query($db,$query);
  }
while( $r = mysqli_fetch_assoc($y))
  {  $aa=$r['un'];
    $fn=$r['fn'];
    $ln=$r['ln'];
    $dob=$r['dob'];
    $g=$r['gender'];
    $tins=$r['t_ins'];
    $phno=$r['phno'];
    $ins=$r['ins'];
    $yr=$r['yr'];
    $class=$r['class'];
    $dept=$r['dept'];
    $gp=$r['gp'];
   
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
 .$fn.'
</td>
<td>
 <span class="badge badge-dot mr-4">
  
   <span class="status">'.$ln.'</span>
 </span>
</td>
<td>
 <span class="status">'.$ins.'</span>
 
</td>
<td>
 <span class="status">'.$aa.'</span>
 
</td>
<td>
 <div class="d-flex align-items-center">';
 ?>
  
  <a href="#viewModal" class="edit" data-toggle="modal">
              <i class="material-icons update"  
              data-id="<?php echo $aa ; ?>"
              data-uid="<?php echo $aa ; ?>"
              data-fn="<?php  echo $fn; ?>"
              data-ln="<?php  echo $ln; ?>"
              data-dob="<?php  echo $dob; ?>"
              data-tins="<?php echo $tins; ?>"
              data-ins="<?php echo $ins; ?>"
              data-g="<?php echo $g; ?>"
              data-phno="<?php  echo $phno; ?>"
              
              
              title="Edit"><button class="btn btn-primary" style="width:150px">View</button></i>
            </a>
                                         
                      
                        <div id="viewModal" class="modal fade" >
    <div class="modal-dialog  modal-lg modal-dialog-centered" >
      <div class="modal-content" >
        <form id="update_form">
          <div class="modal-header">            
            <h4 class="modal-title">View User</h4>
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal" data-dismiss="modal" aria-hidden="true">&times;</span> 
          </div>
          <div class="modal-body">
           <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name" >FIRST NAME</label><br>
                          <input type="text" id="fn_v" name="fn"  readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">LAST NAME</label><br>
                        <input type="text" id="ln_v" name="ln"   readonly>
                       </div>
                    </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">D.O.B</label><br>
                        <input type="text" id="dob_v" name="dob"   readonly>
                     </div>
                    </div>
                 <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">GENDER</label><br>
                        <input type="text" id="g_v" name="g"   readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">TYPE OF INSTITUTION</label><br>
                          <input type="text" id="tins_v" name="tins"    readonly>
                    </div>
                    </div>
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">INSTITUTION NAME</label><br>
                           <input type="text" id="ins_v" name="ins"   readonly>
                       </div>
                    </div>
					
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">PHONE.NO</label><br>
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



 <?php 
 echo '</div>
 
</td>';
?>
 
<?php

              if($stss=='Superadmin' || $n1==1)
              {
                
echo'
<td>
 
 <div class="d-flex align-items-center">

 <button onclick="deleteuser(`'.$aa.'`)" class="btn btn-danger" id="remove" value='.$aa.' name="button" style="vertical-align:middle"><span>Remove</span></button>   
  
 
 </div>              
   </div>
 
</td>
</tr>';
}

}
?>

</tr>

</tbody>
</table>

<?php
              if($q=='')
    {
      ?>


<nav aria-label="Page navigation example" id='nnnav'>
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
<a class="page-link" href="user.php?page=<?php echo $page-1; ?>" tabindex="-1">
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
><a class="page-link" href="user.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
<a class="page-link" href="user.php?page=<?php echo $page+1; ?>">
<i class="fa fa-angle-right"></i>

</a>
</li>
</ul>
</nav>
<?php
        }
          ?>
