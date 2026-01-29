<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Mission Critical Error: Invalid Credentials. Access Denied.');</script>";

}

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

	<title>E-Emergency | Command Center Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/professional-admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet"> 
	<style>
		body {
			background: radial-gradient(circle at center, #1a1a1a 0%, #000 100%);
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			margin: 0;
			font-family: 'Outfit', sans-serif;
		}
		.login-container {
			background: rgba(255, 255, 255, 0.05);
			backdrop-filter: blur(20px);
			border: 1px solid rgba(255, 255, 255, 0.1);
			border-radius: 24px;
			padding: 40px;
			width: 100%;
			max-width: 450px;
			box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
		}
		.login-header {
			text-align: center;
			margin-bottom: 40px;
		}
		.login-header .logo-icon {
			background: var(--primary-color);
			width: 60px;
			height: 60px;
			border-radius: 16px;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 0 auto 20px;
			box-shadow: 0 10px 20px rgba(220, 53, 69, 0.3);
		}
		.login-header h1 {
			color: #fff;
			font-size: 28px;
			font-weight: 700;
			margin: 0;
			letter-spacing: -0.5px;
		}
		.login-header p {
			color: rgba(255, 255, 255, 0.6);
			margin-top: 8px;
		}
		.form-control {
			background: rgba(255, 255, 255, 0.05) !important;
			border: 1px solid rgba(255, 255, 255, 0.1) !important;
			border-radius: 12px !important;
			color: #fff !important;
			height: 50px !important;
			padding: 10px 20px !important;
			margin-bottom: 20px !important;
		}
		.form-control:focus {
			border-color: var(--primary-color) !important;
			box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
		}
		label {
			color: rgba(255, 255, 255, 0.8);
			font-weight: 600;
			font-size: 13px;
			margin-bottom: 8px;
			display: block;
		}
		.btn-login {
			background: var(--primary-color);
			border: none;
			border-radius: 12px;
			height: 50px;
			font-weight: 700;
			font-size: 16px;
			text-transform: uppercase;
			letter-spacing: 1px;
			transition: all 0.3s ease;
			margin-top: 10px;
		}
		.btn-login:hover {
			background: #c82333;
			transform: translateY(-2px);
			box-shadow: 0 10px 20px rgba(220, 53, 69, 0.3);
		}
	</style>
</head>

<body>
	
	<div class="login-container">
		<div class="login-header">
			<div class="logo-icon">
				<i class="fa fa-ambulance" style="color: white; font-size: 24px;"></i>
			</div>
			<h1>E-Emergency Command</h1>
			<p>Authorized Personnel Only</p>
		</div>

		<form method="post">
			<div class="form-group">
				<label class="text-uppercase">Access Username</label>
				<input type="text" placeholder="Enter security ID" name="username" class="form-control" required autofocus>
			</div>

			<div class="form-group">
				<label class="text-uppercase">Security Key</label>
				<input type="password" placeholder="••••••••" name="password" class="form-control" required>
			</div>

			<button class="btn btn-primary btn-block btn-login" name="login" type="submit">Initialize Access</button>
		</form>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>