<?
include "config.php"; // database connection details stored here

?>
<!doctype html>

<html>

<head>
  <meta charset="UTF-8">
<title>Signup | HoneyDev</title>
<script src="js/bzf3ugx.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<link rel='stylesheet prefetch' href='css/font-awesome.min.css'>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type="text/javascript"> 
 function validate()
{
	var NAME=document.f1.name.value;
	
	var EMAIL1=document.f1.email1.value;
	var EMAIL2=document.f1.email2.value;
	
	var PASSWORD1=document.f1.password1.value;
    var PASSWORD2=document.f1.password2.value;
	
	var CHECKBOX=document.f1.checkbox.value;
	
	if(NAME==null||NAME==""||
		EMAIL1==null||EMAIL1== ""||
        EMAIL2==null||EMAIL2== ""||
		PASSWORD1==null||PASSWORD1== ""||
		PASSWORD2==null||PASSWORD2== "")
	{
	  alert('please enter full details');
	  return false;
	}
	return true;
	
	if(strlen(NAME)<=4)
	{
	  aleart('Name shall contain more than 4 letters');
	  return false;
    }
	return true;
	
	if(strlen(PASSWORD1)<6)
	{
	  aleart('Size of the password shall be more than 6');
	  return false;
        }
	return true;
	
	if(PASSWORD1 != PASSWORD2)
	{
		alert('The Passwords do not match');
		return false;
	}
	return true;
	
	if (!document.form1.agree.checked)
		{ 
			alert("Please Read the guidlines and check the box below  ."); 
			return false;
		} 
		return true;
}
</script>
</head>

<body>
  <div class='container'>
  <header>
    <h2>Sign up, it’s free</h2>
    <p>It is a long established fact that a reader will be distracted</p>
  </header>
  <!-- / START Form -->
  <div class='form'>
<form name=f1 method=post action=signupck.php onsubmit='return validate(this)'>
<input type=hidden name=todo value=post>

 <div class='field'>
        <label for='username'>User ID</label>
  <input name="userid" type="text" maxlength="10" required placeholder="User ID" autofocus autocomplete="off"/>
  </div>
      <div class='field'>
	   <label for='username'>Username</label>
  <input name="name" type="text" maxlength="20" required placeholder="Name" autofocus autocomplete="off"/>
 </div>
      <div class='field'>
        <label for='email'>Email Address</label>
  <input name="email1" type="email" required autofocus placeholder="Email" maxlength="30" id="email1" autocomplete="off"/>
   </div>
      <div class='field'>
        <label for='email'> Repeat Email Address</label>
  <input name="email2" type="email" required autofocus placeholder="Confirm Email" maxlength="30" id="email2" autocomplete="off"/>
 </div>
      <div class='field'>
        <label for='password'>Password</label>
  <input name="password1" type="password" required autofocus maxlength="20" autocomplete="off" placeholder="Password" id="password1"/>
   </div>
      <div class='field'>
        <label for='password'>Repeat Password</label>
  <input name="password2" type="password" required autofocus autocomplete="off" maxlength="20" placeholder=" Confirm Password" id="password2"/></div>
<div class='checkbox'>
        <input type="checkbox" name="agree" required value="yes">
        <label for='checkbox'>
          By signing up, you agree with the
          <a href='agreement.html'>terms and conditions</a>
        </label>
      </div>
  <button>Submit</button>
   </form>
  </div>
    <!-- / END Form -->
</div>
  <script src='js/jquery.js'></script>
</body>
</html>