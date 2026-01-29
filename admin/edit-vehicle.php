<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$airconditioner=$_POST['airconditioner'];
$powerdoorlocks=$_POST['powerdoorlocks'];
$antilockbrakingsys=$_POST['antilockbrakingsys'];
$brakeassist=$_POST['brakeassist'];
$powersteering=$_POST['powersteering'];
$driverairbag=$_POST['driverairbag'];
$passengerairbag=$_POST['passengerairbag'];
$powerwindow=$_POST['powerwindow'];
$cdplayer=$_POST['cdplayer'];
$centrallocking=$_POST['centrallocking'];
$crashcensor=$_POST['crashcensor'];
$leatherseats=$_POST['leatherseats'];
$id=intval($_GET['id']);

$sql="update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
$query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
$query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
$query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
$query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
$query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
$query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
$query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
$query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
$query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
$query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
$query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Rescue unit specifications updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Aarogya Admin | Edit Unit Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/professional-admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet"> 
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Modify Rescue Unit Specifications</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Technical Log</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Unit Title/Callsign<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result->VehiclesTitle)?>" required>
</div>
<label class="col-sm-2 control-label">Logistics Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->BrandName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Equipment Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->VehiclesOverview);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Cost/Service (RWF)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay);?>" required>
</div>
<label class="col-sm-2 control-label">Propulsion System<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" required>
<option value="<?php echo htmlentities($result->FuelType);?>"> <?php echo htmlentities($result->FuelType);?> </option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
<option value="Electric">Electric/Hybrid</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Commission Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear);?>" required>
</div>
<label class="col-sm-2 control-label">Patient Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity);?>" required>
</div>
</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><i class="fa fa-camera"></i> <b>Unit Visual Documentation</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width="100%" style="border-radius: 8px; margin-bottom: 10px;">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>" class="btn btn-sm btn-info btn-block">Update Exterior Front</a>
</div>
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width="100%" style="border-radius: 8px; margin-bottom: 10px;">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>" class="btn btn-sm btn-info btn-block">Update Exterior Side</a>
</div>
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width="100%" style="border-radius: 8px; margin-bottom: 10px;">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>" class="btn btn-sm btn-info btn-block">Update Medical Interior</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" width="100%" style="border-radius: 8px; margin-bottom: 10px;">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>" class="btn btn-sm btn-info btn-block">Update Equipment View</a>
</div>
<div class="col-sm-4">
<?php if($result->Vimage5=="")
{
echo htmlentities("Alternative View not uploaded");
} else {?>
<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" width="100%" style="border-radius: 8px; margin-bottom: 10px;">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>" class="btn btn-sm btn-info btn-block">Update Secondary View</a>
<?php } ?>
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
	
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Medical & Safety Facilities</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ac" name="airconditioner" <?php if($result->AirConditioner==1) echo 'checked';?> value="1">
<label for="ac"> Climate Control </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="pdl" name="powerdoorlocks" <?php if($result->PowerDoorLocks==1) echo 'checked';?> value="1">
<label for="pdl"> Central Security </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="abs" name="antilockbrakingsys" <?php if($result->AntiLockBrakingSystem==1) echo 'checked';?> value="1">
<label for="abs"> ABS Braking </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ba" name="brakeassist" <?php if($result->BrakeAssist==1) echo 'checked';?> value="1">
<label for="ba"> Brake Assist </label>
</div></div>
</div>

<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ps" name="powersteering" <?php if($result->PowerSteering==1) echo 'checked';?> value="1">
<label for="ps"> Power Steering </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="da" name="driverairbag" <?php if($result->DriverAirbag==1) echo 'checked';?> value="1">
<label for="da">Driver Airbag</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="pa" name="passengerairbag" <?php if($result->PassengerAirbag==1) echo 'checked';?> value="1">
<label for="pa"> Staff Airbag </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="pw" name="powerwindow" <?php if($result->PowerWindows==1) echo 'checked';?> value="1">
<label for="pw"> Power Windows </label>
</div></div>
</div>


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="cd" name="cdplayer" <?php if($result->CDPlayer==1) echo 'checked';?> value="1">
<label for="cd"> Comms Hub </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="cl" name="centrallocking" <?php if($result->CentralLocking==1) echo 'checked';?> value="1">
<label for="cl">System Lockdown</label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="cs" name="crashcensor" <?php if($result->CrashSensor==1) echo 'checked';?> value="1">
<label for="cs"> Impact Sensor </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ls" name="leatherseats" <?php if($result->LeatherSeats==1) echo 'checked';?> value="1">
<label for="ls"> Hygienic Seats </label>
</div></div>
</div>

<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Commit Updates</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>