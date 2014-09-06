<?PHP

/*$goldvalue=10000;
$silvervalue=1000;
$bronzevalue=100;*/



$usertype=0;
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$cardtype=$_POST['cardtype'];
$zip=$_POST['zip'];



/*Begin: Set value of $points
if($cardtype=='Gold')
$points=$goldvalue;
else if($cardtype=='Silver')
$points=$silvervalue;
else if($cardtype=='Bronze')
$points=$bronzevalue;
End: Set value of $points */



//Just printing to know if its correct 
//retriving the data send by post

/*
echo "uname".$uname."<br>";
echo "state\n".$state."<br>";
echo "country\n".$country."<br>";
echo "$cardtype\n".$cardtype."<br>";
*/

//Begin: DB insert of the registered User 
include_once("dbconnect.php");


$arrayofpoints=array();
$querypoints="select points from step2shopify_card where cardtype='$cardtype'";
$resultcard = oci_parse($connection, $querypoints);
oci_execute($resultcard);
while($res = oci_fetch_array($resultcard))
{
//echo $res[0];
array_push($arrayofpoints,$res[0]);

}
$points=$arrayofpoints[0];

$insertquery = "insert into STEP2SHOPIFY_USER(
USERID,
EMAILID,
PASSWORD,
FNAME,
LNAME,
STREET,
CITY,
STATE,
ZIPCODE,
COUNTRY,
USERTYPE,
POINTS,
CARDTYPE)
values(userid_seq.NEXTVAL,
	:uname,
	:password,
	:fname,
	:lname,
	:street,
	:city,
	:state,
	:zipcode,
	:country,
	:usertype,
	:points,
	:cardtype)";
$insertresult = oci_parse($connection, $insertquery);

//begin: binding all variables
oci_bind_by_name($insertresult,':uname',$uname);
oci_bind_by_name($insertresult,':password',$pwd);
oci_bind_by_name($insertresult,':fname',$fname);
oci_bind_by_name($insertresult,':lname',$lname);
oci_bind_by_name($insertresult,':street',$street);
oci_bind_by_name($insertresult,':city',$city);
oci_bind_by_name($insertresult,':state',$state);
oci_bind_by_name($insertresult,':zipcode',$zip);
oci_bind_by_name($insertresult,':country',$country);
oci_bind_by_name($insertresult,':usertype',$usertype);
oci_bind_by_name($insertresult,':points',$points);
oci_bind_by_name($insertresult,':cardtype',$cardtype);
//end: binding all variables

$queryresult=oci_execute($insertresult);

//SUCCESS CONDITION
if($queryresult){
	
	//header("Location: /INTEGRATED/create1.php");
	//print " user registered.";
	$msg="Registered Successfully!!!";
				header("location:index.php?v=$msg"); 
}

//FAILURE CONDITION
else{
	$msg="Registration Failed!";
				header("location:reg.php?v=$msg"); 

}
	



?>

