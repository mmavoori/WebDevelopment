<?php session_start(); ?>
<?php //$_SESSION['p_id']=$_GET['p_id']; ?>
<?php $p_id=$_SESSION['p_id']; ?>
<?php $userid=$_SESSION['userid']; ?>

<?php
$connection =  oci_connect($username = 'sritapa',
                         $password = 'Electromec123',
                         $connection_string = '//oracle.cise.ufl.edu/orcl');
						 

  
$query = "SELECT PRICE FROM STEP2SHOPIFY_PRODUCT where PRODUCTID =$p_id";
$result = oci_parse($connection, $query);
oci_execute($result);
while($res = oci_fetch_array($result))
{
$price=$res[0];
}
//echo $price;
?>
<?php 
$query3 = "SELECT POINTS FROM STEP2SHOPIFY_USER where USERID =$userid";
$result8 = oci_parse($connection, $query3);
oci_execute($result8);
while($res1 = oci_fetch_array($result8))
{
$points=$res1[0];
}
?>
<?php
if ($price < $points){
$new_price = $points-$price;
$query4 = " update STEP2SHOPIFY_USER set POINTS = $new_price
									 where USERID = $userid";
$result9 = oci_parse($connection, $query4);
oci_execute($result9);
}
else{
$suc="Not Enough Credits Remaining... please recharge your card";
}
?>

<?php 
if(empty($suc))
{
$query5 = "SELECT STOCKLEFT FROM STEP2SHOPIFY_PRODUCT where PRODUCTID =$p_id";
$result10 = oci_parse($connection, $query5);
oci_execute($result10);

while($res2 = oci_fetch_array($result10))
{
$stock=$res2[0];
}
if ($stock > 0){
$new_stock = $stock-1;
echo $new_stock;
$query6 = " update STEP2SHOPIFY_PRODUCT set STOCKLEFT = $new_stock where PRODUCTID =$p_id";
$result11 = oci_parse($connection, $query6);
oci_execute($result11);
}
else {
$suc="No more stocks Remaining";
}}
?>

<?php
//$userid = '3000167';

if ($price < $points and $stock>0){
$qty = '1';

$query2 = "insert into STEP2SHOPIFY_PURCHASE(PURCHASEID,USERID,PRODUCTID,QUANTITY) 
									  values(purchase_seq.nextval,:userid,:prod_id,:qty)";
$result2 = oci_parse($connection, $query2);

oci_bind_by_name($result2,':userid',$userid);
oci_bind_by_name($result2,':prod_id',$p_id);
oci_bind_by_name($result2,':qty',$qty);
oci_bind_by_name($result2,':price',$price);

$que2=oci_execute($result2);
if($que2){
$suc=" Transaction Success!!";
}
//else{
//$suc="Not enough Credits.. please recharge";
//}
}
 
?>






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
<body background="img/background9.jpg">




<div id="bottom_div">
<?php $image_path="img/PRODUCTS/" ?>
<?php $image_extension=".jpg" ?>

<?php //$_SESSION['p_id']=$_GET['p_id']; ?>
<?php $p_id=$_SESSION['p_id']; ?>


<div id = 'Product-Specifications'
   style="
      top: 99;
      left: 200;
      position: absolute;
      z-index: 1;
      visibility: show;">
<img width="300" height="300" 
src= "<?php echo $image_path.$p_id.$image_extension?>" />
</div>

<div id = 'Product-Specifications'
   style="
      top: 200;
      left: 700;
      position: absolute;
      z-index: 1;
      visibility: show;">

<?php $connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
?>
<table>
<col width="600"> 
<td>
<?php $query = "select * from step2shopify_product WHERE productid='".$p_id."'";	?>
<?php $result = oci_parse($connection, $query);
oci_execute($result);
while($row=oci_fetch_array($result,OCI_BOTH))
{ ?>

<?php
echo "<p>Product Details ID# &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp"; 
echo $row[0];
echo "<div style ='font:30px Verdana,tahoma,sans-serif;color:#00000'> $row[1] </div>";
echo "<br/>";
echo "<div style ='font:25px Arial,tahoma,sans-serif;color:#00000'> $ $row[3] </div>";
echo "<br />\n";
echo "<br />\n";
echo "<div style ='font:20px Arial,tahoma,sans-serif;color:#00000'> Stock Left :- $row[4] </div>";
} 
?>
</td>
</table>
</div>


<div id = 'Product-Specifications'
   style="
      top: 450;
      left: 200;
      position: relative;
      z-index: 1;
      visibility: show;">



<table>
<tr>
<form action = "purchase-history.php" method="get">
<button  type="submit" class="btn btn-primary">BUY</button>
</form> 
<?php echo $suc ?>
</tr>
</table>
</div>
</body>
</html>

