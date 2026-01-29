<?php
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$results->FullName;
$currentpage=$_SERVER['REQUEST_URI'];
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">

    <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden; box-shadow: var(--shadow-lg);">
      <div class="modal-header" style="background: var(--secondary-color); color: white; border: none; padding: 25px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; opacity: 0.8;"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="font-weight: 700; margin: 0; color: white;"><i class="fa fa-user-circle-o"></i> Member Access</h3>
        <p style="margin: 5px 0 0; font-size: 0.9em; opacity: 0.8;">Sign in to manage your medical requests</p>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12">
              <form method="post">
                <div class="form-group">
                  <label style="font-weight: 600; color: var(--secondary-color);">Email Identifier</label>
                  <input type="email" class="form-control" name="email" placeholder="registered-email@example.com" style="border-radius: 8px; height: 45px;">
                </div>
                <div class="form-group">
                   <label style="font-weight: 600; color: var(--secondary-color);">Security Password</label>
                  <input type="password" class="form-control" name="password" placeholder="••••••••" style="border-radius: 8px; height: 45px;">
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Authorize Access" class="btn btn-block" style="border-radius: 8px; font-weight: 700;">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: center; border-top: 1px solid #eee; padding: 20px;">
        <p style="margin-bottom: 5px; color: var(--text-main);">New Patient? <a href="#signupform" data-toggle="modal" data-dismiss="modal" style="color: var(--primary-color); font-weight: 700;">Create Health Account</a></p>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" style="color: var(--text-muted); font-size: 0.9em;">Recovery Security Password</a></p>
      </div>
    </div>
  </div>
</div>