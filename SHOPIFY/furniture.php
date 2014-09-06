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
<?php
//require_once ('./paginator.class.php');
//GIVE CORRECT PASSWORD NOT STARS
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$statement = oci_parse($connection, 'SELECT * FROM STEP2SHOPIFY_PRODUCT where categoryid = 5000005 ORDER By PRODUCTID ASC');
oci_execute($statement,OCI_DEFAULT);

$Num_Rows = oci_fetch_all($statement,$Result);
//    echo "The no. of rows:$Num_Rows<br>\n";

$Per_Page = 4;   // Per Page how many records



// This will run only 1 first time
if(!isset($_GET['Page']))
{
   $Page=1;
}

else{
	$Page = $_GET["Page"]; 
}
//echo //"value of VARIABLE page : $Page \n" ;

// From here normal running
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

// Page_Start is the pointer which keeps changing everytime pointing to the top record of a page.
$Page_Start = (($Per_Page*$Page)-$Per_Page);
//special case
if($Num_Rows<=$Per_Page)
{
$Num_Pages =1;
}
//exact division 
else if(($Num_Rows % $Per_Page)==0)
{
$Num_Pages =($Num_Rows/$Per_Page) ;
}
//normal case
else
{
$Num_Pages =($Num_Rows/$Per_Page)+1;
$Num_Pages = (int)$Num_Pages;
}
$Page_End = $Per_Page * $Page;
if ($Page_End > $Num_Rows)
{
$Page_End = $Num_Rows;
}
//echo "$Page_Start<br>\n";
//echo "$Num_Pages<br>\n";
//echo "$Page_End<br>\n"
?>
<?php $image_path="img/PRODUCTS/" ?>
<?php $image_extension=".jpg" ?>

<div id = 'Product-Specifications'
   style="
      top: 99;
      left: 200;
      position: absolute;
      z-index: 1;
      visibility: show;">
<table>	 
<col width="300"> 
<col width="300"> 
<col width="300"> 
<col width="300"> 

<?php
for($i=$Page_Start;$i<$Page_End;$i++)
{?>	
	
	
	
	 
	 
	 <td>
	  
		<?php $image_id=$Result['PRODUCTID'][$i] ?>
		<a href="product-details.php?p_id=<?PHP echo $image_id ?>" target="_blank"> 
        <img src= "<?php echo $image_path.$image_id.$image_extension?>" 
		 width="200" height="200" border="1" align="middle"/></a>
	
	
	
	<br><br><br>
	<?php //echo "PRODUCT NAME "?> <font face = 'sans-serif' size="5"><?=$Result["PNAME"][$i];?></font></div>
	<br>
	<?php //echo "Price :      "?><font face = 'verdana' size="3">$<?=$Result["PRICE"][$i];?></font>
	<br>
	<?php //echo "Stock Status: "?><i>Stock Left: &nbsp<b><?=$Result["STOCKLEFT"][$i];?>
	<br>
	</td>
	
	
	
<?php } ?>

</table>
</div>







<br>
<br>
<br>




<!--Begin: syntax for self redirect-->
<div id = "No.of Categories"
   style="
      top: 450;
      right: 100;
      position: relative;
      z-index: 1;
      visibility: show;">


Total <?= $Num_Rows;?> Products in Category
</div>
<div
   style="
      top: 450;
      left: 150;
      position: relative;
      z-index: 1;
      visibility: show;">
<?php
if($Prev_Page)
{
print "[ <a href='$_SERVER[PHP_SELF]?Page=$Prev_Page'><< Back</a> ]";
}

for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
{
print "[ <a href='$_SERVER[PHP_SELF]?Page=$i'>$i</a> ]";
}
else
{
echo "<b> $i </b>";
}
}
if($Page!=$Num_Pages)
{
print " <a href ='$_SERVER[PHP_SELF]?Page=$Next_Page'>Next>></a> ";
}
//<!--END: syntax for self redirect-->
oci_free_statement($statement);
oci_close($connection);
?>
</div>
</div>
</body>
</html>