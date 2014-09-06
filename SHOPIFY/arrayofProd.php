<?PHP
include_once("dbconnect.php");
$arrayofprods=array();
$querylatestprods="select productID from step2shopify order by dateofaddition desc";
$result = oci_parse($connection, $querylatestprods);
oci_execute($result);
while($res = oci_fetch_array($result))
{
$arrayofprods=array($res[0]);
}

echo $arrayofprods[1];


?>
