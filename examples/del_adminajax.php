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




if(isset($_POST['restoreid']))
{
  $aid=$_POST['restoreid'];
  mysqli_query($db,"UPDATE `admin` SET  `deleted_by` = '$an', `is_deleted` = 'not deleted', `deleted_on` = '$dd' WHERE `admin`.`an` = '$aid';");
  echo "<script type= 'text/javascript'>alert('Data Deleted Successfully ')</script>";
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

echo '<table class="table align-items-center table-flush table-dark" id="tab" >
<thead class="thead-dark">
  <tr>
    <th scope="col" class="sort" data-sort="name">s.no</th>
    <th scope="col" class="sort" data-sort="budget">Admin Name</th>
    <th scope="col" class="sort" data-sort="status">Admin Email</th>
    <th scope="col">Designation</th>
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
    $sql="SELECT * FROM admin WHERE an LIKE  '$q%' or name  LIKE  '$q%' or desig  LIKE  '$q%'  and is_deleted like 'deleted' ";
     
    }
    else
    {

  $sql="select * from admin where is_deleted like 'deleted'";
    }
                     $res=mysqli_query($db,$sql);
                     $count=mysqli_num_rows($res);
                     $per_page=5;
                     $no_of_page=ceil($count/$per_page);
                     $start=($page-1)*$per_page;

                     if($q!='')
                     {
                       $ql="SELECT * FROM admin WHERE an LIKE  '$q%' or name  LIKE  '$q%' or desig  LIKE  '$q%'  and is_deleted like 'deleted' ";
                        $y = mysqli_query($db,$ql);
                       $k=1;
                       }
                       else
                       {
                    
                     $query="select * from admin where is_deleted like 'deleted' limit $start,$per_page";
                      $y=mysqli_query($db,$query);
                       }
                     while( $r = mysqli_fetch_assoc($y))
                       {  $aa=$r['an'];
                          $name=$r['name'];
                          $desig=$r['desig'];
                         
                          $sts=$r['status'];
                         
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
                      .$aa.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">'.$desig.'</span>
                      </span>
                    </td>';
                    
                    ?>

                      
                     
                    

<?php
                   
                        echo '<td>
                        <div class="d-flex align-items-center">
                        <button  onclick="restore(`'.$aa.'`)" class="btn btn-danger" value='.$aa.' name="but3" style="vertical-align:middle"><span>Restore</span></button>                  
                      </div>
                    </td>';
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
      <a class="page-link" href="del_admin.php?page=<?php echo $page-1; ?>" tabindex="-1">
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
           ><a class="page-link" href="del_admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
      <a class="page-link" href="del_admin.php?page=<?php echo $page+1; ?>">
        <i class="fa fa-angle-right"></i>
        
      </a>
    </li>
  </ul>
</nav>
<?php
        }
          ?>
          