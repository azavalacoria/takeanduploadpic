<?php
$agent = $_SERVER['HTTP_USER_AGENT'];
$data = explode(" ", $agent);

$iosDevice = substr($data[1], 1, strlen($data[1]) - 2);

$isAppleDevice = false;
$androidDevice = false;

if (strcmp($iosDevice, "iPhone") == 0) {
	$isAppleDevice = true;
} elseif (strcmp($iosDevice, "iPad") == 0) {
	$isAppleDevice = true;
}
else if (strcmp($data[2], "Android") == 0) {
	$androidDevice = true;
} else {
	$isAppleDevice = false;
}

if ($isAppleDevice || $androidDevice) {
	$file = file_get_contents("mobileVersion.php");
} else {
	$file = file_get_contents("mobileVersion.php");
}

echo "$file";
?>