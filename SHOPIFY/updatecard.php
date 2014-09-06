<?PHP
$cardtype=$_POST['cardtype'];
$rechargevalue=$_POST['rechargevalue'];

//echo $cardtype;
//echo $rechargevalue;
session_start();
$userid=$_SESSION['userid'];

//Set default userid as 3
if(!isset($userid))
$userid=3;

include("dbconnect.php");
$updatecardvalue = "update STEP2SHOPIFY_USER set points=$rechargevalue where userid=$userid";
$updatecardvalueResult = oci_parse($connection, $updatecardvalue);
$updateresult=oci_execute($updatecardvalueResult);

//SUCCESS CONDITION
if($updateresult){
	$msg="Recharged Successfully!!!";
				header("location:usernew.php?v=$msg"); 

	
}

//FAILURE CONDITION
else{
	$msg="Recharge failed!!!";
				header("location:ManageCardPage.php?v=$msg"); 

}
?>