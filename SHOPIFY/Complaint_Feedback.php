<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">


<?php $_SESSION['c_id']=$_GET['c_id']; ?>
<?php $c_id=$_SESSION['c_id']; ?>

<div id="container">
<div id="top_div">
<div class="heading">
<h1 align="LEFT"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/>   Step2Shopify</h1></div></div>

<div class="tool">
<div class="btn-toolbar" role="toolbar">
 <div class="btn-group">
      <button type="button" class="btn btn-info" onClick="window.location.href='usernew.php';">Home</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='My_Account.php';">My Account</button>
    <button type="button" class="btn btn-success" onClick="window.location.href='logout.php';">LogOut</button>
      </div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary" onClick="window.location.href='books.php';">Books</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='clothing.php';">Lifestyle</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='furniture.php';">Furniture</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='electronics.php';">Electronics</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='stationery.php';">OfficeSupplies</button>
  </div>
 </div></div></div>
</div>    
</div>
</head>
<body background="img/background9.jpg">
<div id="bottom_div">
<a href="Add_Complaint.php?c_id=<?PHP echo $c_id ?>"><font size="5"><span style="text-align:left">Add a Complaint</span></font><div align="left"></div></a>
<p style="text-align:center;">
<img src="img/Complaint-Box.jpg" alt="Smiley face" width="300" height="200">
</p>
<a href="Add_Feedback.php?c_id=<?PHP echo $c_id ?>"><font size="5">Add a Feedback</font><div align="left"></div></a>
<p style="text-align:center;">
<img src="img/feedback.jpg" alt="Smiley face" width="300" height="200">
</p>
</div>
</body>
</html>