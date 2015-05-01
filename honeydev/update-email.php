<?Php
include "include/session.php";
include "config.php";
require "check.php";
?>
<!doctype html>
<html>
<head>
<title>Update Profile | HoneyDev</title>
</head>
<body>
<?Php
//collect the user data
$todo=$_POST['todo'];
$email=$_POST['email'];

if(isset($todo) and $todo=="update-email")
{
	// set the flags for validation and messages
	$status = "OK";
	$msg="";

	if (strlen($email) < 9)
	{
		$msg=$msg."Enter a valid Email Address<BR>";
		$status= "NOTOK";
	}

	if($status<>"OK")
	{ // if validation failed
		echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='<< Take me Back' onClick='history.go(-1)'>";
	}
	else
	{ // if all validations are passed.
		$sql=$dbo->prepare("update hw_detail set email=:email where userid='$_SESSION[userid]'");
		$sql->bindParam(':email',$email,PDO::PARAM_STR, 30);
		if($sql->execute())
		{
			echo "<br/><br/><br/><center><font face='Verdana' size='2' color=green>You have successfully updated your email to $email</font></center>";
		}
		else
		{
			print_r($sql->errorInfo());
			$msg=" <font face='Verdana' size='2' color=red>There was some problem.<br>We are working on it.</font>";
		}
	}
	/* echo $msg; */
}
?>
</body>
</html>
