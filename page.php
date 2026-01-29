<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="emergency ambulance, medical transport, Rwanda">
<meta name="description" content="E-Emergency Ambulance Service - Professional Medical Transport">
<title>E-Emergency Ambulance Service | Page Details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--Professional Style -->
<link rel="stylesheet" href="assets/css/professional.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
                      <?php 
$pagetype = isset($_GET['type']) ? strtolower(trim($_GET['type'])) : 'aboutus';
$pagetype = $pagetype !== '' ? $pagetype : 'aboutus';
$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="page-header aboutus_page" style="background: linear-gradient(rgba(26, 43, 72, 0.85), rgba(26, 43, 72, 0.85)), url('assets/images/ambulance-banner.jpg') center/cover; padding: 80px 0;">
  <div class="container">
    <div class="page-header_wrap" style="text-align: center;">
      <div class="page-heading">
        <h1 style="color: white; font-weight: 700; font-size: 2.5em; margin-bottom: 15px;"><?php echo htmlentities($result->PageName); ?></h1>
      </div>
      <ul class="coustom-breadcrumb" style="display: inline-flex; gap: 10px; list-style: none; padding: 0;">
        <li><a href="index.php" style="color: rgba(255,255,255,0.8);">Home</a></li>
        <li style="color: white;">/</li>
        <li style="color: var(--primary-color); font-weight: 600;"><?php echo htmlentities($result->PageName); ?></li>
      </ul>
    </div>
  </div>
</section>
<section class="about_us section-padding" style="padding: 60px 0; background: var(--accent-color);">
  <div class="container">
    <div class="content-wrap" style="background: white; padding: 50px; border-radius: 16px; box-shadow: var(--shadow-md);">
      <div class="section-header" style="margin-bottom: 30px; border-bottom: 3px solid var(--primary-color); padding-bottom: 20px; display: inline-block;">
        <h2 style="color: var(--secondary-color); font-weight: 700; margin: 0;"><?php echo htmlentities($result->PageName); ?></h2>
      </div>
      <div class="page-content" style="color: var(--text-main); line-height: 1.9; font-size: 1.05em;">
        <?php echo $result->detail; ?>
      </div>
    </div>
  </div>
   <?php } } else { ?>
  <section class="page-header" style="background: linear-gradient(rgba(26, 43, 72, 0.85), rgba(26, 43, 72, 0.85)), url('assets/images/ambulance-banner.jpg') center/cover; padding: 80px 0;">
    <div class="container text-center">
      <h1 style="color: white; font-weight: 700;">Page Not Found</h1>
    </div>
  </section>
  <section class="about_us section-padding" style="padding: 60px 0; background: var(--accent-color);">
    <div class="container">
      <div class="content-wrap" style="background: white; padding: 50px; border-radius: 16px; box-shadow: var(--shadow-md); text-align: center;">
        <i class="fa fa-exclamation-triangle" style="font-size: 4em; color: #ffc107; margin-bottom: 20px;"></i>
        <h2 style="color: var(--secondary-color); font-weight: 700;">Content Not Available</h2>
        <p style="color: var(--text-muted); line-height: 1.8; font-size: 1.05em;">We couldn't find content for this page yet. Please add it in the admin panel under Manage Pages, or try another page.</p>
        <a href="index.php" class="btn" style="margin-top: 20px;">Return Home</a>
      </div>
    </div>
  </section>
   <?php } ?>
</section>
<!-- /About-us--> 





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