<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>24x7 Ambulance Booking | Emergency Ambulance Service</title>

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
<section class="page-header listing_page" style="background: linear-gradient(rgba(26, 43, 72, 0.6), rgba(26, 43, 72, 0.6)), url('assets/images/ambulance-banner.jpg') center/cover;">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1 style="color: white; font-weight: 700;"><i class="fa fa-ambulance"></i> Rescue & Response Fleet</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Emergency Units</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper" style="border: none; background: var(--accent-color); border-radius: 12px; margin-bottom: 30px;">
          <div class="sorting-count">
<?php 
//Query for Listing count
$sql = "SELECT id from tblvehicles";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p style="font-weight: 600; color: var(--secondary-color);"><i class="fa fa-info-circle"></i> Showing <span><?php echo htmlentities($cnt);?> Active Emergency Units</span></p>
</div>
</div>

<?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m" style="background: white; border-radius: 16px; box-shadow: var(--shadow-md); margin-bottom: 30px; overflow: hidden; display: flex; flex-wrap: wrap;">
          <div class="product-listing-img" style="flex: 0 0 300px; max-width: 100%;"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" style="height: 100%; object-fit: cover;"/> 
          </div>
          <div class="product-listing-content" style="flex: 1; padding: 30px;">
            <h5 style="margin-top: 0;"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" style="color: var(--secondary-color); font-weight: 700;"><?php echo htmlentities($result->BrandName);?> : <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
            <p class="list-price" style="margin: 10px 0;">
                <span style="background: var(--accent-color); color: var(--primary-color); padding: 5px 15px; border-radius: 20px; font-weight: 700; font-size: 1.1em;">RWF <?php echo htmlentities($result->PricePerDay);?> / Service</span>
            </p>
            <ul style="padding: 15px 0; display: flex; gap: 20px; border-bottom: 1px solid #eee; margin-bottom: 15px; list-style: none;">
              <li><i class="fa fa-user-md" aria-hidden="true" style="color: var(--primary-color);"></i> <strong><?php echo htmlentities($result->SeatingCapacity);?></strong> Medics</li>
              <li><i class="fa fa-medkit" aria-hidden="true" style="color: var(--primary-color);"></i> <strong>Equipped</strong></li>
              <li><i class="fa fa-plus-square" aria-hidden="true" style="color: var(--primary-color);"></i> <strong><?php echo htmlentities($result->FuelType);?></strong></li>
            </ul>
            <p style="color: var(--text-muted); font-size: 0.95em;"><?php echo substr($result->VehiclesOverview,0,150);?>...</p>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn" style="margin-top: 15px;">View Full Specs <i class="fa fa-chevron-right"></i></a>
          </div>
        </div>
      <?php }} ?>
         </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget" style="border-radius: 16px; overflow: hidden; border: none; box-shadow: var(--shadow-md);">
          <div class="widget_heading" style="background: var(--secondary-color); color: white; padding: 15px 20px;">
            <h5 style="margin: 0; font-size: 1.1em;"><i class="fa fa-filter"></i> Dispatch Search </h5>
          </div>
          <div class="sidebar_filter" style="padding: 20px;">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <label>Service Category</label>
                <select class="form-control" name="brand">
                  <option>Any Unit Type</option>

                  <?php $sql = "SELECT * from  tblbrands ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>
                 
                </select>
              </div>
              <div class="form-group select">
                 <label>Emergency Support</label>
                <select class="form-control" name="fueltype">
                  <option>Select Gear Type</option>
<option value="Petrol">Oxygen Enabled</option>
<option value="Diesel">ICU Equipped</option>
<option value="CNG">Basic Life Support</option>
                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-block">Find nearest unit</button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget" style="border-radius: 16px; overflow: hidden; border: none; box-shadow: var(--shadow-md); margin-top: 30px;">
          <div class="widget_heading" style="background: var(--secondary-color); color: white; padding: 15px 20px;">
             <h5 style="margin: 0; font-size: 1.1em;"><i class="fa fa-heartbeat"></i> Latest Deployment</h5>
          </div>
          <div class="recent_addedcars">
            <ul style="list-style: none; padding: 0;">
<?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

              <li style="padding: 15px; border-bottom: 1px solid #eee; display: flex; gap: 15px;">
                <div class="recent_post_img" style="flex: 0 0 70px;"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image" style="width: 100%; border-radius: 8px;"></a> </div>
                <div class="recent_post_title" style="flex: 1;"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" style="color: var(--secondary-color); font-weight: 600; font-size: 0.9em;"><?php echo htmlentities($result->BrandName);?> - <?php echo htmlentities($result->VehiclesTitle);?></a>
                  <p class="widget_price" style="color: var(--primary-color); font-weight: 700; margin-top: 5px;">RWF <?php echo htmlentities($result->PricePerDay);?></p>
                </div>
              </li>
              <?php }} ?>
              
            </ul>
          </div>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

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
