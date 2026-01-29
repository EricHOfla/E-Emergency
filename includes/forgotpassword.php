<?php
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div class="modal fade" id="forgotpassword">
  <div class="modal-dialog" role="document">

    <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden; box-shadow: var(--shadow-lg);">
      <div class="modal-header" style="background: #34495e; color: white; border: none; padding: 25px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; opacity: 0.8;"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="font-weight: 700; margin: 0; color: white;"><i class="fa fa-key"></i> Security Recovery</h3>
        <p style="margin: 5px 0 0; font-size: 0.9em; opacity: 0.8;">Verification required to reset medical portal password</p>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group">
                  <label style="font-weight: 600; color: var(--secondary-color);">Registered Email</label>
                  <input type="email" name="email" class="form-control" placeholder="user@healthcare.com" required="" style="border-radius: 8px;">
                </div>
                <div class="form-group">
                  <label style="font-weight: 600; color: var(--secondary-color);">Rescue Mobile Number</label>
                  <input type="text" name="mobile" class="form-control" placeholder="10 Digit Registered Mobile" required="" style="border-radius: 8px;">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label style="font-weight: 600; color: var(--secondary-color);">New Password</label>
                      <input type="password" name="newpassword" class="form-control" placeholder="••••••••" required="" style="border-radius: 8px;">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label style="font-weight: 600; color: var(--secondary-color);">Confirm Password</label>
                      <input type="password" name="confirmpassword" class="form-control" placeholder="••••••••" required="" style="border-radius: 8px;">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" value="Reset Security Credentials" name="update" class="btn btn-block" style="border-radius: 8px; font-weight: 700;">
                </div>
              </form>
              <div style="text-align: center; margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px;">
                <p style="color: var(--text-muted); font-size: 0.85em; margin-bottom: 15px;">For data privacy, we use encrypted reset protocols. Ensure your contact details are accurate.</p>
                <p><a href="#loginform" data-toggle="modal" data-dismiss="modal" style="color: var(--secondary-color); font-weight: 700;"><i class="fa fa-angle-double-left"></i> Return to Authorization</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>