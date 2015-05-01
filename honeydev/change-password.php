<?Php
include "include/session.php";
include "config.php";
// check the login details of the user and stop execution if not logged in
require "check.php";
?>
<!doctype html>

<html>

<head>
<title>Change Password</title>
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
echo '<h1><font color=white>Privacy Settings</font></h1><br/>
<center><br/><fieldset>
<p>Change  Password</p>

<form action="change-passwordck.php" method=post><input type=hidden name=todo value=change-password>

<input type ="password" class="bginput" name="old_password" placeholder="Current Password">
<input type ="password" class="bginput" name="password" placeholder="New Password">
<input type ="password" class="bginput" name="password2" placeholder="Confirm Password">
<input type=submit value="Change Password!">
</form>
</fieldset></center>
<script href="js/placeholder.js"></script>';
?>

</body>

</html>
