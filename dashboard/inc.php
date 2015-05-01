<?php
	include "config.php";
	$trigger=$dbo->prepare("TRUNCATE TABLE `breach`");
	$trigger->execute();
	echo "<script type='text/javascript'>
				window.location='breach.php';
			  </script>";
?>