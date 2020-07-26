  <?php
     session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$k=$_SESSION['k'];


include 'db.php';




$un=$_SESSION['uname'];
$t_ins=$_SESSION['t_ins'];
$dept=$_SESSION['dept'];
$class=$_SESSION['yr'];
$ins=$_SESSION['ins'];
$q = $_GET['q'];
$page=$_SESSION['pg'];
$o=1;
?>

<div class="table-responsive" id="tab">
              <form  method="post">
              <table class="table align-items-center table-flush" >
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">S.no</th>
                    <th scope="col" class="sort" data-sort="budget">Title</th>
                    <th scope="col" class="sort" data-sort="status">Total Questions</th>
                    <th scope="col" class="sort" data-sort="status">Total Duration(in min)</th>
                    <th scope="col"  class="sort" data-sort="status">status</th>
                    <th></th>
                    <th scope="col" class="sort" data-sort="comp_ass2pletion">Answer Key</th>
                    <th></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>
                    <?php

                     
                    date_default_timezone_set('Asia/Kolkata');
                    $today = date("Y-m-d"); 
                    $ttt=date('H:i:s');

                    

                    //$i=1;
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
                     if($q!='')
                     {
                      $l="SELECT * FROM post_ans where (e_date <'$today' or (e_date ='$today' and e_time<'$ttt') ) and ((t_ins like '$t_ins' and ins like '$ins')  or t_ins like'general')   and is_deleted like 'not deleted' and (ass_no LIKE  '$q%' or ass_name  LIKE  '$q%' or s_date  LIKE  '$q%'  or t_ins  LIKE  '$q%' or status LIKE  '$q%')";
                                      

                     }
                     else
                     {

                      $l="SELECT * FROM post_ans where (e_date <'$today' or (e_date ='$today' and e_time<'$ttt') ) and ((t_ins like '$t_ins' and ins like '$ins')  or t_ins like'general')   and is_deleted like 'not deleted' ";
                     $y=mysqli_query($db,$l);

                     $count=mysqli_num_rows($y);
                      $per_page=5;
                     $no_of_page=ceil($count/$per_page);
                     //echo $no_of_page;
                    
                     $start=($page-1)*$per_page;

                     $l="SELECT * FROM post_ans where (e_date <'$today' or (e_date ='$today' and e_time<'$ttt') ) and ((t_ins like '$t_ins' and ins like '$ins')  or t_ins like'general')   and is_deleted like 'not deleted'  limit $start,$per_page";
                      }

                     $y=mysqli_query($db,$l);


                     while( $r = mysqli_fetch_assoc($y))
                       { 
                        $aa=$r['ass_no'];
                         $add="select marks_scored from result where ass_no='$aa' and un='$un' ";

                             $qu1=mysqli_query($db,$add);
                             if(mysqli_num_rows($qu1)>0)
                             {
                              while( $r4 = mysqli_fetch_assoc($qu1))
                       {  
                        $marks=$r4['marks_scored'];
                      }
                             }
                             else
                             {
                                 $marks=0;
                             }
                       
                        $abc="select * from post_ans where ass_no='$aa' ";
                  
                       $rr=mysqli_query($db,$abc);
                
                          while( $r1 = mysqli_fetch_assoc($rr))
                          {
                          $name=$r1['ass_name'];
                          $no_qn=$r1['no_of_qn'];
                          $duration=$r1['tot_time'];
                          $sts=$r1['s_date'];
                          $stt=$r1['s_time'];
                          $timestamp = strtotime($sts);
                          $sts = date("d-m-Y", $timestamp);
                          $status=$r1['status'];
                          $tot_m=$no_qn * $r1['mark'];
                         
                        
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
                    ?>

                        
              
               
                    
               <a href="#exampleModalCenter" class="edit" data-toggle="modal">
              <label class="material-icons update" data-toggle="tooltip" 
             
              data-sts="<?php echo $sts; ?>"
              data-stt="<?php echo $stt; ?>"
             data-mark="<?php echo $marks; ?>"
             data-tot="<?php echo $tot_m; ?>"
             

         
              
              ><button class="btn btn-primary btn-lg " role="button"   style="width:100px">view</button></label>
            </a>
          </td>
          <?php
          echo "<td></td>"
          ?>

                  
                  <div class="modal fade" id="exampleModalCenter" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details of Assessment</h5>
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
                        <label type="text" style="text-indent:50px;">DATE OF EXAM</label>&nbsp; :&nbsp;    <input type="text" name="dateexam" id="dateexam" style="text-indent:left" readonly ><br> 
                <label type="text" style="text-indent:-3em" >TIME OF EXAM</label>  : &nbsp; <input type="time" name="timeexam" id="timeexam" readonly><br>    
                 <label type="text" style="text-indent:63px"> MARKS SCORED</label> : &nbsp;<input type="number" name="marks" id="marks"  readonly>  <br> 
                 <label type="text" style="text-indent:63px"> TOTAL MARKS</label>  : &nbsp; <input type="number" name="tot" id="tot" readonly>  <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>                       
                   
              
                      
                                         
                      



    
                    
                     <td>
                     
                     <?php
                      $files= scandir("answerkeys"); 
                     if($status=='not uploaded')
                     {
                      echo 'to be uploaded';
                      echo "</tr>";   
                     }
                     else
                     {
                      echo '<button class="btn btn-primary btn-lg" ><a style="color:white" download="'.$status.'" href="answerkeys/'.$status.'">Answer Key</a></button>'; 

                      echo '         
                    </td><td></td>';
                    echo "</tr>";
                  }

                 }

                  }                
                    
             
            
              
             
                 
                  
                  ?>
                 
                  </td></td>
                  </tr>
                
                      <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="col-4">   
            <a href="#test" class="edit" data-toggle="modal">
                       <label class="material-icons update" data-toggle="tooltip" >
                        
                   <button  class="btn btn-primary btn-lg "   style="width:300px"  >Test completed by you!!</button>
                        
                 </label>
               </a>
             </div>
                 </td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 </tr>
                      
               
                 
                 

                </tbody>
              </table>
              


               <div id="test" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form >
          <div class="">            
            <h4 class="modal-title">Test completed by you!!!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
       
 
                <table class="table align-items-center table-flush" id="tab">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">S.no</th>
                    <th scope="col" class="sort" data-sort="budget">Title</th>
                    <th scope="col" class="sort" data-sort="status">Total Questions</th>
                    <th scope="col" class="sort" data-sort="status">Total Duration(in min)</th>
                    
                   
                    <th scope="col"class="sort" data-sort="status">written on</th>
                  </tr>
                </thead>
               
                <?php
                 $l="SELECT * FROM  result where un like '$un'  ";
                      

                     $y=mysqli_query($db,$l);


                     while( $r = mysqli_fetch_assoc($y))
                       { 
                        $aa=$r['ass_no'];
                        $marks=$r['marks_scored'];

                        $abc="select * from post_ans where ass_no='$aa' ";
                       
                       $rr=mysqli_query($db,$abc);
                

                          while( $r1 = mysqli_fetch_assoc($rr))
                          {
                          $name=$r1['ass_name'];
                          $no_qn=$r1['no_of_qn'];
                          $duration=$r1['tot_time'];
                          $sts=$r1['s_date'];
                          $stt=$r1['s_time'];
                          $timestamp = strtotime($sts);
                          $sts = date("d-m-Y", $timestamp);
                          $status=$r1['status'];
                          $tot_m=$no_qn * $r1['mark'];

                         
                        
                        echo ' <tr>
          
                    <td>
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm">'.$o++.'</span>
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
                    <td>
                    <span class="status">'.$r1["created_on"].'</span>
                    </td> </tr>';
                    

                        
              }
            }
            ?>

               
                    
              

              </table>
                     
                     
                 
        </form>
      </div>
    </div>
  </div>

           </div> 
              </form>
          </div>
      </div>

  </div>
</tr>
 <nav aria-label="Page navigation example" id="nnav">
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
      <a class="page-link" href="comp_ass2.php?page=<?php echo $page-1; ?>" tabindex="-1">
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
           ><a class="page-link" href="comp_ass2.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
      <a class="page-link" href="comp_ass2.php?page=<?php echo $page+1; ?>">
        <i class="fa fa-angle-right"></i>
        
      </a>
    </li>
  </ul>
</nav>
