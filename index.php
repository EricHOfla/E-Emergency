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
<title>24x7 Ambulance Booking | E-Emergency Medical Service</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/professional.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet"> 
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
</head>
<body>

<?php include('includes/colorswitcher.php');?>
<?php include('includes/header.php');?>

<!-- Hero Banner -->
<section id="banner" class="banner-section" style="background: linear-gradient(rgba(26, 43, 72, 0.4), rgba(26, 43, 72, 0.4)), url('assets/images/ambulance-banner.jpg') center/cover; min-height: 85vh; display: flex; align-items: center;">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="banner_content">
          <span class="status-badge status-emergency" style="margin-bottom: 15px;">24/7 Rapid Response Network</span>
          <h1 style="font-size: 3.5rem; line-height: 1.1;">Precision Medical <br><span style="color: var(--primary-color);">Emergency</span> Dispatch</h1>
          <p style="font-size: 1.25rem; color: var(--text-muted); margin-bottom: 35px; line-height: 1.6;">E-Emergency provides high-tech ambulance solutions with ACLS equipment and expert medics. We prioritize speed, safety, and life-saving care above all else.</p>
          <div class="banner_btns" style="display: flex; gap: 15px;">
            <a href="car-listing.php" class="btn btn-lg">Book Ambulance Now <i class="fa fa-ambulance"></i></a>
            <a href="contact-us.php" class="btn btn-lg btn-outline-dark" style="background: transparent; border: 2px solid var(--secondary-color) !important; color: var(--secondary-color) !important;">Emergency Hotline</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Aarogya -->
<section class="section-padding" style="background: var(--accent-color);">
  <div class="container">
    <div class="section-header text-center" style="margin-bottom: 60px;">
      <h2 style="font-size: 2.5rem;">The <span style="color: var(--primary-color);">E-Emergency</span> Standard</h2>
      <p>Redefining medical transport with cutting-edge technology and compassionate care.</p>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="feature-box">
          <div class="icon-wrap"><i class="fa fa-heartbeat"></i></div>
          <h4 style="font-weight: 700;">ACLS Equipped</h4>
          <p style="color: var(--text-muted);">All units feature Advanced Cardiac Life Support gear including defibrillators and oxygen cabinets.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-box">
          <div class="icon-wrap"><i class="fa fa-user-md"></i></div>
          <h4 style="font-weight: 700;">Expert Medics</h4>
          <p style="color: var(--text-muted);">Manned by certified paramedics and emergency technicians with years of complex crisis experience.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-box">
          <div class="icon-wrap"><i class="fa fa-flash"></i></div>
          <h4 style="font-weight: 700;">Zero Latency</h4>
          <p style="color: var(--text-muted);">Our proprietary regional dispatch algorithm ensures the closest unit reaches you in record time.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- How it works -->
<section class="section-padding">
  <div class="container">
    <div class="section-header text-center" style="margin-bottom: 60px;">
      <h2 style="font-size: 2.5rem;">Responsive <span style="color: var(--primary-color);">Dispatch Protocol</span></h2>
      <p>Our streamlined 4-step process ensures a rapid response during critical medical minutes.</p>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="how-it-works-card" style="text-align: center;">
          <div class="how-it-works-icon"><i class="fa fa-map-marker"></i></div>
          <h5 style="font-weight: 700;">1. Geo-Location</h5>
          <p style="font-size: 0.9rem; color: var(--text-muted);">Pinpoint medical emergency location via our patient portal or verified hotline.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="how-it-works-card" style="text-align: center;">
          <div class="how-it-works-icon"><i class="fa fa-ambulance"></i></div>
          <h5 style="font-weight: 700;">2. Smart Dispatch</h5>
          <p style="font-size: 0.9rem; color: var(--text-muted);">The nearest available unit with appropriate life-support equipment is mobilized.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="how-it-works-card" style="text-align: center;">
          <div class="how-it-works-icon"><i class="fa fa-stethoscope"></i></div>
          <h5 style="font-weight: 700;">3. Field Care</h5>
          <p style="font-size: 0.9rem; color: var(--text-muted);">Specialized paramedics provide on-site stabilization and advanced monitoring.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="how-it-works-card" style="text-align: center;">
          <div class="how-it-works-icon"><i class="fa fa-hospital-o"></i></div>
          <h5 style="font-weight: 700;">4. Hospitalization</h5>
          <p style="font-size: 0.9rem; color: var(--text-muted);">Rapid transit to the nearest regional medical facility for definitive specialized care.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Advanced Care Fleet -->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center" style="margin-bottom: 50px;">
      <h2>Advanced <span style="color: var(--primary-color);">Care Units</span></h2>
      <p>Explore our specialized regional fleet tailored for diverse medical requirements.</p>
    </div>
    <div class="row"> 
