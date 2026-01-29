<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
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
<title>24x7 Ambulance Booking | Emergency Ambulance Service | Vehicle Details</title>

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

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section class="listing_img_slider_section" style="background: var(--accent-color); padding: 20px 0;">
  <div class="container" style="max-width: 1000px;">
    <div id="listing_img_slider" class="owl-carousel">
      <?php if($result->Vimage1) { ?>
      <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" style="border-radius: 20px; box-shadow: var(--shadow-lg);"></div>
      <?php } ?>
      <?php if($result->Vimage2) { ?>
      <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" style="border-radius: 20px;"></div>
      <?php } ?>
      <?php if($result->Vimage3) { ?>
      <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" style="border-radius: 20px;"></div>
      <?php } ?>
      <?php if($result->Vimage4) { ?>
      <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" style="border-radius: 20px;"></div>
      <?php } ?>
      <?php if($result->Vimage5) { ?>
      <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive"  alt="image" style="border-radius: 20px;"></div>
      <?php } ?>
    </div>
  </div>
</section>

<!--Listing-detail-->
<section class="listing-detail section-padding">
  <div class="container">
    <div class="listing_detail_head row" style="margin-bottom: 40px; border-bottom: 2px solid #eee; padding-bottom: 30px;">
      <div class="col-md-9">
        <h1 style="color: var(--secondary-color); font-weight: 700;"><?php echo htmlentities($result->BrandName);?> : <?php echo htmlentities($result->VehiclesTitle);?></h1>
        <p style="color: var(--primary-color); font-weight: 600; font-size: 1.1em; margin-top: 10px;"><i class="fa fa-map-marker"></i> Available for Immediate Dispatch</p>
      </div>
      <div class="col-md-3 text-right">
        <div class="price_info" style="background: var(--primary-color); color: white; padding: 15px 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(225, 46, 46, 0.3);">
          <p style="font-size: 1.8em; font-weight: 800; margin: 0; color: white !important;">RWF <?php echo htmlentities($result->PricePerDay);?> </p>
          <span style="text-transform: uppercase; font-size: 0.8em; font-weight: 600; letter-spacing: 1px; color: rgba(255,255,255,0.9) !important;">Base Service Rate</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features" style="background: white; padding: 30px; border-radius: 16px; box-shadow: var(--shadow-sm); margin-bottom: 30px;">
          <ul style="display: flex; justify-content: space-around; list-style: none;">
            <li style="text-align: center;"> <i class="fa fa-shield" style="font-size: 2.5em; color: var(--primary-color); margin-bottom: 10px; display: block;"></i>
              <h5 style="margin: 0; font-weight: 700;"><?php echo htmlentities($result->ModelYear);?></h5>
              <p style="color: var(--text-muted); font-size: 0.9em;">Standard</p>
            </li>
            <li style="text-align: center;"> <i class="fa fa-plus-square" style="font-size: 2.5em; color: var(--primary-color); margin-bottom: 10px; display: block;"></i>
              <h5 style="margin: 0; font-weight: 700;"><?php echo htmlentities($result->FuelType);?></h5>
              <p style="color: var(--text-muted); font-size: 0.9em;">Energy Type</p>
            </li>
            <li style="text-align: center;"> <i class="fa fa-user-md" style="font-size: 2.5em; color: var(--primary-color); margin-bottom: 10px; display: block;"></i>
              <h5 style="margin: 0; font-weight: 700;"><?php echo htmlentities($result->SeatingCapacity);?> Staff</h5>
              <p style="color: var(--text-muted); font-size: 0.9em;">Capacity</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" style="border: none; margin-bottom: 20px;">
              <li role="presentation" class="active"><a href="#vehicle-overview" aria-controls="vehicle-overview" role="tab" data-toggle="tab" style="border-radius: 8px; font-weight: 600;">Technical Overview</a></li>
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab" style="border-radius: 8px; font-weight: 600;">Medical Equipment</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content" style="background: white; padding: 30px; border-radius: 16px; box-shadow: var(--shadow-sm);"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p style="line-height: 1.8; color: var(--text-main);"><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <div class="row">
                <div class="col-md-12">
                <table class="table" style="border: none;">
                  <tbody>
                    <tr>
                      <td style="font-weight: 600;">Advance Air Conditioning</td>
<?php if($result->AirConditioner==1)
{
?>
                      <td><i class="fa fa-check-circle" style="color: #28A745;"></i> Available</td>
<?php } else { ?> 
   <td><i class="fa fa-times-circle" style="color: #ccc;"></i> Standard</td>
   <?php } ?> </tr>

