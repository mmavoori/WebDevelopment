<?PHP

$msg=$_GET['v'];

include_once("arr.php");
include_once("arrPurchase.php");
include_once("arrRecommend.php");
//echo $arrayofprods[0];
$image_path="img/PRODUCTS/";
$image_extension=".jpg";
session_start();
$userid=$_SESSION['userid'];
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
<h1 align="LEFT"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/>   Step2Shopify</h1></div></div>
</div>
<div class="tool">
<div class="btn-toolbar" role="toolbar">
 		<div class="btn-group">
   		<button type="button" class="btn btn-info" onClick="window.location.href='usernew.php';">Home</button>
   		<button type="button" class="btn btn-info" onClick="window.location.href='My_Account.php';">My Account</button>
		<button type="button" class="btn btn-success" onClick="window.location.href='logout.php';">LogOut</button>
  		</div>
		<div class="btn-group">
  <button type="button" class="btn btn-primary" onClick="window.location.href='books.php';">Books</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='clothing.php';">LifeStyle</button>
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
<div class="sidebar1">
  <nav>
    <ul>
    	<h3> </h3>	
      <li><a href="ManageCardPage.php">Set Points to your cards</a></li>
      <!--<li><a href="#">600$-800$</a></li>
      <li><a href="#">800$-900$</a></li>
      <li><a href="#">900$-100$</a></li>-->
    </ul>
</nav>
</div>

<article class="content"><h4><p><font color="green"><?PHP echo $msg; ?></font></p></h4>
    <h1>Welcome to home page!</h1>
    <p></p>
     <h2 align="center">NEW ADDITIONS</h2>
      <p><a href="product-details.php?p_id=<?PHP echo $arrayofprods[0] ?>"><img src="<?php echo $image_path.$arrayofprods[0].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block; float:left;" /></a>  </p>
    
    <p><a href="product-details.php?p_id=<?PHP echo $arrayofprods[1] ?>"><img src="<?php echo $image_path.$arrayofprods[1].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block; float:left;" /></a></p>
    
	<p><a href="product-details.php?p_id=<?PHP echo $arrayofprods[2] ?>"><img src="<?php echo $image_path.$arrayofprods[2].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block; float:left;" /></a></p>
	
	<p><a href="product-details.php?p_id=<?PHP echo $arrayofprods[3] ?>"><img src="<?php echo $image_path.$arrayofprods[3].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block; float:left;" /></a></p>
	
	<p><a href="product-details.php?p_id=<?PHP echo $arrayofprods[4] ?>"><img src="<?php echo $image_path.$arrayofprods[4].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block; float:left;" /></a></p>
	
	<p><a href="product-details.php?p_id=<?PHP echo $arrayofprods[5] ?>"><img src="<?php echo $image_path.$arrayofprods[5].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block; float:left;" /></a></p>
	
<!--    <section>
      <h2>&nbsp;</h2>
    </section>
    <section>
      <h2>&nbsp;</h2>
    </section>
  <!-- end .content --></article>
  
  <aside>
    <h4>HOT SELLERS !!!!</h4>
    <a href="product-details.php?p_id=<?PHP echo $arrayofpurchase[0] ?>"><img src="<?php echo $image_path.$arrayofpurchase[0].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block;" /></a>
    <p>
    
    </p>
    <a href="product-details.php?p_id=<?PHP echo $arrayofpurchase[2] ?>"><img src="<?php echo $image_path.$arrayofpurchase[2].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block;" /></a><p></p>
    <a href="product-details.php?p_id=<?PHP echo $arrayofpurchase[4] ?>"><img src="<?php echo $image_path.$arrayofpurchase[4].$image_extension?>" alt="" width="200" height="150" id="Insert_logo" style="background-color: #2ba6cb; display:block;" /></a>
    <p>&nbsp;</p>
  </aside>
  
  <footer>
  <?php $countofpurchasedprods=$_SESSION['countofprodspurchased'];?>
    <p><h3>Recommendations for U!</h3></p>    
  <div id="a">
	<a href="product-details.php?p_id=<?PHP echo $arrayofrecommendedProds[0] ?>"> <img src="<?php echo $image_path.$arrayofrecommendedProds[0].$image_extension?>" alt="" width="225" height="150" id="i1" style="background-color: #2ba6cb; display:block; float:left;" />
    <a href="product-details.php?p_id=<?PHP  echo $arrayofrecommendedProds[1] ?>"> <img src="<?php echo $image_path.$arrayofrecommendedProds[1].$image_extension?>" alt="" width="200" height="150" style="background-color: #2ba6cb; display:block; float:left;">
	<a href="product-details.php?p_id=<?PHP  echo $arrayofrecommendedProds[2] ?>"><img src="<?php echo $image_path.$arrayofrecommendedProds[2].$image_extension?>" alt="" width="200" height="150" style="background-color: #2ba6cb; display:block; float:left;">
	<a href="product-details.php?p_id=<?PHP  echo $arrayofrecommendedProds[3] ?>"><img src="<?php echo $image_path.$arrayofrecommendedProds[3].$image_extension?>" alt="" width="200" height="150" style="background-color: #2ba6cb; display:block; float:left;">
	<a href="product-details.php?p_id=<?PHP  echo $arrayofrecommendedProds[4] ?>"><img src="<?php echo $image_path.$arrayofrecommendedProds[4].$image_extension?>" alt="" width="200" height="150" style="background-color: #2ba6cb; display:block; float:left;">
	<a href="product-details.php?p_id=<?PHP  echo $arrayofrecommendedProds[5] ?>"><img src="<?php echo $image_path.$arrayofrecommendedProds[5].$image_extension?>" alt="" width="200" height="150" style="background-color: #2ba6cb; display:block; float:left;">
	
</div>
  </footer>

</div>
</body>
</html>