<?php
$msg=$_GET['v'];
?>
<html><head><title>Modify Products Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<?php

$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$query = "SELECT CNAME FROM Step2Shopify_category";
$result = oci_parse($connection, $query);
oci_execute($result);
session_start();
$name= $_SESSION['name'];
$_SESSION['name']=$name;
?>
<div id="container">
<div id="top_div">
<div class="heading">
<h1 align="LEFT"><a href="login.php"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/></a>   
Step2Shopify</h1></div></div>

<div class="topcorner">

        <h2 class="form-signin-heading"> &nbsp; &nbsp;WELCOME!!!</h2>
		<h2><img src="img/admin.jpg" width="75" height="50" alt="" class="img-thumbnail"/><?php print("\n".$name) ?></h2>
		
<div class="btn-group" style="padding: 215px; position:absolute; top:-49%">
<button type="button" class="btn btn-success" onclick="window.location.href='logout.php';"> <h5>LogOut</h5></button>
  </div>
		
</div>

  
<div class="btn-group" style="padding: 220px; position:absolute; top:-15%">
<button type="button" class="btn btn-success" onclick="window.location.href='admin.php';"> <h5>Home</h5></button>
</div>  
</div>
</div>
</head>
<body background="img/background9.jpg">
<div id="bottom_div">
<br><br><br>
<center>
<form action="ProductSuccess.php" method="get">
<table >
<tr>
<td><h4><b>Enter Product Name:</b> </td>
<td><input name="pname" style="width:96%; padding:0 2%;" type="text"  class="form-control" placeholder="Product Name"></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Enter Product Description: </td>
<td><textarea name="pdesc" class="form-control" style="width:96%; padding:0 2%;" rows="3" placeholder="Description"></textarea></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Enter the Price: </td>
<td><input name="price" type="text" style="width:96%; padding:0 2%;"style="width:60px;" class="form-control" placeholder="price"></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Enter Stock: </td>
<td><input type="text" style="width:50px;" name="name" value="0" onchange="if(this.value<0){this.value=0;}" />
    <input type="button" value="+" onclick="if(this.form.name.value>=0){this.form.name.value++;}" >
    <input type="button" value="-" onclick="if(this.form.name.value>0){this.form.name.value--};"></h4></td>
</tr>
<tr>
<td><h4 style="font-weight:bold;">Select Category:</td> 
<td><select id="category" name="category" style="width:96%; padding:0 2%;">
<option>--Enter--</option>
<?php
while($res = oci_fetch_array($result))
{
	?><option><?php echo $res[0];?></option>
<?php
}

oci_free_statement($result);
oci_close($connection);
?>

</select></h4></td>
</tr>
<tr>
</table>
<input type="submit" value="ENTER"><br><font color="red"><?PHP echo $msg; ?></font>
</form>


</center>
</div>
</body>
</html>