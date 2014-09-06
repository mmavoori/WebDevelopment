<?php
$msg=$_GET['v'];
?>
<html><head><title>Modify Category Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<?php

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
		
<div class="btn-group" style="padding: 220px; position:absolute; top:-49%">
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
<form action="CategorySuccess.php" method="post">
<table >
<tr>
<td><h4><b>Enter Catergory Name:</b> </td>
<td><input name="cname" style="width:96%; padding:0 2%;" type="text"  class="form-control" placeholder="Category Name"></h4></td>
</tr>
</table>
<input type="submit" value="ENTER"><br><font color="red"><?PHP echo $msg; ?></font>
</form>
</center>
</div>
</body>
</html>