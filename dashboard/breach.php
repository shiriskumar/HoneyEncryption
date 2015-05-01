<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Breach Detail</title>

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800'>

    <link rel="stylesheet" href="css/breach.css" media="screen" type="text/css" />

</head>

<body>

  <div class='container'>
  <?php
	include "config.php";
	$count=$dbo->prepare("select * from breach");
	$count->execute();
	$no=$count->rowCount();
	if($no >0 ){
		$row = $count->fetch(PDO::FETCH_OBJ);
		$os=$row->os_types;
		$brw=$row->brw_types;
		$ip=$row->ip;
		echo "
		  <h1>
			HoneyDev
			<span>Breached!</span>
		  </h1>
		  <h2>
			Operating System : $os
		  </h2>
			<h2>
			Browser : $brw
		  </h2>
			<h2>
			IP Address : $ip
		  </h2>";?>
			<input onclick="javascript: window.location='inc.php';" type='button' name="submit" value="Patch Breach" />
<?php
	}
	else{
		echo "
			<h1>
				HoneyDev is
				<span>SAFE!</span>
			</h1>";
	}
	?>
</div>
</body>
</html>