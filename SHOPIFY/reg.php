<?php
$msg=$_GET['v'];

?>
<html><head><title>Registration Page</title>
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
       //-->
	   function validateFirstName()
		{
			var x=document.forms["regForm"]["fname"].value;
			if (x==null || x=="")
  				{
  				alert("First name must be filled out");
  				return false;
  				}
		}
		function validateEmail()
		{
		var x=document.forms["regForm"]["uname"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  		{
  			alert("Not a valid e-mail address");
  			return false;
  		}
		}
    </SCRIPT>

</head>
<body background="img/background9.jpg">
<div id="bottom_div">
<!--<br><br><br>-->
<center>
<h3>Welcome to New User Registration!<h3><br>
<form name="regForm" action="regs.php" method="post">
<table >
<tr>
<td><h4><b>Email ID:</b> </td>
<td><input name="uname" style="width:100%; padding:0 2%;" type="text"  onsubmit="return validateEmail();" class="form-control" placeholder="Email id will be your username"></h4></td>
</tr>

<tr>
<td><h4><b>Password</b> </td>
<td><input type="password" input name="pwd" style="width:100%; padding:0 2%;" type="text"  class="form-control" placeholder="Enter your Password"></h4></td>
</tr>

<tr>
<td><h4><b>First Name</b> </td>
<td><input name="fname" style="width:100%; padding:0 2%;" type="text"  onsubmit="return validateFirstName();" class="form-control" placeholder="First Name"></h4></td>
</tr>


<tr>
<td><h4><b>Last name</b> </td>
<td><input name="lname" style="width:100%; padding:0 2%;" type="text"  class="form-control" placeholder="Last Name"></h4></td>
</tr>

<tr>
<td><h4><b>Address Details</b> </td><tr></tr></tr>
<td><h4><b>Street</b> </td>
<td><input name="street" style="width:100%; padding:0 2%;" type="text"  class="form-control" placeholder="Street"></h4></td>
</tr>

<tr>
<td><h4><b>City</b> </td>
<td><input name="city" style="width:100%; padding:0 2%;" type="text"  class="form-control" placeholder="City"></h4></td>
</tr>



<!-- Begin: Populate State-->
<tr>
<td><h4><b>State</b> </td>
<td><select id="state" name="state" style="width:100%; padding:0 2%;">
<?php
include_once("dbconnect.php");
//session_start();
$querystate="select distinct province from city order by province";
//$querystate="select distinct name from country order by name";
$result = oci_parse($connection, $querystate);
oci_execute($result);
while($res = oci_fetch_array($result))
{
	?><option><?php echo $res[0];?></option>
<?php
}
oci_free_statement($result);
//oci_close($connection);
?>
</select></h4>
</td>
</tr>
<!-- End: Populate State-->

<!-- Begin: Populate Country-->
<tr>
<td><h4><b>Country</b> </td>
<td><select id="country" name="country" style="width:100%; padding:0 2%;">
<?php
//include_once("dbconnect.php");
$querycountry="select distinct name from country order by name";
$resultcountry = oci_parse($connection, $querycountry);
oci_execute($resultcountry);
while($res1 = oci_fetch_array($resultcountry))
{
?><option><?php echo $res1[0];?></option>
<?php
}
oci_free_statement($resultcountry);
//oci_close($connection);
?>
</select></h4>
</td>
</tr>
<!-- End: Populate Country-->


<tr>
<td><h4><b>Zip Code</b> </td>
<td><input name="zip" style="width:100%; padding:0 2%;" type="text"  class="form-control" placeholder="Zip Code" onkeypress="return isNumberKey(event)" ></h4></td>
</tr>

<tr>
<td><h4><b>Card Type</b></td>
<td><select id="cardtype" name="cardtype" style="width:100%; padding:0 2%;">
<?php
include_once("dbconnect.php");
$querycard="select cardtype from step2shopify_card";
$resultcard = oci_parse($connection, $querycard);
oci_execute($resultcard);?>
<option>--Enter--</option>

<?php while($res1 = oci_fetch_array($resultcard))
{
?>
<option><?php echo $res1[0];?></option>
<?php
}
oci_free_statement($resultcard);
//oci_close($connection);
?>
</select></h4>
</td>
</tr>


<br><br>
</table>
<h4><p><font color="red"><?PHP echo $msg; ?></font></p></h4>
<input type="submit" class="btn btn-primary" value="Submit"><br>
</form>
</center>
</div>
</body>
</html>