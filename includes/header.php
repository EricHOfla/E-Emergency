
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3">
          <div class="logo"> 
            <a href="index.php" style="display: flex; align-items: center; gap: 15px; text-decoration: none;">
              <div style="background: var(--primary-color); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(225, 46, 46, 0.3);">
                <i class="fa fa-ambulance" style="font-size: 1.8em; color: #fff;"></i>
              </div>
              <div>
                <strong style="color: var(--secondary-color); font-size: 1.4em; display: block; line-height: 1;">E-Emergency</strong>
                <span style="color: var(--primary-color); font-size: 0.75em; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;">Medical Response</span>
              </div>
            </a> 
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">24/7 Support</p>
              <a href="mailto:info@e-emergencyservices.com">info@e-emergencyservices.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon" style="background: #1A2B48;"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Emergency Hotline</p>
              <a href="tel:0788112233" style="font-size: 1.1em; font-weight: 700; color: var(--primary-color) !important;">0788112233</a> </div>
            

   <?php   if(strlen($_SESSION['login'])==0)
	{	
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 
  // Check for notifications
  $useremail = $_SESSION['login'];
  $sql_notif = "SELECT id FROM tblbooking WHERE userEmail=:useremail AND Status != 0 AND UserRead = 0";
  $query_notif = $dbh->prepare($sql_notif);
  $query_notif->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query_notif->execute();
  $unread_count = $query_notif->rowCount();
  
  if($unread_count > 0) {
    echo "<div class='user_welcome' style='color: white; font-weight: 600; padding: 10px 15px; background: var(--primary-color); border-radius: 8px; box-shadow: 0 4px 10px rgba(225,46,46,0.2); animation: pulse 2s infinite;'><i class='fa fa-bell'></i> Status Update ($unread_count)</div>";
  } else {
    echo "<div class='user_welcome' style='color: var(--secondary-color); font-weight: 600; padding: 10px 15px; background: var(--accent-color); border-radius: 8px;'><i class='fa fa-check-circle' style='color: #28A745;'></i> System Online</div>";
  }
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?>
   <?php if($unread_count > 0) { echo "<span style='position: absolute; top: 0; right: 0; background: var(--primary-color); color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 10px; display: flex; align-items: center; justify-content: center; border: 2px solid white;'>$unread_count</span>"; } ?>
   <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php"><i class="fa fa-user"></i> Profile Settings</a></li>
              <li><a href="update-password.php"><i class="fa fa-key"></i> Update Password</a></li>
            <li><a href="my-booking.php"><i class="fa fa-ambulance"></i> My Bookings 
              <?php if($unread_count > 0) { echo "<span class='label label-danger' style='border-radius: 10px; margin-left: 5px;'>NEW</span>"; } ?>
            </a></li>
            <li><a href="post-testimonial.php"><i class="fa fa-star"></i> Post a Testimonial</a></li>
          <li><a href="my-testimonials.php"><i class="fa fa-heart"></i> My Testimonials</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal"><i class="fa fa-user"></i> Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal"><i class="fa fa-key"></i> Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal"><i class="fa fa-ambulance"></i> My Bookings</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal"><i class="fa fa-star"></i> Post a Testimonial</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal"><i class="fa fa-heart"></i> My Testimonials</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search" style="border-left: 1px solid rgba(255,255,255,0.1);">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search-carresult.php" method="get" id="header-search-form">
            <input type="text" placeholder="Search Units..." class="form-control" name="search">
            <button type="submit" style="background: var(--primary-color);"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="page.php?type=aboutus">About</a></li>
          <li><a href="car-listing.php">Rescue Fleet</a></li>
          <li><a href="page.php?type=faqs">Info Hub</a></li>
          <li><a href="contact-us.php">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>