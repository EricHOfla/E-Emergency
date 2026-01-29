<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

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
<title>Contact Us | Emergency Ambulance Service</title>

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
<section class="page-header contactus_page" style="background: linear-gradient(rgba(26, 43, 72, 0.6), rgba(26, 43, 72, 0.6)), url('assets/images/ambulance-banner.jpg') center/cover;">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1 style="color: white; font-weight: 700;"><i class="fa fa-phone"></i> Regional Response Center</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Contact Helpline</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Page Header--> 

<!--Contact-us-->
<section class="contact_us section-padding">
  <div class="container">
    <div  class="row">
      <div class="col-md-6">
        <h3 style="color: var(--secondary-color); font-weight: 700; margin-bottom: 25px;"><i class="fa fa-envelope" style="color: var(--primary-color);"></i> Send Emergency Query</h3>
          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="contact_form" style="background: white; border-radius: 16px; box-shadow: var(--shadow-md); padding: 30px;">
          <form  method="post">
            <div class="form-group">
              <label class="control-label">Full Name <span style="color: var(--primary-color);">*</span></label>
              <input type="text" name="fullname" class="form-control" id="fullname" required style="border-radius: 8px;">
            </div>
            <div class="form-group">
              <label class="control-label">Email Address <span style="color: var(--primary-color);">*</span></label>
              <input type="email" name="email" class="form-control" id="emailaddress" required style="border-radius: 8px;">
            </div>
            <div class="form-group">
              <label class="control-label">Mobile Number <span style="color: var(--primary-color);">*</span></label>
              <input type="text" name="contactno" class="form-control" id="phonenumber" required style="border-radius: 8px;">
            </div>
            <div class="form-group">
              <label class="control-label">Medical Message <span style="color: var(--primary-color);">*</span></label>
              <textarea class="form-control" name="message" rows="4" required style="border-radius: 8px;"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-block" type="submit" name="send">Dispatch Query <i class="fa fa-paper-plane"></i></button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <h3 style="color: var(--secondary-color); font-weight: 700; margin-bottom: 25px;"><i class="fa fa-info-circle" style="color: var(--primary-color);"></i> Response Center Info</h3>
        <div class="contact_detail" style="background: var(--accent-color); padding: 40px; border-radius: 16px; box-shadow: var(--shadow-sm);">
              <?php 
$sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
          <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 35px; display: flex; gap: 20px; align-items: center;">
              <div class="icon_wrap" style="flex: 0 0 60px; height: 60px; background-color: var(--secondary-color); border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1);"><i class="fa fa-map-marker" aria-hidden="true" style="color: white; font-size: 1.5em;"></i></div>
              <div class="contact_info_m" style="flex: 1;"><strong style="color: var(--secondary-color);">Operational Base</strong><br><span style="color: var(--text-muted);"><?php echo htmlentities($result->Address); ?></span></div>
            </li>
            <li style="margin-bottom: 35px; display: flex; gap: 20px; align-items: center;">
              <div class="icon_wrap" style="flex: 0 0 60px; height: 60px; background-color: var(--primary-color); border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(225, 46, 46, 0.3);"><i class="fa fa-phone" aria-hidden="true" style="color: white; font-size: 1.5em;"></i></div>
              <div class="contact_info_m" style="flex: 1;"><strong style="color: var(--secondary-color);">Emergency Hotline</strong><br><a href="tel:<?php echo htmlentities($result->ContactNo); ?>" style="color: var(--primary-color); text-decoration: none; font-weight: 700; font-size: 1.2em;"><?php echo htmlentities($result->ContactNo); ?></a></div>
            </li>
            <li style="display: flex; gap: 20px; align-items: center;">
              <div class="icon_wrap" style="flex: 0 0 60px; height: 60px; background-color: #34495e; border-radius: 12px; display: flex; align-items: center; justify-content: center;"><i class="fa fa-envelope-o" aria-hidden="true" style="color: white; font-size: 1.5em;"></i></div>
              <div class="contact_info_m" style="flex: 1;"><strong style="color: var(--secondary-color);">Medical Support Email</strong><br><a href="mailto:<?php echo htmlentities($result->EmailId); ?>" style="color: var(--secondary-color); text-decoration: none; word-break: break-all; opacity: 0.8;"><?php echo htmlentities($result->EmailId); ?></a></div>
            </li>
          </ul>
        <?php }} ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Contact-us--> 


<!--Footer -->
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

<!-- Emergency Ambulance Service -->
</html>
