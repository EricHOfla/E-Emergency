<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>

<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden; box-shadow: var(--shadow-lg);">
      <div class="modal-header" style="background: var(--secondary-color); color: white; border: none; padding: 25px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; opacity: 0.8;"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="font-weight: 700; margin: 0; color: white;"><i class="fa fa-user-plus"></i> Patient Registration</h3>
        <p style="margin: 5px 0 0; font-size: 0.9em; opacity: 0.8;">Register to join our emergency medical network</p>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <label style="font-weight: 600; color: var(--secondary-color);">Full Name</label>
                  <input type="text" class="form-control" name="fullname" placeholder="Enter Legal Name" required="required" style="border-radius: 8px;">
                </div>
                <div class="form-group">
                  <label style="font-weight: 600; color: var(--secondary-color);">Emergency Contact No.</label>
                  <input type="text" class="form-control" name="mobileno" placeholder="10 Digit Mobile Number" maxlength="10" required="required" style="border-radius: 8px;">
                </div>
                <div class="form-group">
                  <label style="font-weight: 600; color: var(--secondary-color);">Email Address</label>
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="user@healthcare.com" required="required" style="border-radius: 8px;">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label style="font-weight: 600; color: var(--secondary-color);">Security Password</label>
                      <input type="password" class="form-control" name="password" placeholder="••••••••" required="required" style="border-radius: 8px;">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label style="font-weight: 600; color: var(--secondary-color);">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmpassword" placeholder="••••••••" required="required" style="border-radius: 8px;">
                    </div>
                  </div>
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree" style="font-size: 0.9em;">I Agree with the <a href="#" style="color: var(--primary-color);">Medical Service Terms</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Complete Registration" name="signup" id="submit" class="btn btn-block" style="border-radius: 8px; font-weight: 700;">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: center; border-top: 1px solid #eee; padding: 20px;">
        <p>Already have an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal" style="color: var(--primary-color); font-weight: 700;">Authorized Login</a></p>
      </div>
    </div>
  </div>
</div>
