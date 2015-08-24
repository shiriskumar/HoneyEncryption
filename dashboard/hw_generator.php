<?php
//connect to DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "honeydev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Find if HoneyChecker Online or not
$test = $conn->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'honeydev' AND table_name = 'honeychecker' LIMIT 1;");
$count = $test->fetch_array(MYSQLI_NUM);

if($count[0]==1){
	echo "HoneyChecker Status : Online</br>";
	//Check for any logs, when HoneyChecker was Offline.
	function getLog($conn){
		$logs = $conn->query("SELECT sno FROM system_log ORDER BY sno DESC LIMIT 1");
		$log_count = $logs->num_rows;
		if($log_count == 0){
			echo "Log Availability : Not Available</br>";
			//break;
			}
		else{//Log Exists

			echo "Log(s) Available : " . $log_count . "</br>";
			//Get Details of Last Login Attempt.
			$fetch_log = $conn->query("SELECT userid,password,os_types,brw_types,ip FROM system_log ORDER BY sno DESC LIMIT 1;");
			$fetch_row = mysqli_fetch_assoc($fetch_log);
			$fetch_id = $fetch_row['userid'];
			$fetch_pass = $fetch_row['password'];
			$fetch_os = $fetch_row['os_types'];
			$fetch_brw = $fetch_row['brw_types'];
			$fetch_ip = $fetch_row['ip'];
		//Run Initial Checks
		//--------------------------------------------------------------
		//	Check if UserID exists
		echo "Activity : Running Initial Tests</br>";
		$check_avail=$conn->query("select userid from hw_detail where userid='$fetch_id'");
		$check_cnt = mysqli_num_rows($check_avail);
		if($check_cnt == 0 ) //UserID doesn't exist
		{
			echo "Log Result : Wrong UserID</br>";
			$conn->query("DELETE FROM `system_log` ORDER BY sno DESC LIMIT 1");
			getLog($conn);
		}
		else{
			//Check Passed, Now Check the Fetched Password with the available Hashed Passwords
			echo "Log Result : Existing UserID</br>";
			//fetch position of the correct password from the honey-checker
			$hw_key=$conn->query("SELECT position FROM honeychecker WHERE userid='$fetch_id'");
			$hw_row = $hw_key->fetch_assoc();
			$correct_position = $hw_row["position"];
			echo "Correct Position : " . $correct_position . "</br>";
			//few initialisations
			$fieldno = 50;
			$i=0;

			function redirection($conn,$fieldno, $correct_position, $fetch_os, $fetch_brw, $fetch_ip){
				if($fieldno==$correct_position){
					//True User
					echo "Activity : Saving Client Analytics Details</br>";
					$conn->query("INSERT INTO `analytics`(`os_types`, `brw_types`, `ip`) VALUES ('$fetch_os','$fetch_brw','$fetch_ip')");
					$conn->query("DELETE FROM `system_log` ORDER BY sno DESC LIMIT 1");
					getLog($conn);
				}
				else{
					//Save Breachers Details
					echo "Activity : Saving Breacher's Analytics Details</br>";
					$conn->query("INSERT INTO `breach`(`os_types`, `brw_types`, `ip`) VALUES ('$fetch_os','$fetch_brw','$fetch_ip')");
					$conn->query("DELETE FROM `system_log` ORDER BY sno DESC LIMIT 1");
					getLog($conn);
				}
			}
			for($i=0;$i<20; $i++){
				// i=0->19 but, position=1->20 So, set accordingly.
				$position = $i + 1;
				echo "Checking Hashed Password Position : " . $position . "</br>";
				//prepare field number for SQL Query
				$password_position = "password" . $position;
				
				$get_pwd=$conn->query("SELECT $password_position FROM hw_password WHERE userid = '$fetch_id'");
				$fetch_pwd = mysqli_fetch_assoc($get_pwd);
				$get_hash_pwd = $fetch_pwd["$password_position"];
				
				//Compare user password with obtained hashed password from DB
				if($get_hash_pwd==crypt($fetch_pass,$get_hash_pwd)){
					//if matches, get the matched position and break
					$fieldno = $position;
					break;
				}
			}
			if($fieldno<21){
			//pass the variables while calling function
			echo "Activity : Password mached with one of the Hashed Password</br>";
			redirection($conn,$fieldno, $correct_position, $fetch_os, $fetch_brw, $fetch_ip);
			}
			//if its a normal password mismatch try again
			else{
				echo "Activity : Wrong Password entry found</br>";
				$conn->query("DELETE FROM `system_log` ORDER BY sno DESC LIMIT 1");
				getLog($conn);
			}
		}
	}
	}
	getLog($conn);
	
	//Select last signUp detail
	$ping1 = $conn->query("SELECT userid FROM hw_detail ORDER BY sno DESC LIMIT 1;");
	$ping1_row = $ping1->fetch_assoc();
	$ping_id = $ping1_row['userid'];
	//echo $ping_id . "test </br>";
	//Verify if the last userID Signed Up has a set of Honeywords.
	$ping2 = $conn->query("SELECT password1, password2 FROM hw_password_plain where userid='$ping_id'");
	$ping2_row = $ping2->fetch_assoc();
	$ping_p1 = $ping2_row['password1'];
	$ping_p2 = $ping2_row['password2'];
	echo "Checking UserID Details of: " . $ping_id . "</br></br>";

	if($ping_p2==NULL||$ping_p1==NULL){ //this is a new column
		echo "Sweet Words not set for " . $ping_id . "</br>";
		$hc = $conn->query("select position from honeychecker WHERE userid='$ping_id'");
		$hc_row = $hc->fetch_assoc();
		$password_col = "password" . $hc_row['position'];
		$hc_2 = $conn->query("select $password_col from hw_password_plain WHERE userid='$ping_id'");
		$hc_2_row = $hc_2->fetch_assoc();
		
		//assign values
		$password = $hc_2_row[$password_col];
		$userid = $ping_id;
		
		//set a time limit
		set_time_limit(80);
		
		//Generate 4 random numbers with sum 19
		//----------------------------------------------------------
		$number_of_groups   = 4;
		$sum_to             = 19;

		$groups             = array();
		$group              = 0;

		while(array_sum($groups) != $sum_to)
		{
			$groups[$group] = mt_rand(0, $sum_to/mt_rand(1,5));

			if(++$group == $number_of_groups)
			{
				$group  = 0;
			}
		}
		//echo $sum_to/mt_rand(1,5);
		if ( ! isset($groups[0])){$groups[0] = null;} //handle error if value is null
		if ( ! isset($groups[1])){$groups[1] = null;}
		if ( ! isset($groups[2])){$groups[2] = null;}
		if ( ! isset($groups[3])){$groups[3] = null;}

		$mod1 = $groups[0];
		$mod2 = $groups[1]; //no(module2) = no(module2)
		$mod3 = $groups[2]; //no(module3) = no(module3)
		$mod4 = $groups[3]; //for Nutshell
		$mod = $mod1 + $mod2; //no(module1) = no(module1)+no(module2) as module2 uses pwds of module1
		echo "mod1: " . $mod1 . "</br>";
		echo "mod2: " . $mod2 . "</br>";
		echo "mod3: " . $mod3 . "</br>";
		echo "mod4: " . $mod4 . "</br>";
		echo "mod 1 + 2: " . $mod . "</br>";

		//Module 1: Chaffing
		//----------------------------------------------------------
		ob_start(); //start buffering

		//system('C:\Python34\python.exe hw_generator.py shiris passwords.txt'); //working
		passthru("C:\Python34\python.exe hw_generator.py $password $mod passwords.txt"); //working

		$myStr = ob_get_contents(); //save output contents to a buffer var

		ob_end_clean(); //stop buffering
		$pieces = explode(" ", $myStr); //explode the string to array
		print_r($pieces);

		//Module 2: Chaffing by tweaking
		//----------------------------------------------------------
		echo "</br>in module 2</br>";

		for($i=0; $i<$mod2; $i++){
			$no1 = rand(0, sizeof($pieces) - 1); //select a random number
			$a = $pieces[$no1]; //assign the random element to a variable
			$noise = rand(1, 999); //create a numeric noise
			$pieces = array_replace($pieces, array($no1 => $a.$noise)); //update the array with the noisy array element
		}
		print_r($pieces);


		//Module 3: Other Random user passwords
		//----------------------------------------------------------
		$max_passno = $conn->query("SELECT * FROM user_password");
		$count_actual = $max_passno->num_rows;
		$count = $count_actual - 1; //Because the last entry in the passwords will be the actual password of the client. Hence this can, in the worst case, may select the last password as a sweet-word & will cause confusion during password verification.
		echo "</br>total count : " . $count . "</br>";
		$temp_array = array(); //initialise an empty array
		for($j=1; $j<=$mod3; $j++){
			$no2 = rand(1, $count); //select a random number
			echo "</br>Random no. : " . $no2 . "</br>";
			$my_task = "SELECT password FROM user_password WHERE sno=$no2";
			$result_new = $conn->query($my_task);
			$row = $result_new->fetch_assoc();
			$element = $row['password'];
			echo $element;
			array_push($temp_array, $element);
			echo "</br>";
		}
		echo "</br>";
		print_r($temp_array);
		
		
		//Module 4: Generate Tough Nut Password
		//---------------------------------------------------------
		$nut_array = array(); //initialise an empty array
		for($l=1; $l<=5; $l++)
			{
				$no3 = rand(5, 20);//decides the length of the Tough Nut password
				$nut_ele = "";
				$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
				for($i=0;$i<$no3;$i++){
				$nut_ele.=substr($chars,rand(0,strlen($chars)),1);}
				echo $nut_ele;
				array_push($nut_array, $nut_ele);
			}
			
		echo "</br>";
		print_r($nut_array);

		//Merge all the arrays created in the 3 modules
		//----------------------------------------------------------
		echo "</br> Merigng Module </br>";
		$final_array = array_merge($pieces, $temp_array, $nut_array);//merge the 3 arrays
		echo "</br>final_array:</br>";
		print_r ($final_array);
		echo "</br></br>Shuffled Array:</br>";
		shuffle($final_array); //shuffle the order of final_array
		print_r ($final_array) . "</br>";


		//Store the decoy passwords in the table
		//----------------------------------------------------------
		for($k=1,$i=0; $k<=20; $k++){		//check if the table cell is empty to be filled
			$element_col = "password" . $k;
			echo "</br>" . $element_col . "</br>";
			$check = $conn->query("select $element_col from hw_password WHERE userid='$userid'");
			$checkres=mysqli_fetch_array($check,MYSQLI_ASSOC);
			print_r($checkres);
			if($checkres[$element_col]==''){
				echo "</br> CHECK: True</br>";		
				//for($l=0; $l<=sizeof($final_array); $l++){
					echo "</br>inside for l=$k loop</br>";
					$password = $final_array[$i];
						
					//dynamic salting
					$salt = "$2y$14$"; //concatenate it with "$2y$" i.e. blowfish algorithm & "14$" i.e, 2^14 iterations. Range: 2^4 to 2^31 : 16 to 2147483648
					$bytes = openssl_random_pseudo_bytes(11, $cstrong);
					$salt .= bin2hex($bytes);
					$epassword=crypt($password, $salt); // Encrypt the password & salt before storing
					echo "</BR>" .$password . "=>" . $epassword . "</br>";
					$qstr1="UPDATE hw_password_plain SET $element_col='$password' where userid='$userid'";
					echo $qstr1;
					$qstr2="UPDATE hw_password SET $element_col='$epassword' WHERE userid='$userid'";
					echo $qstr2;
					mysqli_query($conn,"UPDATE hw_password_plain SET $element_col='$password' where userid='$userid'");	//Demo Purpose
					mysqli_query($conn,"UPDATE hw_password SET $element_col='$epassword' WHERE userid='$userid'");	//Actual Usage
					echo "</br>Success!!</br>";
					$i++;
				//}
			}
			else{
				echo "</br>Check else block</br>";
			}
		}
		mysqli_close($conn);
		echo "
		<html>
		<head>
		<meta http-equiv='refresh' content='5'>
		</head>
		<body>";
		}
	else{ 
		echo "
			<html>
			<head>
			<meta http-equiv='refresh' content='1'>
			</head>
			<body>";
		echo date(DATE_RFC2822) . "</br> Records Already Set!</br></br>";
	}
}
else{
		echo "Honeychecker is Offline!" . "</br>" .  date(DATE_RFC2822);
		echo "
			<html>
			<head>
			<meta http-equiv='refresh' content='1'>
			</head>
			<body>";
}
?>