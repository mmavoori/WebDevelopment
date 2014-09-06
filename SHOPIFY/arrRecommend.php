<?PHP
include_once("dbconnect.php");
//include_once("arr.php");
session_start();
$userid=$_SESSION['userid'];
//if(!empty($userid))
//$userid=3002009;

$countofProds=array();
$arrayofrecommendedProds=array();

$querycountofProdsPurchased="select count(*) from step2shopify_purchase where userid='$userid'";
$result = oci_parse($connection, $querycountofProdsPurchased);
oci_execute($result);
while($res = oci_fetch_array($result))
	{
//echo $res[0];
	array_push($countofProds,$res[0]);

	}

$_SESSION['countofprodspurchased']=$countofProds[0];
//echo $countofProds[0];
if($countofProds[0] > 5)
{
	
	$queryrecommendedProds="select productid,userid,sum(quantity) as net from step2shopify_purchase group by userid,productid having userid='$userid' order by net desc";
	$result = oci_parse($connection, $queryrecommendedProds);
	oci_execute($result);
	while($res = oci_fetch_array($result))
	{
//echo $res[0];
	array_push($arrayofrecommendedProds,$res[0]);

	}
}

else{

	$temparrayofpurchase=array();
$tempquerypurchase="select productid,sum(quantity) as net from step2shopify_purchase group by productid order by net desc";
$tempresult = oci_parse($connection, $tempquerypurchase);
oci_execute($tempresult);
while($res = oci_fetch_array($tempresult))
{
//echo $res[0];
array_push($temparrayofpurchase,$res[0],$res[1]);

}

$arrayofrecommendedProds[0]=$temparrayofpurchase[0];
$arrayofrecommendedProds[1]=$temparrayofpurchase[2];
$arrayofrecommendedProds[2]=$temparrayofpurchase[4];
$arrayofrecommendedProds[3]=$temparrayofpurchase[6];
$arrayofrecommendedProds[4]=$temparrayofpurchase[8];
$arrayofrecommendedProds[5]=$temparrayofpurchase[10];

}	
//echo $arrayofprods[0];
//print_r($arrayofrecommendedProds);




?>
