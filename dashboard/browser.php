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

$brw1 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Internet Explorer'");
$br1 = mysqli_fetch_array($brw1);
$br1_COUNT = $br1['COUNT(*)'];

$brw2 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Firefox'");
$br2 = mysqli_fetch_array($brw2);
$br2_COUNT = $br2['COUNT(*)'];

$brw3 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Safari'");
$br3 = mysqli_fetch_array($brw3);
$br3_COUNT = $br3['COUNT(*)'];

$brw4 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Google Chrome'");
$br4 = mysqli_fetch_array($brw4);
$br4_COUNT = $br4['COUNT(*)'];

$brw5 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Opera'");
$br5 = mysqli_fetch_array($brw5);
$br5_COUNT = $br5['COUNT(*)'];

$brw6 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Netscape'");
$br6 = mysqli_fetch_array($brw6);
$br6_COUNT = $br6['COUNT(*)'];

$brw7 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Maxthon'");
$br7 = mysqli_fetch_array($brw7);
$br7_COUNT = $br7['COUNT(*)'];

$brw8 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Konqueror'");
$br8 = mysqli_fetch_array($brw8);
$br8_COUNT = $br8['COUNT(*)'];

$brw9 = mysqli_query($conn,"SELECT COUNT(*) FROM analytics WHERE brw_types='Mobile IE'");
$br9 = mysqli_fetch_array($brw9);
$br9_COUNT = $br9['COUNT(*)'];

$os_un = mysqli_query($conn,"SELECT COUNT(*) from analytics where os_types='unknown'");
$unknown = mysqli_fetch_array($os_un);
$un_COUNT = $unknown['COUNT(*)'];
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Statistics Browser</title>
 <link rel="stylesheet" href="css/normalize.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="css/legend.css" media="screen" type="text/css" />
 <script src="js/prefixfree.min.js"></script>
</head>
<body>
  <main>
  <h1>Statistics</h1>
  <p>Page views by Browser.</p>
  <section>
    <div class="pieID pie">

    </div>
    <ul class="pieID legend">
    <?php
	  if($br1_COUNT>0){ echo "
	  <li>
        <em>IE</em>
        <span>$br1_COUNT</span>
      </li>";}

	  if($br2_COUNT>0){ echo "
	  <li>
        <em>Firefox</em>
        <span>$br2_COUNT</span>
      </li>";}

	  if($br3_COUNT>0){ echo "
	  <li>
        <em>Safari</em>
        <span>$br3_COUNT</span>
      </li>";}

	  if($br4_COUNT>0){ echo "
	  <li>
        <em>Chrome</em>
        <span>$br4_COUNT</span>
      </li>";}

	  if($br5_COUNT>0){ echo "
	  <li>
        <em>Opera</em>
        <span>$br5_COUNT</span>
      </li>";}

	  if($br6_COUNT>0){ echo "
	  <li>
        <em>Netscape</em>
        <span>$br6_COUNT</span>
      </li>";}

	  if($br7_COUNT>0){ echo "
	  <li>
        <em>Maxthon</em>
        <span>$br7_COUNT</span>
      </li>";}

	  if($br8_COUNT>0){ echo "
	  <li>
        <em>Konqueror</em>
        <span>$br8_COUNT</span>
      </li>";}

	  if($br9_COUNT>0){ echo "
	  <li>
        <em>Mobile IE</em>
        <span>$br9_COUNT</span>
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
    <p><center>Honey Encryption :: HoneyDev :: Statistics :: Browser</center></p>
  </section>
</main>
	<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
	<script src="js/index.js"></script>
</body>
</html>