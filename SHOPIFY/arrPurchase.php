<?PHP
include_once("dbconnect.php");
$arrayofpurchase=array();
$querypurchase="select productid,sum(quantity) as net from step2shopify_purchase group by productid order by net desc";
$result = oci_parse($connection, $querypurchase);
oci_execute($result);
while($res = oci_fetch_array($result))
{
//echo $res[0];
array_push($arrayofpurchase,$res[0],$res[1]);

}
//echo $arrayofprods[0];
//print_r($arrayofpurchase);


?>
