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
<title>Search Results | E-Emergency Medical Service</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
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
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet"> 
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
</head>
<body>

<?php include('includes/colorswitcher.php');?>
<?php include('includes/header.php');?>

<!--Page Header-->
<section class="page-header listing_page" style="background: linear-gradient(rgba(26, 43, 72, 0.85), rgba(26, 43, 72, 0.85)), url('assets/images/ambulance-banner.jpg') center/cover; padding: 80px 0;">
  <div class="container">
    <div class="page-header_wrap" style="text-align: center;">
      <div class="page-heading">
        <h1 style="color: white; font-weight: 700;">Search Results</h1>
      </div>
      <ul class="coustom-breadcrumb" style="justify-content: center;">
        <li><a href="index.php">Home</a></li>
        <li>Search</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page section-padding" style="background: var(--accent-color);">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
// Search Logic
$search = $_GET['search'];
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand WHERE tblvehicles.VehiclesTitle LIKE :search OR tblbrands.BrandName LIKE :search";
$query = $dbh -> prepare($sql);
$query -> bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p style="font-size: 1.1em; font-weight: 600;"><span><?php echo htmlentities($cnt);?> Results for "<?php echo htmlentities($search);?>"</span></p>
</div>
</div>

<?php 
if($cnt > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m gray-bg recent-car-list" style="padding: 0; overflow: hidden; display: flex; flex-wrap: wrap; margin-bottom: 30px;">
          <div class="product-listing-img" style="flex: 0 0 35%; max-width: 35%;">
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>">
              <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" style="height: 100%; object-fit: cover;" /> 
            </a> 
          </div>
          <div class="product-listing-content" style="flex: 0 0 65%; max-width: 65%; padding: 25px;">
            <h5 style="font-weight: 700; margin-bottom: 10px;">
              <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" style="color: var(--secondary-color);">
                <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?>
              </a>
            </h5>
            <p class="list-price" style="color: var(--primary-color); font-weight: 700; font-size: 1.2em;">RWF <?php echo htmlentities($result->PricePerDay);?> / Service</p>
            <ul style="margin: 15px 0; color: var(--text-muted);">
              <li><i class="fa fa-user" aria-hidden="true" style="color: var(--primary-color);"></i> <?php echo htmlentities($result->SeatingCapacity);?> seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true" style="color: var(--primary-color);"></i> <?php echo htmlentities($result->ModelYear);?> model</li>
              <li><i class="fa fa-car" aria-hidden="true" style="color: var(--primary-color);"></i> <?php echo htmlentities($result->FuelType);?></li>
            </ul>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn" style="padding: 10px 25px;">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} else { ?>
        <div class="text-center" style="padding: 50px; background: white; border-radius: 12px; box-shadow: var(--shadow-sm);">
            <i class="fa fa-search" style="font-size: 3em; color: var(--text-muted); margin-bottom: 20px;"></i>
            <h3>No results found</h3>
            <p>Try searching for 'Ambulance', 'Life Support', or specific unit names.</p>
        </div>
      <?php } ?>
         </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget" style="background: white; border-radius: 12px; padding: 25px; box-shadow: var(--shadow-sm); border: none;">
          <div class="widget_heading">
            <h5 style="color: var(--secondary-color); font-weight: 700;"><i class="fa fa-filter" aria-hidden="true"></i> Search Fleet</h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="get">
              <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search by name..." value="<?php echo htmlentities($search); ?>" style="border-radius: 8px;">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-block">Find Unit <i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget" style="background: white; border-radius: 12px; padding: 25px; box-shadow: var(--shadow-sm); margin-top: 30px; border: none;">
          <div class="widget_heading">
            <h5 style="color: var(--secondary-color); font-weight: 700;"><i class="fa fa-ambulance" aria-hidden="true"></i> Recent Units</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
<?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
              <li class="gray-bg" style="background: transparent; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; margin-bottom: 15px;">
                <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image" style="border-radius: 8px;"></a> </div>
                <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" style="color: var(--secondary-color); font-weight: 600;"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a>
                  <p class="widget_price" style="color: var(--primary-color);">RWF <?php echo htmlentities($result->PricePerDay);?> / Day</p>
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