<?php 
$sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand LIMIT 3";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  
<div class="col-md-4">
  <div class="recent-car-list" style="margin-bottom: 30px;">
    <div class="car-info-box"> 
      <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" style="height: 220px; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-top-right-radius: 16px;">
      </a>
      <div style="position: absolute; top: 15px; right: 15px;">
        <span class="status-badge status-active">Available</span>
      </div>
    </div>
    <div class="car-title-m" style="padding: 25px;">
      <span style="color: var(--primary-color); font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px;"><?php echo htmlentities($result->BrandName);?></span>
      <h5 style="margin: 5px 0 15px; font-weight: 700;"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" style="color: var(--secondary-color);"><?php echo htmlentities($result->VehiclesTitle);?></a></h5>
      <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 15px;">
        <span style="font-size: 1.25rem; font-weight: 800; color: var(--secondary-color);">RWF <?php echo htmlentities($result->PricePerDay);?> <small style="font-weight: 500; font-size: 0.75rem; color: var(--text-muted);">/ Service</small></span>
        <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn btn-sm" style="padding: 8px 20px !important;">Book Unit</a>
      </div>
    </div>
  </div>
</div>
<?php }}?>
    </div>
    <div class="text-center" style="margin-top: 20px;">
        <a href="car-listing.php" style="color: var(--secondary-color); font-weight: 700; text-decoration: none; border-bottom: 2px solid var(--primary-color); padding-bottom: 5px;">View Entire Response Fleet <i class="fa fa-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- Impact Numbers -->
<section class="section-padding fun-facts-section" style="background: linear-gradient(135deg, var(--secondary-color), #2c3e50); margin: 0; width: 100%; border-radius: 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 text-center">
          <h2 class="stat-number">98%</h2>
          <p class="stat-label">ON-TIME ARRIVAL</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center">
          <h2 class="stat-number">15m</h2>
          <p class="stat-label">RESPONSE TIME</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center">
          <h2 class="stat-number">500+</h2>
          <p class="stat-label">ACTIVE UNITS</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center">
          <h2 class="stat-number">24/7</h2>
          <p class="stat-label">COMMAND CENTER</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section-padding testimonial-section" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/images/ambulance-banner.jpg') center/cover;">
  <div class="container div_zindex">
    <div class="section-header text-center" style="margin-bottom: 50px;">
      <h2 style="color: white;">Patient <span style="color: var(--primary-color);">Trust</span></h2>
      <p style="color: rgba(255,255,255,0.8);">Real feedback from our regional medical response operations.</p>
    </div>
    <div class="row">
<?php 
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=1 LIMIT 3";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="col-md-4">
          <div class="testimonial-m">
            <div class="testimonial-content">
              <p style="font-size: 0.95rem; line-height: 1.8;">"<?php echo htmlentities($result->Testimonial);?>"</p>
              <h5 style="margin-top: 25px; color: var(--primary-color); font-weight: 700;"><?php echo htmlentities($result->FullName);?></h5>
              <small style="opacity: 0.7; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Verified Patient</small>
            </div>
          </div>
        </div>
<?php }} ?>
    </div>
  </div>
</section>

<!-- Emergency Call to Action -->
<section class="emergency-cta">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 30px;">
            <div>
                <h3 class="cta-title">Facing a Medical Emergency?</h3>
                <p class="cta-text">Our units are standing by across the region for immediate dispatch. Contact us now.</p>
            </div>
            <a href="contact-us.php" class="btn btn-lg" style="background: var(--secondary-color); color: white; border: none; padding: 18px 45px !important; font-size: 1.1rem; box-shadow: 0 10px 20px rgba(0,0,0,0.2);">Call 24/7 Helpline <i class="fa fa-phone"></i></a>
        </div>
    </div>
</section>

<?php include('includes/footer.php');?>
<?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<?php include('includes/forgotpassword.php');?>

<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>