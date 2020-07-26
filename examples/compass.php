<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'db.php';
$k=$_SESSION['k'];
include 'adb.php';
$k=$_SESSION['k'];
$_SESSION['jj']=0;
if($compass==NULL && $stss!='Superadmin')
{
   echo '<script>alert("Sry u are blocked to this page");</script>';
        echo '<script>window.location= "dashboard.php"</script>';
}
 $output1 = preg_split("/( |,|\n)/", $compass );
        $user1 = array();
        for ($x = 0; $x < sizeof($output1); $x++) {
            array_push($user1,$output1[$x]) ;
            if($user1[$x]=='indrank')
              $n1=1;
            else if($user1[$x]=='rank')
              $n2=1;
            else if($user1[$x]=='upload')
              $n3=1;
          }

extract($_POST);
if(isset($_POST['bid']))
{
  $bid=$_POST['bid'];
  mysqli_query($db,"UPDATE post_ans SET status='uploaded' WHERE ass_no='$bid';");
  
}

if(isset($_POST['submit']))
{
  include 'db.php';
  $h = $_POST['submit'];
 
  $data = file_get_contents($_FILES['myfile']['tmp_name']);
  $stmt = $db->prepare("UPDATE post_ans SET status='$data' WHERE ass_no='$h'; ");
  $stmt->execute();
}


?>

