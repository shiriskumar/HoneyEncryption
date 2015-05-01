<?php
include "include/session.php";
include "config.php";

$userid=$_POST['userid'];
$pass=$_POST['pass'];
?>
<html>
<head>
<title>Login | Honeydev</title>
</head>
<body>
<?php
$msg='';
$status='OK';

//Server Side verification to protect XSS
if(!isset($userid) or strlen($userid) <3){
	$msg=$msg."User ID should be >=3 char length<BR>";
	$status= "NOTOK";
}					
if ( strlen($pass) < 3 ){
	$msg=$msg."Password must be more than 3 char length<BR>";
	$status= "NOTOK";
}					
if($status<>"OK"){
	echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
	exit;
}

//fetch position of the correct password from the honey-checker
$hw_key=$dbo->prepare('SELECT position FROM honeychecker WHERE userid=:userid');
$hw_key->bindParam(':userid', $userid ,PDO::PARAM_STR);
$hw_key->execute();
$temp = $hw_key->fetch(PDO::FETCH_OBJ);
$correct_position=$temp->position;

//few initialisations
$fieldno = 50;
$i=0;

//redirection function
function redirection($fieldno, $correct_position, $userid){
	if($fieldno==$correct_position){
		//True User
		$_SESSION['userid']=$userid; //Set Session
		echo "<script type='text/javascript'>
				window.location='analytics.php';
			  </script>
			"; //Redirect True user to analytics & then to Welcome Page
	}
	else{
		echo "<script type='text/javascript'>
				window.location='ana1ytics.php';
			  </script>
			"; //Redirect Breacher to Decoy Page
	}
}

for($i=0;$i<20; $i++){
	// i=0->19 but, position=1->20 So, set accordingly.
	$position = $i + 1;
	
	//prepare field number for SQL Query
	$password_position = "password" . $position;
	
	$count=$dbo->prepare("SELECT $password_position FROM hw_password WHERE userid = :userid");
	$count->bindParam(':userid', $userid ,PDO::PARAM_STR);
	$count->execute();
	$row = $count->fetch(PDO::FETCH_OBJ);
	
	//assign obtained password to variable
	$password=$row->$password_position;
	
	//Compare user password with obtained hashed password from DB
	if($password==crypt($pass,$password)){
		//if matches, get the matched position and break
		$fieldno = $position;
		break;
	}
}

if($fieldno<21){
	//pass the variables while calling function
	redirection($fieldno, $correct_position, $userid);
}
//if its a normal password mismatch try again
else{
	$msg = " Login failed, try again... <br><INPUT TYPE='button' VALUE='Retry Login' onClick='history.go(-1);'>";
}

//print message only if there 
if($msg != ""){
	echo $msg;
}
?>
</html>