<?php session_start(); ?>
<?php //$_SESSION['p_id']=$_GET['p_id']; ?>
<?php $p_id=$_SESSION['p_id']; ?>
<?php $userid=$_SESSION['userid']; ?>

<?php
$connection =  oci_connect($username = 'sritapa',
                         $password = 'Electromec123',
                         $connection_string = '//oracle.cise.ufl.edu/orcl');
						 

  
$query = "SELECT CATEGORYID FROM STEP2SHOPIFY_PRODUCT where PRODUCTID =$p_id";
$result = oci_parse($connection, $query);
oci_execute($result);

//$c_id=$_POST['CATEGORYID'];

while($res = oci_fetch_array($result))
{
$c_id=$res[0];
}
echo $c_id;

//$userid = '3000166';

$query2 = "insert into STEP2SHOPIFY_SUBSCRIPTION(USERID ,CATEGORYID,PRODUCTID) values(:userid,:cat_id,:prod_id)";
$result2 = oci_parse($connection, $query2);

oci_bind_by_name($result2,':userid',$userid);
oci_bind_by_name($result2,':cat_id',$c_id);
oci_bind_by_name($result2,':prod_id',$p_id);
$que2=oci_execute($result2);

if($que2){
$suc="Subscription done!!";
//begib:emailcode

// begin: Code for email sending
//$userid='3500007';

$query = "select emailid from step2shopify_user where userid=$userid";
$result = oci_parse($connection, $query);
oci_execute($result);

//$c_id=$_POST['CATEGORYID'];

while($res = oci_fetch_array($result))
{
$emailid=$res[0];
}

//echo $emailid;

require("class.phpmailer.php"); // path to the PHPMailer class
 
$mail = new PHPMailer();  
 
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "hellodummy08@gmail.com"; // SMTP username
$mail->Password = "heydummy08"; // SMTP password 
 
$mail->From     = "hellodummy08@gmail.com";
$mail->FromName = 'Step2Shopify';
$mail->AddAddress($emailid);  
$mail->addAttachment('./img/PRODUCTS/'.$p_id.'.jpg');
$mail->Subject  = "Product Subscribed ";
$mail->Body     = "Hi! \n\n You are subscribed for product:$p_id";
$mail->WordWrap = 50;  
 
if(!$mail->Send()) {
				echo 'Message was not sent.';
				echo 'Mailer error: ' . $mail->ErrorInfo;
					} else {
				echo 'Message has been sent.';
					} 

// end :code for email sending



//end:email code
}
else{
$suc="Multiple Subscriptions not allowed";
} 
?>


<?php session_start(); ?>
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
<body background="img/background9.jpg">




<div id="bottom_div">
<?php $image_path="img/PRODUCTS/" ?>
<?php $image_extension=".jpg" ?>

<?php //$_SESSION['p_id']=$_GET['p_id']; ?>
<?php $p_id=$_SESSION['p_id']; ?>


<div id = 'Product-Specifications'
   style="
      top: 99;
      left: 200;
      position: absolute;
      z-index: 1;
      visibility: show;">
<img width="300" height="300" 
src= "<?php echo $image_path.$p_id.$image_extension?>" />
</div>

<div id = 'Product-Specifications'
   style="
      top: 200;
      left: 700;
      position: absolute;
      z-index: 1;
      visibility: show;">

<?php $connection = oci_connect($username = 'sritapa',
                          $password = 'Electromec123',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
?>
<table>
<col width="600"> 
<td>
<?php $query = "select * from step2shopify_product WHERE productid='".$p_id."'";	?>
<?php $result = oci_parse($connection, $query);
oci_execute($result);
while($row=oci_fetch_array($result,OCI_BOTH))
{ ?>

<?php
echo "<p>Product Details ID# &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp"; 
echo $row[0];
echo "<div style ='font:30px Verdana,tahoma,sans-serif;color:#00000'> $row[1] </div>";
echo "<br/>";
echo "<div style ='font:25px Arial,tahoma,sans-serif;color:#00000'> $ $row[3] </div>";
echo "<br />\n";
echo "<br />\n";
echo "<div style ='font:20px Arial,tahoma,sans-serif;color:#00000'> Stock Left :- $row[4] </div>";
} 
?>
</td>
</table>
</div>


<div id = 'Product-Specifications'
   style="
      top: 450;
      left: 200;
      position: relative;
      z-index: 1;
      visibility: show;">



<table>
<tr>
<form action = "subscription.php" method="get">
<button  type="submit" class="btn btn-primary">Subscription</button>
</form> 
<?php echo $suc ?>
</tr>
</table>
</div>
</body>
</html>