<?php
$q = $_GET['q'];
                    date_default_timezone_set('Asia/Kolkata');
                    $today = date("Y-m-d"); 
                    $ttt=date('H:i:s');
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
                     echo ' <div class="table-responsive">
              
              <table class="table align-items-center table-flush table-dark" id="tab">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">S.no</th>
                    <th scope="col" class="sort" data-sort="budget">Title</th>
                    <th scope="col" class="sort" data-sort="status">Total Questions</th>
                    <th scope="col" class="sort" data-sort="status">Total Duration</th>
                    <th scope="col">status</th>
                    <th></th>
                    <th scope="col" class="sort" data-sort="completion">Answer Key</th>
                    <th></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>';
                       if($_SESSION['stss']=='Superadmin')
                  { 
                      if($q!='')
                     {
                       $sql="SELECT * FROM post_ans WHERE ass_no LIKE  '$q%' or ass_name  LIKE  '$q%' or s_date  LIKE  '$q%'  or t_ins  LIKE  '$q%' or status LIKE  '$q%' and  e_date <'$today' or(e_date ='$today' and e_time<='$ttt') and is_deleted like 'not deleted' ";
                        
                       }
                       else
                       { 
                        $sql="select * from post_ans where (e_date <'$today' or (e_date ='$today' and e_time<'$ttt') ) and is_deleted like 'not deleted'";
                       
                     $res=mysqli_query($db,$sql);
                     $count=mysqli_num_rows($res);
                     $per_page=5;
                     $no_of_page=ceil($count/$per_page);
                     $start=($page-1)*$per_page;

                      }
                    
                     if($q!='')
                     {
                       $ql="SELECT * FROM post_ans WHERE ass_no LIKE  '$q%' or ass_name  LIKE  '$q%' or s_date  LIKE  '$q%'  or t_ins  LIKE  '$q%' or status LIKE  '$q%' and  e_date <'$today'or(e_date ='$today' and e_time<='$ttt')   and is_deleted like 'not deleted' ";
                        $y = mysqli_query($db,$ql);
                       $k=1;
                       }
                       else
                       {
                        
                     $query="select * from post_ans where( e_date <'$today' or(e_date ='$today' and e_time<'$ttt')) and is_deleted like 'not deleted' limit $start,$per_page";
                     $y=mysqli_query($db,$query);
                       }
                  }
                  else
                  {  if($q!='')
                     {
                       $sql="SELECT * FROM post_ans WHERE ass_no LIKE  '$q%' or ass_name  LIKE  '$q%' or s_date  LIKE  '$q%'  or t_ins  LIKE  '$q%' or status LIKE  '$q%' and  e_date <'$today' or(e_date ='$today' and e_time<='$ttt') and is_deleted like 'not deleted' and created_by='$an' ";
                        
                       }
                       else
                       {
                        $sql="select * from post_ans where ( e_date <'$today' or(e_date ='$today' and e_time<='$ttt'))  and is_deleted like 'not deleted' and created_by='$an'";
                       
                     $res=mysqli_query($db,$sql);
                     $count=mysqli_num_rows($res);
                     $per_page=5;
                     $no_of_page=ceil($count/$per_page);
                     $start=($page-1)*$per_page;
                    

                      }
                    
                     if($q!='')
                     {
                       $ql="SELECT * FROM post_ans WHERE ass_no LIKE  '$q%' or ass_name  LIKE  '$q%' or s_date  LIKE  '$q%'  or t_ins  LIKE  '$q%' or status LIKE  '$q%' and e_time<='$ttt'  and is_deleted like 'not deleted'  and created_by='$an'";
                        $y = mysqli_query($db,$ql);
                       $k=1;
                       }
                       else
                       {
                        
                     $query="select * from post_ans where (e_date <'$today' or (e_date ='$today' and e_time<'$ttt') ) and is_deleted like 'not deleted' and created_by='$an' limit $start,$per_page";
                     $y=mysqli_query($db,$query);
                       }
                      
                  }
                     while( $r = mysqli_fetch_assoc($y))
                       {  $aa=$r['ass_no'];
                         
                          if($r['e_date']==$today and $ttt > $r['e_time'])
                          {
                          $name=$r['ass_name'];
                          $no_qn=$r['no_of_qn'];
                          $duration=$r['tot_time'];
                          $sts=$r['s_date'];
                          $status=$r['status'];
                        $ans=$r['anskey'];
                        echo '
          
                    <td>
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm">'.$k++.'</span>
                        </div>
                      </div>
                    </td>
                    <td class="budget">'
                      .$name.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        
                        <span class="status">'.$no_qn.'</span>
                      </span>
                    </td>
                    <td>
                      <span class="status">'.$duration.'</span>
                    </td>
                    <td>';
                    if($n1==1 || $stss=="Superadmin")
                      {echo'
                    <form action="rank.php?page=1" method="post">
                        <button   class="btn btn-primary" value='.$aa.' name="but1" style="vertical-align:middle"><span>Ranking</span></button>
                        </form>
                    </td>
                    <td></td>
                     <td>
                        
                      ';
                    }
                      if($n3==1 || $stss=="Superadmin")
                      {
                     if($status=='not uploaded')
                      {echo '<td>
                      <div class="d-flex align-items-center">';
                      
                      echo'
                      <form method="post" enctype="multipart/form-data" action="pdf.php">
                     
                                <input type="file" class="btn btn-sm btn-default float-right" name="myfile"><br><br>
                               
                         <div class="card-body pt-0" style="padding-right:130px">
                          <div class="row" style="padding-left:150px">
                          <button   class="btn  btn-primary btn-sm float-right" value='.$aa.' name="submit" style=" vertical-align:middle"><span>Upload</span></button>
                                                            
                          </div> 
                           </div>      
                              </form>
                        </div></td>';
                        }
                        else
                        {echo '<td>
                      <div class="d-flex align-items-center">
                         Key Uploaded
                        </div></td>';

                        }
                      }
                      
                     

                     echo'
                                  
                    </td><td></td>';
                    echo "</tr>";
                  }
                  else if($r['e_date']<$today )
                          {
                          $name=$r['ass_name'];
                          $no_qn=$r['no_of_qn'];
                          $duration=$r['tot_time'];
                          $sts=$r['s_date'];
                          $status=$r['status'];
                       
                       echo '
          
                    <td>
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm">'.$k++.'</span>
                        </div>
                      </div>
                    </td>
                    <td class="budget">'
                      .$name.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        
                        <span class="status">'.$no_qn.'</span>
                      </span>
                    </td>
                    <td>
                      <span class="status">'.$duration.'</span>
                    </td>
                    <td>';
                    if($n1==1 || $stss=="Superadmin")
                      {echo'
                    <form action="rank.php?page=1" method="post">
                        <button   class="btn btn-primary" value='.$aa.' name="but1" style="vertical-align:middle"><span>Ranking</span></button>
                        </form>
                    </td>
                    <td></td>
                     <td>';
                   }
                     if($n3==1 || $stss=="Superadmin")
                      {
                     if($status=='not uploaded')
                      {echo '<td>
                      <div class="d-flex align-items-center">';
                      
                      echo'
                      <form method="post" enctype="multipart/form-data" action="pdf.php">
                     
                                <input type="file" class="btn btn-sm btn-default float-right" name="myfile"><br><br>
                               
                         <div class="card-body pt-0" style="padding-right:130px">
                          <div class="row" style="padding-left:150px">
                          <button   class="btn  btn-primary btn-sm float-right" value='.$aa.' name="submit" style=" vertical-align:middle"><span>Upload</span></button>
                                                            
                          </div> 
                           </div>      
                              </form>
                        </div></td>';
                      }
                      else
                        {echo '<td>
                      <div class="d-flex align-items-center">
                         Key Uploaded
                        </div></td>';

                        }
                     
                     }
                     echo'             
                    </td><td> </td>';
                    echo "</tr>";
                  }
                }
                  ?>
                    
                  
                 <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 </tr>
             

                </tbody>
              </table>
              <?php
              if($q=='')
    {
      ?>
              <nav aria-label="Page navigation example" id='nnav'>
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
      <a class="page-link" href="comp_ass.php?page=<?php echo $page-1; ?>" tabindex="-1">
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
           ><a class="page-link" href="comp_ass.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
      <a class="page-link" href="comp_ass.php?page=<?php echo $page+1; ?>">
        <i class="fa fa-angle-right"></i>
        
      </a>
    </li>
  </ul>
</nav>
          <?php
        }
          ?>
