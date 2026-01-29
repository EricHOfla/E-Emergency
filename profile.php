<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$sql="update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title> Portal | My Profile</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/professional.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet"> 
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header profile_page" style="background: linear-gradient(rgba(26, 43, 72, 0.6), rgba(26, 43, 72, 0.6)), url('assets/images/ambulance-banner.jpg') center/cover;">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1 style="color: white; font-weight: 700;">Patient Portal</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>My Profile</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Page Header--> 


<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($results)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages section-padding">
  <div class="container">
    <div class="user_profile_info" style="background: white; border-radius: 16px; box-shadow: var(--shadow-md); padding: 40px; margin-bottom: 40px; display: flex; align-items: center; gap: 30px;">
      <div class="upload_user_logo" style="flex: 0 0 100px;"> 
        <div style="width: 100px; height: 100px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid var(--primary-color);">
            <i class="fa fa-user" style="font-size: 3em; color: var(--secondary-color);"></i>
        </div>
      </div>

      <div class="dealer_info" style="flex: 1;">
        <h5 style="color: var(--secondary-color); font-weight: 700; font-size: 1.5em; margin: 0;"><?php echo htmlentities($result->FullName);?></h5>
        <p style="color: var(--text-muted); margin-top: 5px;"><i class="fa fa-map-marker"></i> <?php echo htmlentities($result->Address);?>, <?php echo htmlentities($result->City);?> <?php echo htmlentities($result->Country);?></p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <?php include('includes/sidebar.php');?>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="profile_wrap" style="background: white; border-radius: 16px; box-shadow: var(--shadow-sm); padding: 40px;">
          <h5 class="uppercase" style="font-weight: 700; color: var(--secondary-color); border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; display: inline-block;">General Settings</h5>
          <?php  
         if($msg){?><div class="succWrap" style="margin-top: 20px;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post" style="margin-top: 30px;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Full Name</label>
                  <input class="form-control" name="fullname" value="<?php echo htmlentities($result->FullName);?>" id="fullname" type="text"  required style="border-radius: 8px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Email Address (Read Only)</label>
                  <input class="form-control" value="<?php echo htmlentities($result->EmailId);?>" name="emailid" id="email" type="email" required readonly style="border-radius: 8px; background: var(--accent-color);">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Phone Number</label>
                  <input class="form-control" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo);?>" id="phone-number" type="text" required style="border-radius: 8px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Date of Birth</label>
                  <input class="form-control" value="<?php echo htmlentities($result->dob);?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text" style="border-radius: 8px;">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control" name="address" rows="3" style="border-radius: 8px;"><?php echo htmlentities($result->Address);?></textarea>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Country</label>
                  <input class="form-control"  id="country" name="country" value="<?php echo htmlentities($result->Country);?>" type="text" style="border-radius: 8px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">City</label>
                  <input class="form-control" id="city" name="city" value="<?php echo htmlentities($result->City);?>" type="text" style="border-radius: 8px;">
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 20px;">
              <button type="submit" name="updateprofile" class="btn">Save Profile Updates <i class="fa fa-check-circle"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }} ?>

<!--/Profile-setting--> 

<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
<?php } ?>