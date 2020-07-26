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



if(isset($_POST['restoreid']))
{
  $uid=$_POST['restoreid'];
  mysqli_query($db,"UPDATE user SET `deleted_by` = '$an', `is_deleted` = 'not deleted', `deleted_on` = '$dd'  WHERE un = '$uid'");
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

echo'<table  id="table" class="table align-items-center table-flush table-dark">
<thead class="thead-dark">
  <tr>
    <th scope="col" class="sort" data-sort="name">s.no</th>
    <th scope="col" class="sort" data-sort="budget">User Name</th>
    <th scope="col" class="sort" data-sort="status">User Email</th>
    <th scope="col">Type of Institution</th>
    <th scope="col" class="sort" data-sort="completion">Option</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody class="list">
  <tr>';
  if($q!='')
                     {
                       $sql="SELECT * FROM user WHERE un LIKE  '$q%' or fn  LIKE  '$q%' or ln  LIKE  '$q%' or t_ins  LIKE  '$q%'   and is_deleted like 'deleted' ";
                        
                       }
                       else
                       {
$sql="select * from user where is_deleted like 'deleted' ";
                       }
$res=mysqli_query($db,$sql);
$count=mysqli_num_rows($res);
$per_page=5;
$no_of_page=ceil($count/$per_page);
$start=($page-1)*$per_page;


if($q!='')
{
  $ql="SELECT * FROM user WHERE un LIKE  '$q%' or fn  LIKE  '$q%' or ln  LIKE  '$q%' or t_ins  LIKE  '$q%'  and is_deleted like 'deleted' ";
   $y = mysqli_query($db,$ql);
  $k=1;
  }
  else
  {
$query="select * from user where is_deleted like 'deleted' limit $start,$per_page ";
 $y=mysqli_query($db,$query);
  }
while( $r = mysqli_fetch_assoc($y))
  {  $aa=$r['un'];
    $fn=$r['fn'];
    $ln=$r['ln'];
    $stss=$r['status'];
    $tins=$r['t_ins'];
   
   
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
 .$fn." ".$ln.'
</td>
<td>
 <span class="badge badge-dot mr-4">
   <i class="bg-warning"></i>
   <span class="status">'.$aa.'</span>
 </span>
</td>
<td>
 <span class="status">'.$tins.'</span>
 
</td>
';
?>
 
<?php

            
echo'
<td>
 
 <div class="d-flex align-items-center">

 <button onclick="restore(`'.$aa.'`)" class="btn btn-danger" id="remove" value='.$aa.' name="button" style="vertical-align:middle"><span>Restore</span></button>   
  
 
 </div>              
   </div>
 
</td>
</tr>';


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
<a class="page-link" href="deluser.php?page=<?php echo $page-1; ?>" tabindex="-1">
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
><a class="page-link" href="deluser.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
<a class="page-link" href="deluser.php?page=<?php echo $page+1; ?>">
<i class="fa fa-angle-right"></i>

</a>
</li>
</ul>
</nav>
<?php
        }
          ?>
