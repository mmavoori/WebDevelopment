<?PHP
include_once("dbconnect.php");
$arrayofprods=array();
$querylatestprods="select productID from step2shopify_product order by dateofaddition desc";
$result = oci_parse($connection, $querylatestprods);
oci_execute($result);
while($res = oci_fetch_array($result))
{
//echo $res[0];
array_push($arrayofprods,$res[0]);

}
//echo $arrayofprods[0];
//print_r($arrayofprods);


?>
