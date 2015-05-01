<?Php
include "include/session.php"; 
include "config.php";

//destroy session if exists
session_unset();
session_destroy();
?>

<!doctype html>
<html>
<head>
<title>Logout | HoneyDev</title>
<style>
	body{
			background: url(images/12.jpg) no-repeat center fixed;
			background-size: cover;
		}
	.semi-transparent-button {
			  display: block;
			  box-sizing: border-box;
			  margin: 0 auto;
			  padding: 8px;
			  width: 80%;
			  max-width: 200px;
			  background: #fff; /* fallback color for old browsers */
			  background: rgba(255, 255, 255, 0.5);
			  border-radius: 8px;
			  color: #fff;
			  text-align: center;
			  text-decoration: none;
			  letter-spacing: 1px;
			  transition: all 0.3s ease-out;
		}
		.semi-transparent-button:hover,
		.semi-transparent-button:focus,
		.semi-transparent-button:active {
			  background: #fff;
			  color: #000;
			  transition: all 0.5s ease-in;
		}
</style>
</head>
<body>
<br/><br/><center><font face='Verdana' size='3' color=white>Successfully logged out. See you soon!<br><br><a class="semi-transparent-button" href=login>Login Again</a></font></center>
</body>
</html>

