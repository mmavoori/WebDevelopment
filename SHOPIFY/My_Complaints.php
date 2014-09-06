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
<h2> My Complaints </h2>
<html>
<head>
<title>PAGING</title>
</head>
<body background="img/background9.jpg">
<button type="button" class="btn btn-primary" style="right:2%; position:absolute; top:1%;" onclick="window.location.href='Closed_Complaints.php';">ClosedComplaints</button>
<?php
//require_once ('./paginator.class.php');
//GIVE CORRECT PASSWORD NOT STARS
session_start();
$userid=$_SESSION['userid'];
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$statement = oci_parse($connection, 'SELECT c.customerid,c.complaintid,p.pname,c.c_description,c.complainttime FROM Step2Shopify_Complaints c,Step2Shopify_Product p where c.status<>2 and c.productid=p.productid and c.customerid='.$userid.'order by c.complainttime desc');
oci_execute($statement,OCI_DEFAULT);

$Num_Rows = oci_fetch_all($statement,$Result);
//    echo "The no. of rows:$Num_Rows<br>\n";

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
<!--<th width="91"> <div align="center">CUSTOMER ID </div></th>-->
<th width="98"> <div align="center">COMPLAINT ID </div></th>
<th width="198"> <div align="center">PRODUCT NAME </div></th>
<th width="97"> <div align="center">DESCRIPTION </div></th>
<!--<th width="59"> <div align="center">priority </div></th>-->
<th width="71"> <div align="center">COMPLAINT TIME </div></th>
<th width="71"> <div align="center">CLOSE </div></th>
</tr>

<?php
for($i=$Page_Start;$i<$Page_End;$i++)
{?>	
	<tr>
	<!--<td><div align="center"><?=$Result['CUSTOMERID'][$i];?></div></td>-->
	<td><a style="color:black" href="Return_Complaint.php?c_id=<?PHP echo $Result["COMPLAINTID"][$i] ?>"><div align="center"><?=$Result["COMPLAINTID"][$i];?></div></a></td>
	<td><div align="center"><?=$Result["PNAME"][$i];?></div></td>
	<td><div align="center"><?php $words = explode(';', $Result['C_DESCRIPTION'][$i]);
		$k=floor(sizeof($words)/2); $j=(sizeof($words)-1);
		while($j>=0){
		echo "<b>USER".$k.":</b> ".$words[$j]."<br>";$k--;$j--;
		if($j>=0 && $k>=0){
		echo "<b>ADMIN".$k.":</b> ".$words[$j]."<br>";$j--;}}?></div></td>
	<!--<td><div align="center"><?=$Result["PRIORITY"][$i];?></div></td>-->
	<td><div align="center"><?=$Result["COMPLAINTTIME"][$i];?></div></td>
	<td><div align="center"><a href="usercomplaintclosed.php?comp_id=<?PHP echo $Result["COMPLAINTID"][$i] ?>">close complaint</a></div></td>
	</tr>
<?php } ?>
<p><em>Click on a Complaint ID if you want to return it to Admin</em></p>

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