<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
// Mark notifications as read
$useremail = $_SESSION['login'];
$sql_read = "UPDATE tblbooking SET UserRead=1 WHERE userEmail=:useremail AND Status != 0";
$query_read = $dbh->prepare($sql_read);
$query_read->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query_read->execute();
?><!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="ambulance booking, emergency services, ambulance rental">
<meta name="description" content="Manage and track your ambulance bookings with Emergency Ambulance Service">
<title>My Bookings - Emergency Ambulance Service</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/professional.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet"> 
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
        <h1 style="color: white; font-weight: 700;">Deployment History</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>My Requests</li>
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
          <h5 class="uppercase" style="font-weight: 700; color: var(--secondary-color); border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; display: inline-block; margin-bottom: 30px;">Active & Past Bookings</h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing" style="list-style: none; padding: 0;">
<?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li style="background: var(--accent-color); border-radius: 12px; padding: 20px; margin-bottom: 20px; display: flex; gap: 20px; align-items: flex-start; border: 1px solid #eee;">
                <div class="vehicle_img" style="flex: 0 0 150px;"> 
                    <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>">
                        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image" style="width: 100%; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </a> 
                </div>
                <div class="vehicle_title" style="flex: 1;">
                  <h6 style="margin: 0;"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>" style="color: var(--secondary-color); font-weight: 700; font-size: 1.2em;"><?php echo htmlentities($result->BrandName);?> : <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                  <p style="margin: 10px 0; font-size: 0.9em; color: var(--text-muted);">
                    <i class="fa fa-calendar" style="color: var(--primary-color);"></i> <b>Dispatch:</b> <?php echo htmlentities($result->FromDate);?> &nbsp; | &nbsp;
                    <i class="fa fa-calendar" style="color: var(--primary-color);"></i> <b>Return:</b> <?php echo htmlentities($result->ToDate);?>
                  </p>
                  <div style="background: white; padding: 10px; border-left: 3px solid var(--secondary-color); border-radius: 4px; font-size: 0.85em; color: var(--text-main);">
                    <strong>Mission Notes:</strong> <?php echo htmlentities($result->message);?>
                  </div>
                </div>
                <div class="vehicle_status" style="flex: 0 0 140px; text-align: right;"> 
                <?php if($result->Status==1)
                { ?>
                  <span style="background: #28a745; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">Confirmed</span>
                <?php } else if($result->Status==2) { ?>
                  <span style="background: #dc3545; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">Cancelled</span>
                <?php } else { ?>
                  <span style="background: #ffc107; color: #333; padding: 5px 12px; border-radius: 20px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">Awaiting</span>
                <?php } ?>
                </div>
              </li>
              <?php } } else { ?>
                <div style="text-align: center; padding: 40px;">
                    <i class="fa fa-ambulance" style="font-size: 3em; color: #eee; margin-bottom: 20px;"></i>
                    <p style="color: var(--text-muted);">No active response units found in your history.</p>
                    <a href="car-listing.php" class="btn" style="margin-top: 10px;">Book Now</a>
                </div>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }} ?>

<!--/my-bookings--> 
<?php include('includes/footer.php');?>

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