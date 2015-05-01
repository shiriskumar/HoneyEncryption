<?Php
//Check for Session availability
if(!isset($_SESSION['userid'])){
	header('Location: session_out');
	exit;
}else{
	echo "
		<link rel='stylesheet' href='css/nav.css'>
		<script src='js/jquery-latest.min.js' type='text/javascript'></script>
		<script src='js/modernizr.js'></script>

		<div id='cssmenu'>
			<ul>
				<li><a href=welcome><span>$_SESSION[userid]'s Home</span></a></li>
				<li><a href=update-profile><span>Update Profile</span></a></li>
				<li><a href='change-password'><span>Change Password</span></a></li>
				<li class='last'><a href='logout'><span>Logout</span></a></li>
			</ul>
		</div>";
}
?>