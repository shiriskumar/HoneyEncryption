<?php
//get the configuration for DB Connection
include "config.php";

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

//function to get the Operating system of the User
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown";
    $os_array       =   array(
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/android/i'            =>  'Android',
							'/windows phone/i'      =>  'Windows Phone',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   
    return $os_platform;
}

//function to get the Browser of the User
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Google Chrome',
                            '/opr/i'        =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
							'/IEMobile/i'   =>  'Mobile IE',
                            /* '/mobile/i'     =>  'Handheld Browser' */
                        );

    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

//retrieve the value
$user_os        =   getOS();
$user_browser   =   getBrowser();
//echo $user_os . "</br>" . $user_browser . "</br>";
//$device_details =   "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";
//print_r($device_details);

//function to get the IP Address of the User
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
//echo $myip;

//Works correctly if you use on real server, localhost gives up local IP Address
/* function nacountryCityFromIP($ipAddr){
	//verify the IP address
	ip2long($ipAddr)== -1 || ip2long($ipAddr) === false ? trigger_error("Invalid IP", E_USER_ERROR) : "";
	$ipDetail=array(); //initialize a blank array

	//get the XML result from hostip.info
	$xml = file_get_contents("http://api.hostip.info/get_html.php?ip=".$ipAddr."&position=true");

	//get the Country name
	preg_match("/Country: (.*)\n/",$xml,$match);

	//assigning the country name to the array
	$ipDetail['country']=$match[1]; 

	//get the city name
	preg_match("/City: (.*)\n/",$xml,$matches);

	//assign the city name to the $ipDetail array
	$ipDetail['city']=$matches[1];

	//get the Latitude
	preg_match("/Latitude: (.*)\n/",$xml,$lat);
	$ipDetail['latitude']=$lat[1];

	//get the Longitude
	preg_match("/Longitude: (.*)\n/",$xml,$lon);
	$ipDetail['longitude']=$lon[1];

	//return the array containing city, country and country code
	return $ipDetail;
}
$IPDetail=nacountryCityFromIP($myip);
echo "</br>";
echo $IPDetail['country']."--";
echo $IPDetail['city']."--";
echo $IPDetail['latitude']."--";
echo $IPDetail['longitude']."--"; */

//Save the user details to the table
$analytics=$dbo->prepare("INSERT INTO breach (os_types,brw_types,ip) VALUES (:user_os,:user_browser,:ip)");
$analytics->bindParam(':user_os', $user_os ,PDO::PARAM_STR);
$analytics->bindParam(':user_browser', $user_browser ,PDO::PARAM_STR);
$analytics->bindParam(':ip', $myip ,PDO::PARAM_STR);
$analytics->execute();

//redirect the user to Decoy Welcome Page
echo "<script type='text/javascript'>
		window.location='we1come'; 
	  </script>
	";// page name looks much similar to welcome, Social Engineering
?>