<?php
$msg=$_GET['v'];
?>
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
<h1 align="LEFT"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/>Step2Shopify</h1></div></div>

<div class="topcorner">

      <form method="post" class="form-signin" action="login2.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="myusername">
        <input type="password" class="input-block-level" placeholder="Password" name="mypassword">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-success" type="submit" >Sign in</button>
		<button class="btn btn-large btn-success" type="button" onClick="window.location.href='reg.php';">Register</button><font color="red"><?PHP echo $msg; ?></font>
      </form>
</div>

<div class="tool">
<div class="btn-toolbar" role="toolbar">

 		<div class="btn-group">
   		<button onClick="username.php" type="button" class="btn btn-info">Home</button>
   		<button onClick="My_Account.php" type="button" class="btn btn-info">My Account</button>
   		<button type="button" class="btn btn-info">My Cart</button>
  		</div>
	
   	<div class="btn-group">
  <button type="button" class="btn btn-primary">Books</button>
  <button type="button" class="btn btn-primary">Clothing</button>
  <button type="button" class="btn btn-primary">Furniture</button>
  <button type="button" class="btn btn-primary">Electronics</button>
  <button type="button" class="btn btn-primary">OfficeSupplies</button>
	</div>

</div></div></div>
</div>    
</div>
</head>
<body>
<div id="bottom_div">
<div id="myCarousel" class="carousel slide">
<ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
	<div class="carousel-inner">
		<div class="item active">
			<img style="float: left;" src="img/lenovo.jpg" alt="image1" class="img-responsive">
			<img style="float: right;" src="img/hp.jpg" alt="image1" class="img-responsive">
		</div>
		<div class="item">
			<img style="float: left;" src="img/book.jpg" alt="image1" class="img-responsive">
			<img style="float: right;" src="img/books.jpg" alt="image1" class="img-responsive">
		</div>
		<div class="item">
			<img style="float: centre;" src="img/k.jpg" alt="image1" class="img-responsive">
			
		</div>
	</div>
	<a class="carousel-control left" href="#myCarousel" data-slide="prev">
		<span class="icon-prev"></span>
	</a>
	<a class="carousel-control right" href="#myCarousel" data-slide="next">
		<span class="icon-next"></span>
	</a>
	
</div>
</div>
</body>
</html>