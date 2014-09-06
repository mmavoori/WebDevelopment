<?php session_start(); ?>

<html><head><title>Step2Shopify</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<?php $_SESSION['c_id']=$_GET['c_id']; ?>
<?php $c_id=$_SESSION['c_id']; ?>



<?php
//echo $c_id;
session_start();
$userid=$_SESSION['userid'];
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$email=$_POST['email'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['zipcode'];
$country=$_POST['country'];

$query2 = "update STEP2SHOPIFY_USER set EMAILID=:email,STREET=:street,CITY=:city,STATE=:state,ZIPCODE=:zipcode,COUNTRY=:country where USERID=:userid";

//$query2 = "insert into STEP2SHOPIFY_Complaints(COMPLAINTID ,CUSTOMERID,PRODUCTID,C_DESCRIPTION,PRIORITY,ADMINID,STATUS)
//values(complaint_seq.NEXTVAL,:userid,:productid,:proddesc,:priority,:adminid,:status)";

//$query2 = "insert into Complaints values('1','1','1','1','1','1','1')";

//$productid = 'P123';
//$proddesc = 'wow';
//$priority = '1';
$adminid = 'NULL';
$status = 1;
//$day = '01/03/14';
//$format = 'MM/DD/YY';
//$time = 'NULL';
$result2 = oci_parse($connection, $query2);

oci_bind_by_name($result2,':email',$email);
oci_bind_by_name($result2,':street',$street);
oci_bind_by_name($result2,':city',$city);
//oci_bind_by_name($result2,':time',$time);
oci_bind_by_name($result2,':state',$state);
oci_bind_by_name($result2,':zipcode',$zipcode);
oci_bind_by_name($result2,':country',$country);
oci_bind_by_name($result2,':userid',$userid);

$que2=oci_execute($result2);
if($que2){
	$suc="Updated Changes";
}
else{
	$suc="insertion not proper";
}


echo $que2;

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
<body>
<div id="bottom_div">



<body background="img/background9.jpg">
<div id="bottom_div">
<br><br><br>
<center>
<form action="Complaint_Success.php" method="post">
<table>
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
<td style="padding-right: 50px"><input type="text" name="zipcode" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="Zip Code"></h4></td>
<td><h4 style="font-weight:bold;">Enter Country:  </td>
<td><input type="text" name="country" class="form-control" style="width:120%; padding:0 2%;" rows="3" placeholder="Country"></h4></td>
</tr>

<tr>
</table>
<input type="submit" value="ENTER"><br>
</form>
<?php echo $suc; ?>
</center>
</div>
</body>
</html>