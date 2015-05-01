<?Php
include "include/session.php";

include "config.php";
?>
<!doctype html>

<html>

<head>
<title>Change Password</title>
</head>

<body>
<?Php
// check the login details of the user and stop execution if not logged in
require "check.php";
///////Collect the form data /////
$todo=$_POST['todo'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$old_password=$_POST['old_password'];
/////////////////////////

if(isset($todo) and $todo=="change-password"){
$status = "OK";
$msg="";

			
$count=$dbo->prepare("select password from hw_password where userid=:userid");
$count->bindParam(":userid",$_SESSION['userid'],PDO::PARAM_STR, 15);
$count->execute();
$row = $count->fetch(PDO::FETCH_OBJ);
$saved_password=$row->password;

if($row->password==crypt($password,$saved_password)){
$msg=$msg."Your old password  is not matching as per our record.<BR>";
$status= "NOTOK";
}					

if ( strlen($password) < 3 or strlen($password) > 20 ){
$msg=$msg."Password must be more than 3 char legth and maximum 20 char lenght<BR>";
$status= "NOTOK";}					

if ( $password <> $password2 ){
$msg=$msg."Both passwords are not matching<BR>";
$status= "NOTOK";}					



if($status<>"OK"){ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Retry' onClick='history.go(-1)'></center>";
}else{ // if all validations are passed.

		//dynamic salting
		$salt = "$2y$14$"; //concaternate it with "$2y$" i.e. blowfish algorithm & "14$" i.e. 2^14 iterations. Range: 2^4 to 2^31 : 16 to 2147483648
		$bytes = openssl_random_pseudo_bytes(11, $cstrong);
		$salt .= bin2hex($bytes);
		$epassword=crypt($password, $salt); // Encrypt the password & salt before storing

$sql=$dbo->prepare("update hw_password set password=:epassword where userid='$_SESSION[userid]'");
$sql->bindParam(':epassword',$epassword,PDO::PARAM_STR, 32);
if($sql->execute()){
				//Save Raw Password in user_password table
			$used_pwd=$dbo->prepare("insert into user_password(password) values(:password)");
			$used_pwd->bindParam(":password",$password);
			$used_pwd->execute();
echo "<font face='Verdana' size='2' ><center>Thanks <br> Your password changed successfully. Please keep changing your password for better security</font></center>";
}else{echo "<font face='Verdana' size='2' color=red><center>Sorry <br> Failed to change password Contact Site Admin</font></center>";
} // end of if else if updation of password is successful
} // end of if else if status <>OK
} // end of if else todo
?>
</body>

</html>
