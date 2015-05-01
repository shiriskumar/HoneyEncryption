<?Php
include "include/session.php";
include "config.php";
require "check.php";// check the login details of the user and stop execution if not logged in
?>
<!doctype html>
<html>
<head>
<title>Update profile</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/profile_update.css" media="screen" type="text/css" />
<style>
	body{
			background: url(images/14.jpg) no-repeat center fixed;
			background-size: cover;
		}
</style>
</head>
<body >
<?Php
// let us collect all data of the member 
$count=$dbo->prepare("select * from hw_detail where userid='$_SESSION[userid]'");
if(!($count->execute())){
echo "Database Problem ";
exit;
}else{
$row = $count->fetch(PDO::FETCH_OBJ);
}

echo '<h1><font color=white>Updation Centre</font></h1><br/><center>
<fieldset>
<p>Update my Profile</p>
<form action="update-email.php" method=post>
<input type=hidden name=todo value=update-email>
<input type="email" autofocus placeholder="My new mail address is" maxlength="30" autocomplete="off" name="email">
<input type="submit" value="Update Email"></form><br/>
<form action="update-name.php" method=post>
<input type=hidden name=todo value=update-name>
<input type="text" autofocus placeholder="Update my Name" maxlength="20" autocomplete="off" name="name">
<input type="submit" value="Update Name">
</form>
</fieldset></center>
<script href="js/placeholder.js"></script>';
?>
</body>
</html>
