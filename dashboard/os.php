<?php
error_reporting(E_ALL);
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

$uos1 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows 8.1'");
$os1 = mysqli_fetch_array($uos1);
$os1_COUNT = $os1['COUNT(*)'];

$uos2 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows 8'");
$os2 = mysqli_fetch_array($uos2);
$os2_COUNT = $os2['COUNT(*)'];

$uos3 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows 7'");
$os3 = mysqli_fetch_array($uos3);
$os3_COUNT = $os3['COUNT(*)'];

$uos4 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows Vista'");
$os4 = mysqli_fetch_array($uos4);
$os4_COUNT = $os4['COUNT(*)'];

$uos5 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows Server'");
$os5 = mysqli_fetch_array($uos5);
$os5_COUNT = $os5['COUNT(*)'];

$uos6 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows XP'");
$os6 = mysqli_fetch_array($uos6);
$os6_COUNT = $os6['COUNT(*)'];

$uos7 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows XP'");
$os7 = mysqli_fetch_array($uos7);
$os7_COUNT = $os7['COUNT(*)'];

$uos8 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Mac OS X'");
$os8 = mysqli_fetch_array($uos8);
$os8_COUNT = $os8['COUNT(*)'];

$uos9 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Mac OS 9'");
$os9 = mysqli_fetch_array($uos9);
$os9_COUNT = $os9['COUNT(*)'];

$uos10 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Linux'");
$os10 = mysqli_fetch_array($uos10);
$os10_COUNT = $os10['COUNT(*)'];

$uos11 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Ubuntu'");
$os11 = mysqli_fetch_array($uos11);
$os11_COUNT = $os11['COUNT(*)'];

$uos12 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='iPhone'");
$os12 = mysqli_fetch_array($uos12);
$os12_COUNT = $os12['COUNT(*)'];

$uos13 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Android'");
$os13 = mysqli_fetch_array($uos13);
$os13_COUNT = $os13['COUNT(*)'];

$uos14 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Windows Phone'");
$os14 = mysqli_fetch_array($uos14);
$os14_COUNT = $os14['COUNT(*)'];

$uos15 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='BlackBerry'");
$os15 = mysqli_fetch_array($uos15);
$os15_COUNT = $os15['COUNT(*)'];

$uos16 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE os_types='Mobile'");
$os16 = mysqli_fetch_array($uos16);
$os16_COUNT = $os16['COUNT(*)'];


$os_un = mysqli_query($conn,"SELECT COUNT(*) from analytics where os_types='Unknown'");
$unknown = mysqli_fetch_array($os_un);
$un_COUNT = $unknown['COUNT(*)'];
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Statistics OS</title>
 <link rel="stylesheet" href="css/normalize.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="css/legend.css" media="screen" type="text/css" />
 <script src="js/prefixfree.min.js"></script>
</head>
<body>
  <main>
  <h1>Statistics</h1>
  <p>Page views by OS.</p>
  <section>
    <div class="pieID pie">

    </div>
    <ul class="pieID legend">
    <?php
		if($os1_COUNT>0){ echo "
	  <li>
        <em>Windows 8.1</em>
        <span>$os1_COUNT</span>
      </li>";}

	  	  if($os2_COUNT>0){ echo "
	  <li>
        <em>Windows 8</em>
        <span>$os2_COUNT</span>
      </li>";}

	  	  if($os3_COUNT>0){ echo "
	  <li>
        <em>Windows 7</em>
        <span>$os3_COUNT</span>
      </li>";}

	  	  if($os4_COUNT>0){ echo "
	  <li>
        <em>Windows Vista</em>
        <span>$os4_COUNT</span>
      </li>";}

	  	  if($os5_COUNT>0){ echo "
	  <li>
        <em>Windows Server</em>
        <span>$os5_COUNT</span>
      </li>";}

	  	  if($os6_COUNT>0){ echo "
	  <li>
        <em>Windows XP</em>
        <span>$os6_COUNT</span>
      </li>";}

	  	  if($os7_COUNT>0){ echo "
	  <li>
        <em>Windows XP</em>
        <span>$os7_COUNT</span>
      </li>";}

	  	  if($os8_COUNT>0){ echo "
	  <li>
        <em>Mac OS X</em>
        <span>$os8_COUNT</span>
      </li>";}

	  	  if($os9_COUNT>0){ echo "
	  <li>
        <em>Mac OS 9</em>
        <span>$os9_COUNT</span>
      </li>";}

	  	  if($os10_COUNT>0){ echo "
	  <li>
        <em>Linux</em>
        <span>$os10_COUNT</span>
      </li>";}

	  	  if($os11_COUNT>0){ echo "
	  <li>
        <em>Ubuntu</em>
        <span>$os11_COUNT</span>
      </li>";}

	  	  if($os12_COUNT>0){ echo "
	  <li>
        <em>iPhone</em>
        <span>$os12_COUNT</span>
      </li>";}

	  	  if($os13_COUNT>0){ echo "
	  <li>
        <em>Android</em>
        <span>$os13_COUNT</span>
      </li>";}

	  	  if($os14_COUNT>0){ echo "
	  <li>
        <em>Windows Phone</em>
        <span>$os14_COUNT</span>
      </li>";}

	  	  if($os15_COUNT>0){ echo "
	  <li>
        <em>BlackBerry</em>
        <span>$os15_COUNT</span>
      </li>";}

	  	  if($os16_COUNT>0){ echo "
	  <li>
        <em>Mobile</em>
        <span>$os16_COUNT</span>
      </li>";}

	  if($un_COUNT>0) { echo "
	  <li>
        <em>Unknown</em>
        <span>$un_COUNT</span>
      </li>";}
	?>
    </ul>
  </section>
  <section>
    <p><center>Honey Encryption :: HoneyDev :: Statistics :: OS</center></p>
  </section>
</main>
	<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
	<script src="js/index.js"></script>
</body>
</html>