<html>
<head>
<meta http-equiv="refresh" content="5">
</head>
<body bgcolor=#383B42>
<font size="6" color=#F6F6EF>HoneyDev.</font>
<?php
include "config.php";
$count=$dbo->prepare("select * from breach");
$count->execute();
$no=$count->rowCount();
if($no >0 )
{
echo "
<br/>
<br/>
<audio controls loop autoplay>
  <source src='2.mp3' type='audio/mpeg'>
Your browser does not support the audio element.
</audio>";
}
?>
</body>
</html>