<?Php
include "include/session.php"; //Start a session
include "config.php";//Database connection details stored here

//get the variables via. URL
$ak=$_GET['ak'];
$userid=$_GET['email'];

?>
<!doctype html>

<html>
<head>
<title>Change Password | HoneyDev</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/profile_update.css" media="screen" type="text/css" />
<style>
	body{
			background: url(images/14.jpg) center fixed;
			background-size: cover;
		}
</style>
</head>
<body >
<?Php
$tm=time()-86400; // Durationg within which the key is valid is 86400Sec or 24Hrs. 

//get the details of the user, if exists
$sql=$dbo->prepare("SELECT * FROM hw_fpkey,hw_detail WHERE pkey=:ak and hw_detail.email=:email and time > '$tm' and status='pending'");
$sql->bindParam(':email',$email,PDO::PARAM_STR, 10);
$sql->bindParam(':ak',$ak,PDO::PARAM_STR, 43);
$sql->execute();
$no=$sql->rowCount();

//check if there exists only single instance of the query 
if($no <> 1){
	echo "<center><font face='Verdana' size='2' color=red><b>Wrong activation </b></font> "; 
	exit;
}


////////////////////// Show the change password form //////////////////

echo "<h1><font color=white>Activate Password</font></h1><br/><center>
<fieldset><p>Change Password</p>
<form action='activepasswordck.php' method=post>
<input type=hidden name=todo value=new-password>
<input type=hidden name=ak value=$ak>
<input type=hidden name=email value=$email>
<input type ='password' class='bginput' name='password' placeholder='New Password'>
<input type ='password' class='bginput' name='password2' placeholder='Re-enter New Password'>
<input type=submit value='Change Password'>
</font></form></fieldset></center>";
?>
<script href="js/placeholder.js"></script>';
</body>
</html>