<?php
session_start();
?>
<?php
include 'db.php';
extract($_POST);
$t_ins=$_SESSION['t_ins'];
$name=$_SESSION['uname'];


$query="select * from user where un like '$name'";

  $y=mysqli_query($db,$query);

if($t_ins=='clg')
{
 while( $r = mysqli_fetch_assoc($y))
 {  $s=$r['pic'];
  $n=$r['un'];
  $m=$r['fn']." ".$r['ln'];
  $a=$r['fn'];
  $b=$r['ln'];
  $c=$r['dob'];
  $d=$r['phno'];
  $e=$r['rno'];
  $f=$r['dept'];
  $g=$r['yr'];
  $h=$r['ins'];
  $abtme=$r['abtme'];
  $gen=$r['gender'];
 }
}
 else
 {
  while( $r = mysqli_fetch_assoc($y))
 {  $s=$r['pic'];
  $n=$r['un'];
  $m=$r['fn']." ".$r['ln'];
  $a=$r['fn'];
  $b=$r['ln'];
  $c=$r['dob'];
  $d=$r['phno'];
  $e=$r['rno'];
  $f=$r['gp'];
  $g=$r['class'];
  $h=$r['ins'];
  $abtme=$r['abtme'];
    $gen=$r['gender'];
 
 }
}




if(isset($_POST['fn'])&&isset($_POST['ln'])&&isset($_POST['dob'])&&isset($_POST['phno'])&&isset($_POST['ins2'])&&isset($_POST['yr'])&&isset($_POST['dept']))
{

  if($t_ins=='school')
{

$q="update user set fn='$fn',ln='$ln',dob='$dob',phno='$phno',ins='$ins2',class='$yr',gp='$dept'  where un like '$name' ";
echo json_encode(array("statusCode"=>200));
}
else
{

$q="update user set fn='$fn',ln='$ln',dob='$dob',phno='$phno',ins='$ins2',yr='$yr',dept='$dept'  where un like '$name' ";
echo json_encode(array("statusCode"=>200));

}
mysqli_query($db,$q);



}


