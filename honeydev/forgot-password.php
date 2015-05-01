<?Php
include "include/session.php";
?>
<!doctype html>
<html>
<head>
	<title>Forgot Password | HoneyDev</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/forgot.css">
	<link rel="stylesheet" href="css/normalize.css">
</head>
<?Php
if(isset($_SESSION['userid'])){
	echo " You are loggedin as $_SESSION[userid], you can <a href=logout.php>logout</a> here";
}else {
	echo '<body><div class="page"><br><br><br><br><br>
	<h1>Forgot Password ?<BR>Ping me your mail address &hellip;</h1> 
	<form action="forgot-passwordck.php" method=post>
	<input type ="email" maxlength="30" name="email" required autofocus placeholder="Email" autocomplete="off">
	<input type="submit" value="Reset"></form><br/>
	<h4><a href="login">Login </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="signup"> I am new Here</a></h4></div>';
}
?>
<script src="js/prefixfree.min.js"></script>
</body>
</html>
