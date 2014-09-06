
<html><head><title>Add Complaints Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<?php

$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
//$query = "SELECT CNAME FROM Step2Shopify_category";
//$result = oci_parse($connection, $query);
//oci_execute($result);
session_start();
$_SESSION['c_id']=$_GET['c_id']; 
 $c_id=$_SESSION['c_id']; 
 echo $c_id;
?>
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
<br><br><br>
<center>
<form action="Return_Complaint_Success.php?c_id=<?PHP echo $c_id ?>" method="post">
<table >

<tr>
<td><h4 style="font-weight:bold;">Enter Complaint:  </td>
<td><textarea name="pdesc" class="form-control" style="width:115%; padding:0 2%;" rows="3" placeholder="Description"></textarea></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Enter Priority:  </td>
<td><textarea name="priority" class="form-control" style="width:50%; padding:0 2%;" rows="2" placeholder="Priority"></textarea></h4></td>
</tr>

<p><em>Please enter 1 for high priority</em></p>
<p><em>Please enter 2 for medium priority</em></p>
<p><em>Please enter 3 for low priority</em></p>

<tr>
</table>
<input type="submit" value="ENTER"><br>
</form>
</center>
</div>
</body>
</html>