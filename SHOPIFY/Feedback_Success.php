<?php session_start(); ?>

<html><head><title>Step2Shopify</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<?php //$_SESSION['c_id']=$_GET['c_id']; ?>
<?php $c_id=$_SESSION['c_id']; ?>


<?php
session_start();
$userid=$_SESSION['userid'];
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$pdesc=$_POST['pdesc'];
//$c_id = 'P123';
//$cdesc = 'wow';
//$userid = 'U123';
$query2 = "insert into STEP2SHOPIFY_FEEDBACK(FEEDBACKID ,CUSTOMERID,PRODUCTID,F_DESCRIPTION)
values(feedback_seq.NEXTVAL,:userid,:productid,:proddesc)";
$result2 = oci_parse($connection, $query2);
oci_bind_by_name($result2,':productid',$c_id);
oci_bind_by_name($result2,':proddesc',$pdesc);
oci_bind_by_name($result2,':userid',$userid);


$que2=oci_execute($result2);
if($que2){
	$suc="Submitted Feedback";
}
else{
	$suc="insertion not proper";
}

$name= $_SESSION['name'];

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
<html>
<head>
<title>PAGING</title>
</head>
<body background="img/background9.jpg">
<div id="bottom_div">
<br><br><br>
<center>
<form action="Feedback_Success.php" method="post">
<table>
<tr>
<td><h4 style="font-weight:bold;">Enter New Feedback: </td>
<td><input id="pdesc" style="width:150%; padding:0 2%;" rows="6" type="text"  class="form-control" placeholder="Description"></h4></td>
</tr>
<?php oci_close($connection); ?>
<tr>
</table>
<input type="submit" value="ENTER"><br>
</form>
<?php echo $suc; ?>
</center>
</div>
</body>
</html>