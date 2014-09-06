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
<body>
<div id="bottom_div">
<h2> My Purchase History </h2>
<html>
<head>
<title>PAGING</title>
</head>
<body background="img/background9.jpg">
<?php
//require_once ('./paginator.class.php');
//GIVE CORRECT PASSWORD NOT STARS
session_start();
$userid=$_SESSION['userid'];
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$statement = oci_parse($connection, 'select pur.productid,p.pname,pur.quantity,pur.purchase_date from step2shopify_product p,step2shopify_purchase pur where pur.productid=p.productid and pur.userid='.$userid.'order by pur.purchase_date desc');
oci_execute($statement,OCI_DEFAULT);
$Num_Rows = oci_fetch_all($statement,$Result);

$Per_Page = 10;   // Per Page how many records



// This will run only 1 first time
if(!isset($_GET['Page']))
{
   $Page=1;
}

else{
	$Page = $_GET["Page"]; 
}

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



<table width="700" border="1">
<tr>
<!--<th width="91"> <div align="center">PURCHASEID </div></th>-->
<!--<th width="98"> <div align="center">USERID </div></th>-->
<th width="198"> <div align="center">PRODUCTID </div></th>
<th width="198"> <div align="center">PNAME </div></th>
<th width="97"> <div align="center">QUANTITY </div></th>
<th width="59"> <div align="center">PURCHASE_DATE </div></th>
</tr>

<?php
for($i=$Page_Start;$i<$Page_End;$i++)
{?>	
	<tr>
	<!--<td><div align="center"><?=$Result['PURCHASEID'][$i];?></div></td>-->
	<td><div align="center"><?=$Result["PRODUCTID"][$i];?></div></td>
	<td><a style="color:black" href="Complaint_Feedback.php?c_id=<?PHP echo $Result["PRODUCTID"][$i] ?>"><div align="center"><?=$Result["PNAME"][$i];?></div></a></td>
	<td><div align="center"><?=$Result["QUANTITY"][$i];?></div></td>
	<td><div align="center"><?=$Result["PURCHASE_DATE"][$i];?></div></td>
	</tr>
<?php } ?>
<p><em>Click on a Product Name to give a complaint or feedback</em></p>
</table>
<br>
<!--Begin: syntax for self redirect-->
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
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
</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</div>
</body>
</html>