?>

           
                 

                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="firstname" class="form-control"  value="<?php echo $a; ?>"  name="fn" required>
						<h5 id="fncheck">  </h5>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="lastname" class="form-control"  value="<?php echo $b; ?>"  name="ln" required>
						<h5 id="lncheck"></h5>
                      </div>
                    </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">D.O.B</label>
                         <input type="date" id="dob" class="form-control"  value="<?php echo $c; ?>"  name="dob" required>
                        
                     
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                         <span class="form-control" id="basic-addon3"><?php echo $n; ?></span>
                       
                       
                      </div>
                    </div>
                    
                
                  
                    
                    

                     <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">phone number</label>
                         <input type="text" id="phno" class="form-control"  value="<?php echo $d; ?>"  name="phno" required>
                        <h5 id="pncheck"></h5>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Roll number </label>
                            <input type="text" id="phno" class="form-control"  value="<?php echo $e; ?>"  name="phno" required>
                       
                    
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Academic Details</h6>
                      <div class="pl-lg-4">
                 
                        <?php
                         
                        if($t_ins=='clg')
                        {
                        echo '
                         <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Institution name</label>
                           
                         <select id="ins2"  class="form-control" name="ins2" value='; echo $h;echo ' >
              <option value="klnce" ';     if($h=="klnce")  echo 'selected="selected"'; echo ' >klnce</option>
            <option value="klnit" ';  if($h=="klnit")   echo ' selected="selected"';echo '  >klnit</option>
           <option value="velammal" ';   if($h=="velammal") echo ' selected="selected"'; echo ' >velammal</option>
           </select>
            </div>
              </div>
            </div>
             

             <div class="row">
                    
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">year</label>
                         <select id="yr"  class="form-control"   name="yr" value='; echo $g;echo ' >
                          
             <option value="1" ';  if($g=="1")  echo 'selected="selected"'; echo ' >I</option>
            <option value="2" ';  if($g=="2")   echo ' selected="selected"';echo '  >II</option>
              <option value="3" ';  if($g=="3")  echo 'selected="selected"'; echo ' >III</option>
            <option value="4" ';  if($g=="4")   echo ' selected="selected"';echo '  >VI</option>
                  </select>


                         
                      </div>
                    </div>
                    </div>
                   <div class="row">
                    
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">deparment</label>
                         <select id="dept"  class="form-control"   name="dep" value='; echo $f;echo ' >



             <option value="CSE" '; if($f=="CSE")  echo 'selected="selected"'; echo ' >CSE</option>
            <option value="IT" ';  if($f=="IT")   echo ' selected="selected"';echo '  >IT</option>
           <option value="EEE" ';   if($f=="EEE") echo ' selected="selected"'; echo ' >EEE</option>
             <option value="ECE" '; if($f=="ECE")  echo 'selected="selected"'; echo ' >ECE</option>
            <option value="MECH" ';  if($f=="MECH")   echo ' selected="selected"';echo '  >MECH</option>
           <option value="CIVIL" ';   if($f=="CIVIL") echo ' selected="selected"'; echo ' >CIVIL</option>


                                  
                  </select>


                         
                      </div>
                    </div>
                    </div>


           
                 ';
                }
                else

                {
                 echo '
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                     <label class="form-control-label" for="input-address">Institution name</label>
                      <select id="ins2"  class="form-control"    name="ins1" value='; echo $h;echo ' >
                       
                       
             <option value="tvs" ';     if($h=="tvs")  echo 'selected="selected"'; echo ' >tvs</option>
            <option value="vikaasa" ';  if($h=="vikaasa")   echo ' selected="selected"';echo '  >vikaasa</option>
           <option value="mahatma" ';   if($h=="mahatma") echo ' selected="selected"'; echo ' >mahatma</option>

           </select>
           </div>
         </div>
         </div>
                 <div class="row">
                    
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">class</label>
                         <select id="yr"  class="form-control"   name="class" value='; echo $g;echo ' >
                         
             
             <option value="11" ';  if($g=="11")  echo 'selected="selected"'; echo ' >XI</option>
            <option value="12" ';  if($g=="12")   echo ' selected="selected"';echo '  >XII</option>
          

                  </select>


                         
                      </div>
                    </div>
                    </div>



                    <div class="row">
                    
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">group</label>
                         <select id="dept"  class="form-control" required="please select class"  name="gp" value='; echo $f;echo ' >
                         <option value="" selected disabled>Please select...</option>
                  
             <option value="bio" ';     if($f=="bio")  echo 'selected="selected"'; echo ' >bio</option>
            <option value="cse" ';  if($f=="cse")   echo ' selected="selected"';echo '  >cse</option>
           <option value="commerece" ';   if($f=="commerece") echo ' selected="selected"'; echo ' >commerece</option>

                                     

                  </select>


                         
                      </div>
                    </div>
                    </div>



';



                }
                ?>

           

             </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <input type="text"   style=" width: 650px; height: 100px;"    class="form-control" id="abtme" placeholder="A few words about you ..."  name="abtme"  value='<?php echo $abtme; ?>'>
                  </div>
                  <div>
                    <button type="submit" id="next" class="btn btn-primary btn-lg"  name="submit" style="vertical-align:middle"  onclick="check();"><span>submit !!!</span></button> 
                  </div>
                </div>
              </form>
            </div>

            <script>
                   
              
               $('#firstname').keyup(function(){
             firstchk();
       });
             
        function firstchk(){
          
          var fn_val = $('#firstname').val();
            
            if(fn_val.length == ''){
              $('#fncheck').show();
              $('#fncheck').html("**please fill username");
              $('#fncheck').focus();
              $('#fncheck').css("color","red");
              valid1=false;
              
              
            }
            else{
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
                 
       
                 
        
        
        
        $('#lastname').keyup(function(){
                 lastchk();
                      });
        

                


           function lastchk(){
          
          var ln_val = $('#lastname').val();
            
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
                         
                      if((ln_val.length >10)){
              $('#lncheck').show();
              $('#lncheck').html("**please select  length within 10");
              $('#lncheck').focus();
              $('#lncheck').css("color","red");
              valid2=false;
              
              
              
            }else{
            $('#lncheck').hide();
             valid2=true;
             }        
            return valid2;                
          }


         
        $('#phno').keyup(function(){
                 phonenochk();
                      });
        

                


           function phonenochk(){
          
          var inputval = $('#phno').val();
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

              $('#sel').keyup(function(){
             select();
       });




            </script>
            