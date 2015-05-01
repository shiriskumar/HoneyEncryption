<?Php
include "include/session.php";
include "config.php";
?>
<!doctype html>
<html>
<head>
<title>Update Profile | HoneyDev</title>
</head>
<body>
<?Php
require "check.php";
$todo=$_POST['todo'];
$name=$_POST['name'];

if(isset($todo) and $todo=="update-name")
{
	// set the flags for validation and messages
	$status = "OK";
	$msg="";

	if (strlen($name) < 5)
	{
		$msg=$msg."Your name  must be more than 5 char length<BR>";
		$status= "NOTOK";
	}


	if($status<>"OK")
	{ // if validation failed
		echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='<< Take me Back.' onClick='history.go(-1)'>";
	}
	else
	{ // if all validations are passed.
		$sql=$dbo->prepare("update hw_detail set name=:name where userid='$_SESSION[userid]'");
		$sql->bindParam(':name',$name,PDO::PARAM_STR, 20);
		if($sql->execute())
		{
			echo "<font face='Verdana' size='2' color=green>We have successfully updated your name, $name<br></font>";
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
