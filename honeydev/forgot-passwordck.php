<?php
	include "include/session.php";
	include "config.php";
	
	$email=$_POST['email'];
	
	//Function to get the IP Address of the User
	function getIp(){
		$ip = $_SERVER['REMOTE_ADDR'];     
		if($ip){
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			return $ip;
		}
		// There might not be any data
		return false;
	}
	$myip = getIp();
	
	//Create URL for the user
	$site_url= $myip . "/honeydev/";
	
	$status = "OK";
	$msg="";
	//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ 
		$msg="Your email address is not correct<BR>"; 
		$status= "NOTOK";
	}
//	echo "<br><br>";
	if($status=="OK")
	{  
		//Get UserID for given email
		$count=$dbo->prepare("SELECT userid FROM hw_detail WHERE hw_detail.email = '$email'");
		$count->execute();
		$row = $count->fetch(PDO::FETCH_OBJ);
		$no=$count->rowCount();
		//echo " No of records = ".$no; 
		
		$userid=$row->userid;
		if ($no == 0)
		{
			echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br> Sorry Your address is not there in our database . You can signup and login to use our site. <BR><BR><input type='button' value='Retry' onClick='history.go(-1)'> . <a href='signup.php'> Sign UP </a> </center>"; exit;
		}
		else
		{
			/// check if activation is pending /////
			$tm=time() - 86400; // Time in last 24 hours
			$count=$dbo->prepare("SELECT userid FROM hw_fpkey WHERE userid = '$row->userid' and time > $tm and status='pending'");
			$count->execute();
			$no=$count->rowCount();
			//echo " No of records = ".$no; 
			
			if($no==1)
			{
				echo "<center><font face='Verdana' size='2' color=red><b>Your Password activation link has been sent to your email. Please check your Inbox. "; 
				exit;
			}
			
			//store details & time to DB
			$key=rtrim(base64_encode(md5(microtime())),"=");
			$tm=time();
			$sql=$dbo->prepare("insert into hw_fpkey(userid,pkey,time,status) values('$row->userid','$key','$tm','pending')");
			$sql->execute();
			//print_r($sql->errorInfo()); 
			
			/////////////// Let us send the email with key /////////////
			$to=$email;
			$subject="Forgot Password";
			/* $headers = "Content-Type: text/html; charset=iso-8859-1\n" .$headers;// for html mail un-comment this line */
			$site_url="http://".$site_url."activepassword.php?ak=$key&email=$email";
			//echo $site_url;
			$msg=$msg."This is in response to your request for login details at site_name \n \nLogin ID: $row->userid \n To reset your password, please visit this link( or copy and paste this link in your browser window )\n\n
			\n\n$site_url\n\n Thank You \n \n siteadmin";
			echo $msg;
			
			if(mail("$to","$subject","$msg"))
			{
				echo "<center><font face='Verdana' size='2' ><b>THANK YOU</b> <br>Your check your email to reset the password. Please check your mail after some time. </center>";
			 }
			else
			{
				echo "<center><font face='Verdana' size='2' color=red >There is some system problem in sending login details to your address. Please contact site-admin.<br>Email:<br><br>$msg <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";
			}
		}
	}
?>