<tr>
<td style="font-weight: 600;">Anti-Lock Braking (Safety)</td>
<?php if($result->AntiLockBrakingSystem==1)
{
?>
<td><i class="fa fa-check-circle" style="color: #28A745;"></i> Active</td>
<?php } else {?>
<td><i class="fa fa-times-circle" style="color: #ccc;"></i> N/A</td>
<?php } ?>
                    </tr>

<tr>
<td style="font-weight: 600;">Power Response Steering</td>
<?php if($result->PowerSteering==1)
{
?>
<td><i class="fa fa-check-circle" style="color: #28A745;"></i> Active</td>
<?php } else { ?>
<td><i class="fa fa-times-circle" style="color: #ccc;"></i> N/A</td>
<?php } ?>
</tr>
                   
<tr>
<td style="font-weight: 600;">Driver Safety Airbag</td>
<?php if($result->DriverAirbag==1)
{
?>
<td><i class="fa fa-check-circle" style="color: #28A745;"></i> Active</td>
<?php } else { ?>
<td><i class="fa fa-times-circle" style="color: #ccc;"></i> N/A</td>
<?php } ?>
 </tr>
 
 <tr>
 <td style="font-weight: 600;">Passenger/Medic Airbag</td>
 <?php if($result->PassengerAirbag==1)
{
?>
<td><i class="fa fa-check-circle" style="color: #28A745;"></i> Active</td>
<?php } else {?>
<td><i class="fa fa-times-circle" style="color: #ccc;"></i> N/A</td>
<?php } ?>
</tr>

<tr>
<td style="font-weight: 600;">Crash Response Sensors</td>
<?php if($result->CrashSensor==1)
{
?>
<td><i class="fa fa-check-circle" style="color: #28A745;"></i> Active</td>
<?php } else { ?>
<td><i class="fa fa-times-circle" style="color: #ccc;"></i> N/A</td>
<?php } ?>
</tr>

                  </tbody>
                </table>
                </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget" style="background: white; padding: 30px; border-radius: 16px; box-shadow: var(--shadow-md); border: none;">
          <div class="widget_heading" style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <h5 style="color: var(--secondary-color); font-weight: 700;"><i class="fa fa-ambulance"></i> Request Dispatch</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <label>Service Start Date</label>
              <input type="date" class="form-control" name="fromdate" required style="border-radius: 8px;">
            </div>
            <div class="form-group">
               <label>Estimated End Date</label>
              <input type="date" class="form-control" name="todate" required style="border-radius: 8px;">
            </div>
            <div class="form-group">
               <label>Medical Requirements</label>
              <textarea rows="4" class="form-control" name="message" placeholder="Explain patient condition or specific gear needed..." required style="border-radius: 8px;"></textarea>
            </div>
          <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn btn-block" name="submit" value="Confirm Booking">
              </div>
              <?php } else { ?>
<a href="#loginform" class="btn btn-block uppercase" data-toggle="modal" data-dismiss="modal">Login to Book</a>
              <?php } ?>
          </form>
        </div>

        <div class="share_vehicle text-center" style="margin-top: 20px;">
          <p style="color: var(--text-muted);">Share Unit Info: <br>
          <a href="#" style="font-size: 1.5em; margin: 0 5px; color: var(--secondary-color);"><i class="fa fa-facebook-square"></i></a> 
          <a href="#" style="font-size: 1.5em; margin: 0 5px; color: var(--secondary-color);"><i class="fa fa-twitter-square"></i></a> 
          <a href="#" style="font-size: 1.5em; margin: 0 5px; color: var(--secondary-color);"><i class="fa fa-linkedin-square"></i></a>
          </p>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars section-padding">
      <h3 style="font-weight: 700; color: var(--secondary-color); margin-bottom: 30px;">Other Regional Units</h3>
      <div class="row">
<?php 
$bid=$_SESSION['brndid'];
$sql="SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>      
        <div class="col-md-3 col-sm-6">
          <div class="recent-car-list" style="margin-bottom: 20px;">
            <div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" style="height: 180px; width: 100%; object-fit: cover; border-top-left-radius: 16px; border-top-right-radius: 16px;" /> </a>
            </div>
            <div class="car-title-m" style="padding: 15px;">
              <h6 style="margin: 0;"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" style="font-weight: 700;"><?php echo htmlentities($result->BrandName);?> : <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
              <span class="price" style="display: block; margin-top: 10px; color: var(--primary-color); font-weight: 700;">RWF <?php echo htmlentities($result->PricePerDay);?> / Unit</span>
            </div>
          </div>
        </div>
 <?php }} ?>       

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

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

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>