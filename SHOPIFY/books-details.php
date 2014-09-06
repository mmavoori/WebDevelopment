<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">





<div id="container">
<div id="top_div">
<div class="top-heading">
<a href="http://www.w3schools.com" target="_blank"><FONT COLOR="FFFFFF">HOME</FONT></a>&nbsp&nbsp
<a href="http://www.w3schools.com" target="_blank"><FONT COLOR="FFFFFF">My Account</FONT></a>&nbsp&nbsp
<a href="http://www.w3schools.com" target="_blank"><FONT COLOR="FFFFFF">My Cart</FONT></a>&nbsp&nbsp
</div>


<div class="heading">
<h1 align="LEFT"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/></h1>
</div>

<div class="logo-heading">
Step2Shopify
</div>






</div>

<div class="topcorner">

      <form method="post" class="form-signin" action="login.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="myusername">
        <input type="password" class="input-block-level" placeholder="Password" name="mypassword">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-success" type="submit">Sign in</button>
		<button class="btn btn-large btn-success" type="button">Register</button>
      </form>
</div>
<div class="search"><div class="btn-group">
<form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <a><span class="glyphicon glyphicon-search"></span></a>
      </form>
  
</div></div>

<div class="tool">
<div class="btn-toolbar" role="toolbar">
	
   	<div class="btn-group">
  
  <button type="button" class="btn btn-primary">Books</button>
  <button type="button" class="btn btn-primary">Clothing</button>
  <button type="button" class="btn btn-primary">Shoes</button>
	</div>

	<div class="btn-group">
  <a href="http://google.com"><button type="submit" class="btn btn-primary">Mobiles</button></a>
  <button type="button" class="btn btn-primary">Laptops</button>
  <button type="button" class="btn btn-primary">Desktops</button>
  </div>
  <div class="btn-group">
  <button type="button" class="btn btn-primary">Monitors</button>
  <button type="button" class="btn btn-primary">Printers</button>
  <button type="button" class="btn btn-primary">Tablets</button>
</div>
<div class="btn-group">
  <button type="button" class="btn btn-primary">Furnitures</button>
  <button type="button" class="btn btn-primary">Kitchen items</button>
  <button type="button" class="btn btn-primary">Stationary</button>
</div></div></div></div>
</div>    
</div>
</head>
<body>




<div id="bottom_div">


<form name="myform" id="myform" method="post" >
   <input type="checkbox" id="subscription" name="subscription" value="Yes" size="35">
<label for="subscription">Subscribe</label> <br>
<input type="checkbox" id="add-to-cart" name="add-to-cart" value="Yes" >
<label for="add-to-cart">Add to Cart</label> <br>

</form>

<?php
if(isset($_POST['subscription']) && 
   $_POST['subscription'] == 'Yes') 
{
	$s_value = 1;
	//$hello='No';
}
else
{
	$s_value =0;
}  ?>

<?php
if(isset($_POST['add-to-cart']) && 
   $_POST['add-to-cart'] == 'Yes') 
{
	$c_value = 1;
	//$hello='No';
}
else
{
	$c_value =0;
}  ?>

<?php echo $c_value; ?>
<?php $image_path="img/PRODUCTS/BOOKS/" ?>
<?php $image_extension=".jpg" ?>

<?php $_SESSION['p_id']=$_GET['p_id']; ?>
<?php $p_id=$_SESSION['p_id']; ?>

<?php $connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
?>

<?php $query = "select * from products_table WHERE productid='".$p_id."'";	?>
<?php $result = oci_parse($connection, $query);
oci_execute($result);	

while($row=oci_fetch_array($result))

{
echo $row[0];
echo "<br />\n";
echo $row[1];
echo "<br />\n";
echo $row[2];
echo "<br />\n";
echo $row[3];
echo "<br />\n";
echo $row[4];
echo "<br />\n";
echo $row[5];

} ?>
			  


	


<?php //$p_id=$_SESSION['image_id'] ;?>

<?php //echo $p_id; ?> 
<?php// echo $city; ?>
<div
   style="
      top: 99;
      left: 50;
		visibility: show;">
<img width="300" height="300" class="img-thumbnail"
src= "<?php echo $image_path.$p_id.$image_extension?>" />


<form method="get" action="http://www.wikihow.com/Main-Page">
<button type="submit" class="btn btn-primary">BUY</button>
</form>


</div>


</div>
</body>
</html>