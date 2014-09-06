<html>
<head>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

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
<h2 align="middle"> My Account </h2>
<div id = 'Product-Specifications'
   style="
      top: 10 ;
      left: 40;
      position: absolute;
      z-index: 1;
      visibility: show;">
<font size="5"> Remaining Points : </font>

<?php
session_start();
$userid=$_SESSION['userid'];
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$statement = oci_parse($connection, 'select points from step2shopify_User where userid='.$userid);
oci_execute($statement,OCI_DEFAULT);
$row=oci_fetch_array($statement,OCI_BOTH);
//oci_bind_by_name($statement,$points,$points);
echo  $row[0]; 


?>
</div>
	<div class="btn-group btn-group-vertical btn btn-group-lg" style="top:1%">

   		<button type="button" class="btn btn-info btn-large" onclick="window.location.href='My_Purchase_History.php';">My Purchase History</button>        
   		<button type="button" class="btn btn-info btn-large" onclick="window.location.href='My_Feedback_and_Rating.php';">My Feedback and Rating</button>		        
   		<button type="button" class="btn btn-info btn-large" onclick="window.location.href='My_Complaints.php';">My Complaints</button>		
		<button type="button" class="btn btn-info btn-large" onclick="window.location.href='My_Subscriptions.php';">My Subscriptions</button>   
        <button type="button" class="btn btn-info btn-large" onclick="window.location.href='Personal_Information_Settings.php';">Personal Information Settings</button>  		
  		</div>
<p style="text-align:center;">
<img src="img/my_account.jpg" alt="Smiley face" width="400" height="400">
</p>

</div>
</body>
</html>