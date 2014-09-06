
<html><head><title>Closed Complaints Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<?php
session_start();
$userid=$_SESSION['userid'];
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

$query = "select COMPLAINTID,c_description,COMPLAINTTIME,priority from step2shopify_complaints where status=2 and adminid is not null and customerid=".$userid."
group by COMPLAINTID,c_description,COMPLAINTTIME,priority order by priority,COMPLAINTTIME";
$statement = oci_parse($connection, $query);
oci_execute($statement,OCI_DEFAULT);
//Pagination_START
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
//Pagiantion_END
session_start();
$name= $_SESSION['name'];
$_SESSION['name']=$name;

?>

<div id="container">
<div id="top_div">
<div class="heading">
<h1 align="LEFT"><a href="login.php"><img src="img/logo.jpg" width="187" height="50" alt="" class="img-thumbnail"/></a>   
Step2Shopify</h1></div></div>

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
</div></div>
</div>
</div>
</div>
</head>
<body background="img/background9.jpg">
<div id="bottom_div">
<br><br><br>
<center>
<form action="ComplaintSuccess.php" method="post">
<table width="60%">
<tr>
<th><h4><b>Complaint_ID</b></h4></th>&nbsp;
<th><h4><b>&nbsp;Complaint_Description</b></h4></th>&nbsp;
<th><h4><b>&nbsp;Registered_On</b></h4></th>&nbsp;
<th><h4><b>&nbsp;&nbsp;Priority</b></h4></th>&nbsp;

</tr>
<?php 

for($i=$Page_Start;$i<$Page_End;$i++)
{  ?>
<tr>
<td><?=$Result['COMPLAINTID'][$i];?></td>
<td><?php $words = explode(';', $Result['C_DESCRIPTION'][$i]);
		$k=sizeof($words)/2; $j=(sizeof($words)-1);
		while($j>=0){
		echo "<b>USER".$k.":</b> ".$words[$j]."<br>";$k--;$j--;
		if($j>=0 && $k>=0){
		echo "<b>ADMIN".$k.":</b> ".$words[$j]."<br>";$j--;}}?></td>
<td><?=$Result['COMPLAINTTIME'][$i];?></td>
<td><?=$Result['PRIORITY'][$i];?></td>
</tr>
<?php } ?>
</table><br><br>
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
<div class="topcorner1">
<h4>
</div>
</form>
</center>
</div>
</body>
</html>