<?php
$msg=$_GET['v'];
?>
<html><head><title>Manage Card Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<style type="text/css">
<!--@import url("css/bootstrap.min.css");-->
</style>
<div id="container">
<div id="top_div">
<div class="heading">
<h1 align="LEFT"><a href="login.php"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/></a>   
Step2Shopify</h1></div></div>


</head>
<body background="img/background9.jpg">
<div id="bottom_div">
<!--<br><br><br>-->
<center>
<h3>Welcome to Card Management!<h3><br>
<form action="updatecard.php" method="post">
<table >
<tr>
<td width="100"><h4><b>Card Type</b></h4></td>
<td width="47"><select id="cardtype" name="cardtype" style="width:100%; padding:0 2%;">
<?php
include_once("dbconnect.php");
// session started to get the corresponding userid;
session_start();
//get userid from session
$userid=$_SESSION['userid'];

//Set default userid as 3
if(!isset($userid))
$userid=3;

//Query cardtype
$querycardtype="select cardtype from step2shopify_user where userid=$userid";

$result = oci_parse($connection, $querycardtype);
oci_execute($result);

while($res = oci_fetch_array($result))
{
	echo $res[0];
	?><option><?php echo $res[0];?></option>
<?php
}
oci_free_statement($result);
//oci_close($connection);
?>
</select></td>
</tr>

<tr>
<td width="100"><h4><b>Recharge value</b></h4></td>
<td><input name="rechargevalue" style="width:100%; padding:0 2%;" type="text"  class="form-control" placeholder="USD">
</td>
</tr>


<br><br>
</table><h4><p><font color="red"><?PHP echo $msg; ?></font></p></h4>
<input type="submit" value="Recharge">
<br>
</form>
</center>
</div>
</body>
</html>