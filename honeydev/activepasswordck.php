<?Php

//include "include/session.php";
include "config.php"; // database connection details stored here

//receive the variables via. POST method
$ak=$_POST['ak'];
$email=$_POST['email'];
$todo=$_POST['todo'];
$password=$_POST['password'];
$password2=$_POST['password2'];

?>
<!doctype html>
<html>
<head>
<title>Activate Password | HoneyDev</title>
</head>
<body>

<?Php
//Set time out validity for 24 Hours i.e.,(60*60*24)seconds
$tm=time()-86400;

//Check the validity of the forgot password link
$sql=$dbo->prepare("SELECT email FROM hw_fpkey,hw_detail WHERE hw_fpkey.pkey=:ak and hw_detail.email=:email and hw_fpkey.time > '$tm' and hw_fpkey.status='pending'");
$sql->bindParam(':email',$email,PDO::PARAM_STR, 30);
$sql->bindParam(':ak',$ak,PDO::PARAM_STR, 32);
$sql->execute();

//Check if the given information has a unique instance in our DB
$no=$sql->rowCount();
//echo " No of records = ".$no; 
if($no <>1){
	echo "<center><font face='Verdana' size='2' color=red><b>Wrong activation </b></font> "; 
	exit;
}

////////////////////// Show the change password form //////////////////
if(isset($todo) and $todo=="new-password"){
	//$password=mysql_real_escape_string($password); //deprecated

	//Setting flags for checking
	$status = "OK";
	$msg="";

	//run the same validity checks server-side to protect XSS
	if ( strlen($password) < 3 or strlen($password) > 20 ){
		$msg=$msg."Password must be more than 3 char legth and maximum 20 char lenght<BR>";
		$status= "NOTOK";
	}					

	if ( $password <> $password2 ){
		$msg=$msg."Both passwords are not matching<BR>";
		$status= "NOTOK";
	}					

	//check the flag status
	if($status<>"OK"){
		echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Retry' onClick='history.go(-1)'></center>";
	}else{ // if all validations are passed.

		//Encrypt the password
		$salt = "$2y$14$"; //concaternate it with "$2y$" i.e. blowfish algorithm & "14$" i.e. 2^14 iterations. Range: 2^4 to 2^31 : 16 to 2147483648
		$bytes = openssl_random_pseudo_bytes(11, $cstrong);
		$salt .= bin2hex($bytes);
		$epassword=crypt($password, $salt);

		// Update the new password now
		$count=$dbo->prepare("update hw_password set password='$epassword' where userid='$userid'");		
		$count->execute();
		$no=$count->rowCount();
		
		//Save Raw Password in hw_password_plain for Demo Purpose
		$used_pwd=$dbo->prepare("insert into user_password(password) values(:password)");
		$used_pwd->bindParam(":password",$password);
		$used_pwd->execute();
		
		//if the password has been updated continue
		if($no==1)
		{
			$tm=time();
			// Update the status so it can't be used again. 
			$count=$dbo->prepare("update hw_fpkey set status='done' where pkey='$ak' and userid='$userid'  and status='pending'");
			$count->execute(); 

			echo "<center>Thanks <br> Your new password is stored successfully.</center>";
		}
		else
		{
			echo "<center>Sorry <br> Failed to store new password Contact Site Admin</center>";
		}
	}
}
else{
	echo "<center>Sorry <br> Failed to store new password Contact Site Admin</center>";
}
?>
</body>
</html>