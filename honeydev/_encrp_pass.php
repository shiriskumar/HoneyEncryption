<?php
		$password = "adityavikas";
		$salt = "$2y$14$"; //concaternate it with "$2y$" i.e. blowfish algorithm & "14$" i.e. 2^14 iterations. Range: 2^4 to 2^31 : 16 to 2147483648
		$bytes = openssl_random_pseudo_bytes(11, $cstrong);
		$salt .= bin2hex($bytes);
		$epassword=crypt($password, $salt);
		echo $epassword;
		//UPDATE `hw_password_plain` SET `password2`=$2y$14$031502619291043646e94uHCb34JcZdEFykCWaEbNTPwZ0rfhRUa2 WHERE `userid`=aditya;
?>
