
<html><head><title>Step2Shopify</title>
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
<SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
</SCRIPT>	   
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
<form action="Personal_Information_Settings_Success.php?c_id=<?PHP echo $c_id ?>" method="post">
<table >

<tr>
<td><h4 style="font-weight:bold;">Enter Email id:  </td>
<td style="padding-right: 50px"><input type="text" name="email" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="Email"></h4></td>
<td><h4 style="font-weight:bold;">Enter Street:  </td>
<td><input type="text" name="street" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="Street"></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Enter City:  </td>
<td style="padding-right: 50px"><input type="text" name="city" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="City"></h4></td>
<td><h4 style="font-weight:bold;">Enter State:  </td>
<td><input type="text" name="state" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="State"></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Enter Zip Code:  </td>
<td style="padding-right: 50px"><input type="text" name="zipcode" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="Zip Code" onkeypress="return isNumberKey(event)"></h4></td>
<td><h4 style="font-weight:bold;">Enter Country:  </td>
<td><input type="text" name="country" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="Country"></h4></td>
</tr>


<tr>
</table>
<input type="submit" value="ENTER"><br>
</form>
</center>
</div>
</body>
</html>