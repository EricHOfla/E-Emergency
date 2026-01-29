<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE tblbooking SET Status=:status, UserRead=0 WHERE id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Mission Status: Aborted/Cancelled - Unit Disengaged";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tblbooking SET Status=:status, UserRead=0 WHERE id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Mission Status: Authorized/Confirmed - Unit Deployed";
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
	
	<title>Aarogya Admin | Dispatch Management</title>

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

						<h2 class="page-title">Dispatch Management Queue</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Emergency Request Registry</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Patient & Mission Notes</th>
											<th>Assigned Unit</th>
											<th>Mission Period</th>
											<th>Operational Status</th>
											<th>Dispatch Date</th>
											<th>Operations</th>
										</tr>
									</thead>
									<tbody>

									<?php $sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.Emailid=tblbooking.userEmail join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by tblbooking.id desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td>
                                                <strong><?php echo htmlentities($result->FullName);?></strong>
                                                <?php if($result->message) { ?>
                                                <div style="font-size: 0.85em; background: #f9f9f9; padding: 5px 10px; border-radius: 4px; margin-top: 5px; color: #555; border-left: 2px solid var(--primary-color);">
                                                    <i class="fa fa-info-circle"></i> <?php echo htmlentities($result->message);?>
                                                </div>
                                                <?php } ?>
                                            </td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>" style="color: var(--primary-color); font-weight: 600;"><i class="fa fa-ambulance"></i> <?php echo htmlentities($result->BrandName);?> <?php echo htmlentities($result->VehiclesTitle);?></a></td>
											<td>
                                                <div style="font-size: 0.85em;">
                                                    <span class="text-muted">Start:</span> <?php echo htmlentities($result->FromDate);?><br>
                                                    <span class="text-muted">End:</span> <?php echo htmlentities($result->ToDate);?>
                                                </div>
                                            </td>
											<td><?php 
if($result->Status==0)
{
echo '<span class="label label-warning">Awaiting Authorization</span>';
} else if ($result->Status==1) {
echo '<span class="label label-success">Dispatch Active</span>';
}
 else{
 	echo '<span class="label label-danger">Mission Aborted</span>';
 }
										?></td>
											<td style="font-size: 0.85em;"><?php echo htmlentities($result->PostingDate);?></td>
										<td>
                                            <?php if($result->Status==0) { ?>
                                            <a href="manage-bookings.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Immediately authorize this emergency dispatch?')" class="btn btn-xs btn-primary btn-block" style="margin-bottom: 5px;"><i class="fa fa-check"></i> Authorize</a>
                                            <a href="manage-bookings.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Abort this mission request?')" class="btn btn-xs btn-danger btn-block"><i class="fa fa-close"></i> Abort</a>
                                            <?php } else if($result->Status==1) { ?>
                                            <a href="manage-bookings.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Abort/Terminate active mission?')" class="btn btn-xs btn-warning btn-block"><i class="fa fa-power-off"></i> Terminate</a>
                                            <?php } else { ?>
                                            <button class="btn btn-xs btn-default btn-block" disabled>Closed</button>
                                            <?php } ?>
                                        </td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

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
