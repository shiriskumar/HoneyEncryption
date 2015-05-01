<?Php
include "config.php"; // database connection details stored here

// Collect the data from post method of form submission
$userid=$_POST['userid'];
$name=$_POST['name'];
$email=$_POST['email1'];
$email2=$_POST['email2'];
$password=$_POST['password1'];
$password2=$_POST['password2'];
$agree=$_POST['agree'];
$todo=$_POST['todo'];
?>
<!doctype html>
<html>
<head>
	<title>Signup | HoneyDev</title>
</head>
<body >
<?Php
if(isset($todo) and $todo=="post")
{

	$status = "OK";
	$msg="Alert! ";


	if(!isset($userid) or strlen($userid) <3)
	{
		$msg=$msg."Length of User ID shall be more than 3 characters<BR>";
		$status= "NOTOK";
	}					

	if(!ctype_alnum($userid))
	{
		$msg=$msg."User id should contain alphanumeric characters only<BR>";
		$status= "NOTOK";
	}					


	$count=$dbo->prepare("select userid from hw_detail where userid=:userid");
	$count->bindParam(":userid",$userid);
	$count->execute();
	$no=$count->rowCount();

	if($no >0 )
	{
		$msg=$msg."User Name already exists. Choose a different User Name<br>";
		$status= "NOTOK";
	}

	$count=$dbo->prepare("select email from hw_detail where email=:email");
	$count->bindParam(":email",$email);
	$count->execute();
	$no=$count->rowCount();

	if($no >0 )
	{
		$msg=$msg."This Email Address is already registered. Try Forgot Password else enter another Email Address<BR>";
		$status= "NOTOK";
	}
	
	if ( strlen($name) < 5 )
	{
		$msg=$msg."Name must be more than 5 characters length<BR>";
		$status= "NOTOK";
	}

	if ( strlen($password) < 3 )
	{
		$msg=$msg."Password must be more than 3 characters length<BR>";
		$status= "NOTOK";
	}					

	if ( $email <> $email2 )
	{
		$msg=$msg."Both Emails are not matching<BR>";
		$status= "NOTOK";
	}

	if ( $password <> $password2 )
	{
		$msg=$msg."Both passwords are not matching<BR>";
		$status= "NOTOK";
	}					

	if(!isset($agree) || $agree!="yes" ) 
	{
		$msg=$msg."You must agree to terms and conditions<BR>";
		$status= "NOTOK";
	}	

	if($status<>"OK")
	{ 
		echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
	}
	else
	{ // if all validations are passed.

		//dynamic salting
		$salt = "$2y$14$"; //concaternate it with "$2y$" i.e. blowfish algorithm & "14$" i.e. 2^14 iterations. Range: 2^4 to 2^31 : 16 to 2147483648
		$bytes = openssl_random_pseudo_bytes(11, $cstrong);
		$salt .= bin2hex($bytes);
		$epassword=crypt($password, $salt); // Encrypt the password & salt before storing

		
		$random = rand(1, 20);
		$temp = "password" . $random;
		//insert values into tables
		//-------------------------------------------------------------------------------------------
		//User Details in hw_detail
		$detail=$dbo->prepare("insert into hw_detail(userid,name,email) values(:userid,:name,:email)");
			$detail->bindParam(':userid',$userid,PDO::PARAM_STR, 10);
			$detail->bindParam(':email',$email,PDO::PARAM_STR, 30);
			$detail->bindParam(':name',$name,PDO::PARAM_STR, 20);
			
		//Encrypted Password in hw_password
		$enc_pwd=$dbo->prepare("insert into hw_password(userid,$temp) values(:userid,:epassword)");
			$enc_pwd->bindParam(':userid',$userid,PDO::PARAM_STR, 10);
			$enc_pwd->bindParam(':epassword',$epassword,PDO::PARAM_STR, 60);
			
		//insert actual position of password in honey-checker
		$h_check=$dbo->prepare("insert into honeychecker(userid,position) values(:userid,:position)");
			$h_check->bindParam(':userid',$userid,PDO::PARAM_STR, 10);
			$h_check->bindParam(":position",$random, 2);
			
		//Save Raw Password in user_password table for Module3 Password Generation
		$used_pwd=$dbo->prepare("insert into user_password(password) values(:password)");
			$used_pwd->bindParam(":password",$password);
			
		//save the same plain password for demo purpose
		$raw_pwd=$dbo->prepare("insert into hw_password_plain(userid,$temp) values(:userid,:password)");
			$raw_pwd->bindParam(':userid',$userid,PDO::PARAM_STR, 10);
			$raw_pwd->bindParam(":password",$password);
			
		if($detail->execute() && $enc_pwd->execute() && $h_check->execute() && $raw_pwd->execute())
		{
			
			exec("php-cli  python.php $password $userid"); //create sweet words
			//exec('file.php') doesn't work, it's a PHP Bug #11430.To execute PHP inside a PHP Script, use php-cli.
			
			echo "<font face='Verdana' size='2' color=green><h2>Welcome,</h2>You have successfully signed up<br></font>";
			
			//Posting confirmation mail //
			$to=$email;
			$subject = 'Registration Confirmation';
			$message=" Hi!  $name \n";
			$message .="Thank you for registering. This is a HoneyDev. Project \n";

			// To send HTML mail, the Content-type header must be set
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			mail($to, $subject, $message, $headers);
			//////////////// End of posting mail ////////

			echo "<font face='Verdana' size='2' color=green>Please Check your Inbox for confirmation mail.<br>
			<a href=login.php>Click here to login</a><br></font>";
		}// if sql executed 
		/* else{print_r($sql1->errorInfo()); print_r($sql2->errorInfo()); } */
	}
}
// end of todo if condition
?>
</body>
</html>
