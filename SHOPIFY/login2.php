
<html><head><title>Login Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Step2Shopify</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">


<?php
$connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
						  
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$query = "SELECT * FROM Step2Shopify_User WHERE EMAILID='".$myusername."' and password='".$mypassword."'";
$result = oci_parse($connection, $query);
oci_execute($result);
$numrows = oci_fetch_all($result, $res);
if($numrows!=0){
$result1 = oci_parse($connection, "SELECT * FROM Step2Shopify_User WHERE EMAILID='".$myusername."' and password='".$mypassword."'");
oci_execute($result1);
$row = oci_fetch_array($result1, OCI_BOTH);
$name= $row['FNAME']." ".$row['LNAME'];
$utype= $row['USERTYPE'];
$userid= $row['USERID'];
$street=$row['STREET'];
$city=$row['CITY'];
$state=$row['STATE'];
$zipcode=$row['ZIPCODE'];
$country=$row['COUNTRY'];
$email=$row['EMAILID'];
session_start();
$_SESSION['name']=$name;
$_SESSION['street']=$street;
$_SESSION['city']=$city;
$_SESSION['state']=$state;
$_SESSION['zipcode']=$zipcode;
$_SESSION['country']=$country;
$_SESSION['email']=$email;
$_SESSION['userid']=$userid;
}
oci_free_statement($result);
oci_close($connection);
if($numrows==0)
{
$msg="Please enter correct username & password!!!";
				header("location:index.php?v=$msg");
}
	
	if($utype==1 and $numrows>0)
	{
		header("location:admin.php"); 

     } 
	if($utype==0 and $numrows >0){
			$msg=" ";
			header("location:usernew.php?v=$msg"); 
	}
?>
<!--<meta http-equiv="refresh" content="1;url=/userL.php">
        <script type="text/javascript">
            window.location.href = "/INTEGRATED/usernew.php"
        </script>-->
</head>
</html>