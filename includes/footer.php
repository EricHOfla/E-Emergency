<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>


<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <h6>Medical Response Network</h6>
          <p style="color: rgba(255,255,255,0.7); line-height: 1.8; margin-bottom: 25px;">E-Emergency is committed to providing life-saving emergency medical services. Our fleet of advanced ambulances is equipped with modern life-support systems to ensure patient safety and rapid response during critical hours.</p>
          <div class="footer_links">
            <ul style="display: flex; gap: 20px; flex-wrap: wrap;">
              <li><a href="page.php?type=aboutus">Our Mission</a></li>
              <li><a href="page.php?type=faqs">Information Hub</a></li>
              <li><a href="page.php?type=privacy">Patient Privacy</a></li>
              <li><a href="page.php?type=terms">Service Terms</a></li>
              <li><a href="admin/" style="color: var(--primary-color);">Personnel Portal</a></li>
            </ul>
          </div>
        </div>
  
        <div class="col-md-4 col-md-offset-2 col-sm-6">
          <h6>Emergency Updates</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control" required placeholder="Enter Healthcare Email" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 8px;" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block" style="border-radius: 8px !important;">Join Emergency Network <i class="fa fa-paper-plane"></i></button>
            </form>
            <p class="subscribed-text" style="font-size: 0.8em; margin-top: 15px; color: rgba(255,255,255,0.5);">*Sign up for medical safety alerts and regional health updates.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom" style="background: rgba(0,0,0,0.2); padding: 25px 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p style="display: inline-block; margin-right: 15px; color: rgba(255,255,255,0.7);">Official Channels:</p>
            <ul style="display: inline-flex; gap: 15px;">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true" style="color: white;"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true" style="color: white;"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true" style="color: white;"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true" style="color: white;"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right" style="color: rgba(255,255,255,0.5);">Copyright &copy; <?php echo date('Y'); ?> E-Emergency Ambulance Service. Every Life Matters.</p>
        </div>
      </div>
    </div>
  </div>
</footer>