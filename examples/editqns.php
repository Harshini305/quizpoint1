<?php
session_start();
include 'db.php';
$ass_no=$_SESSION['assno'];
$k=$_SESSION['k'];
extract($_POST);
if(isset($_POST['deleteid'])&&isset($_POST['ass']))
{
  $uid=$_POST['deleteid'];
  $ass_no=$_POST['ass'];
  mysqli_query($db,"DELETE FROM qn  WHERE ass_no = '$ass' and qn_no= '$uid';");
  echo "<script type= 'text/javascript'>alert('Data Deleted Successfully ')</script>";
}
if(isset($_POST['qno_u'])&&isset($_POST['ass'])&&isset($_POST['qn_u'])&&isset($_POST['ans_u']))
{   

  $qq="UPDATE qn SET qn = '$qn_u', ans_key ='$ans_u' WHERE ass_no='$ass' and qn_no='$qno_u';";
if (mysqli_query($db,$qq)) {   
        echo "<script type= 'text/javascript'>alert('Profile Updated')</script>";
     }
 }
 if(isset($_POST['ass_no'])&&isset($_POST['qno'])&&isset($_POST['qn'])&&isset($_POST['ans']))
 {

    $sql="INSERT INTO `qn`  VALUES ( '$ass_no', '$qno', '$qn', '$ans');";
    if ($db->query($sql) === TRUE) {
     
     echo "<script type= 'text/javascript'>alert('Registered successfully')</script>";
   }
 }
 
?>
<?php



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
}                    echo'<div class="table-responsive">
              
              <table class="table align-items-center table-flush table-dark">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Qn.no</th>
                    <th scope="col" class="sort" data-sort="budget">Question</th>
                    <th scope="col" class="sort" data-sort="status">Answer Key</th>
                    
                    <th></th>
                    <th scope="col" class="sort" data-sort="completion">Option</th>
                    <th></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>';
                     $query="select * from qn where ass_no= $ass_no order by qn_no asc";
                     $res=mysqli_query($db,$query);
                     $count=mysqli_num_rows($res);
                     $per_page=5;
                     $no_of_page=ceil($count/$per_page);
                     $start=($page-1)*$per_page;
                     $query="select * from qn where ass_no= $ass_no order by qn_no asc limit $start,$per_page";
                     
                     $y=mysqli_query($db,$query);
                     while($r=mysqli_fetch_assoc($y))
                       {  $aa=$r['ass_no'];
                          $qno=$r['qn_no'];
                          $qn=$r['qn'];
                          $ans=$r['ans_key'];
                           
                        echo '
          
                    <td>
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm">'.$k++.'</span>
                        </div>
                      </div>
                    </td>
                    <td class="budget">'
                      .$qn.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        
                        <span class="status">'.$ans.'</span>
                      </span>
                    </td>
                    
                     <td>'?>
                        <a href="#editModal" class="edit" data-toggle="modal">
              <i class="material-icons update" data-toggle="tooltip" 
              data-id="<?php echo $aa ; ?>"
              data-qno="<?php echo $qno; ?>"
              data-qn="<?php echo $qn; ?>"
              data-ans="<?php echo $ans; ?>"
              
              title="Edit"><button class="btn btn-primary">Edit</button></i>
            </a>
                                         
                      
                        <div id="editModal" class="modal fade">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <form id="update_form">
          <div class="modal-header">            
            <h4 class="modal-title">Edit User</h4>
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal" data-dismiss="modal" aria-hidden="true">&times;</span> 
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_u" name="id"  class="form-control" required> 
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Question no</label>
                       <input type="text" id="qno_u" name="qno"  class="form-control" style="width:425px;" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Question</label>
                        <textarea type="text" id="qn_u" name="qn" value="qn_u" class="form-control" style="width:425px;" required></textarea>
						
                      </div>
                    </div>
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Answer</label>
                      <input type="text" id="ans_u" name="ans" value="ans_u"  class="form-control" style="width:425px;border-bottom: 1px solid grey;" required>
						
                      </div>
                    </div>
			
                     
          </div>
          <div class="modal-footer">
          <input type="hidden" value="2" name="type">
            <input type="button" class="btn btn-default" style="width: 100%" data-dismiss="modal" value="Cancel">
            <button type="submit" class="btn btn-info" onclick="updateqns(<?php echo $aa ?> )"  id="update">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
                                    
                      <?php 
                      echo'
                    </td>
                      <td> 
                        <button   class="btn btn-danger" value='.$aa.' name="but11" style="vertical-align:middle" onclick="remove('.$qno.','.$aa.')"><span>Remove</span></button> </td>
                                         
                      
                    </td><td></td><td></td>';
                    echo "</tr>";
                  }
                  ?> 
                </tbody>
              </table>
              <nav aria-label="Page navigation example">
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
      <a class="page-link" href="edit_qns.php?page=<?php echo $page-1; ?>" tabindex="-1">
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
           ><a class="page-link" href="edit_qns.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
      <a class="page-link" href="edit_qns.php?page=<?php echo $page+1; ?>">
        <i class="fa fa-angle-right"></i>
        
      </a>
    </li>
  </ul>
</nav>