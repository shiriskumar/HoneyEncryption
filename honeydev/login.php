<html>
<head>
<title>Login | HoneyDev</title>
 <link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
 <link rel="stylesheet" href="css/googlefont.css">
 </head>
<body>
	<div class="container">
	<div id="login">
		<form action='loginck.php' method=post>
			<fieldset class="clearfix">
			<p><span class="fontawesome-user"></span>
			<input type ="text" maxlength="20" required placeholder="User ID" autocomplete="off" autofocus name='userid'></p>
			<p><span class="fontawesome-lock"></span>
			<input type ='password'  required autofocus maxlength="20" autocomplete="off" placeholder="Password" name='pass'></p>
			<p><input type='submit' value='Sign In'></p></fieldset>
		</form>
		<p>Not a member? <a href='signup'>Sign up now</a><span class="fontawesome-arrow-right"></span></p>
		<p><a href=forgot-password>Forgot Password ?</a><span class="fontawesome-arrow-right"></span></p>
	</div></div>
</body>
</html>