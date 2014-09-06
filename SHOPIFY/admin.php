
<html><head><title>Login Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">


<?php
session_start();
$name=$_SESSION['name'];
$street=$_SESSION['street'];
$city=$_SESSION['city'];
$state=$_SESSION['state'];
$zipcode=$_SESSION['zipcode'];
$country=$_SESSION['country'];
$email=$_SESSION['email'];
$userid=$_SESSION['userid'];
?>

<div id="container">
<div id="top_div">
<div class="heading">
<h1 align="LEFT"><a href="login.php"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/></a>   Step2Shopify</h1></div></div>

<div class="topcorner">

        <h2 class="form-signin-heading"> &nbsp; &nbsp;WELCOME!!!</h2>
		<h2><img src="img/admin.jpg" width="75" height="50" alt="" class="img-thumbnail"/><?php print("\n".$name) ?></h2>
		
</div>

<div class="admin-dropdown">
<div class="btn-group">
  &nbsp;<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
    <h5>Add 
    <span class="caret"></span></h5>
  </a>
  <ul class="dropdown-menu">
		<li><a class="btn-primary" href="ModifyProducts.php?suc=<?php echo $suc ?>"> Products </a></li>
		<li><a class="btn-primary" href="ModifyCategory.php"> Categories </a></li>
		<li><a class="btn-primary" href="ModifyCard.php"> Card </a></li>
  </ul>
  </div>
  
  <div class="btn-group">
  &nbsp;<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
    <h5>Address Issues
    <span class="caret"></span></h5>
  </a>
  <ul class="dropdown-menu">
		<li><a class="btn-primary" href="NewComplaints.php"> New Complaints </a></li>
		<li><a class="btn-primary" href="ReturningComplaints.php"> Returning Complaints </a></li>
  </ul>
  </div>
  <div class="btn-group">
  &nbsp;<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
    <h5>View Quaterly Sales Data
    <span class="caret"></span></h5>
  </a>

  <ul class="dropdown-menu">
		<li><a class="btn-primary" href="SalesByCategory.php"> By Category </a></li>
		<li><a class="btn-primary" href="SalesByLocation.php"> By Location </a></li>
  </ul>
</div>
<div class="btn-group">
<button type="button" class="btn btn-success" onclick="window.location.href='index.php';"> <h5>LogOut</h5></button>
</div>
</div>

</div>   
</div>

<body background="img/background9.jpg">

<div id="bottom_div">

<div id="container" style="width:100%;">                                   
  <div class="admin_left"> <br><u>Personal Information </u>
  <address>
  <strong><?php print($name) ?></strong><br>
  <?php print($street) ?><br>
  <?php print($city) ?>, <?php print($state) ?><br>
  <?php print($country) ?> <?php print($zipcode) ?><br>
  <a href="mailto:#"><?php print($email) ?></a>
</address>


  </div>                     
  <div class="admin_right"> 
  <marquee behavior="scroll" direction="down" height="100%" width="100%">
  An administrator should look into the quarterly sales data, generate the report on the same and discuss the up's/down's 
  of the company's sales with higher authorities. Also, administrator is responsible to add any new product/category into the 
  list or delete a product/category from the website. The card type and the points associated with the card are also manipulated
  according to the company policy. Any user complaints are need to be addressed by the administrator who is logged in according 
  to their priority. This section of work must be regularly checked, any delay is not a acceptable. All the user needs must be
  satisfied by not disappointing them.</marquee></div>                   
</div> 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</div>
</body>
</html>