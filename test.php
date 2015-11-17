<?php
/*
$agent = $_SERVER['HTTP_USER_AGENT'];
$data = explode(" ", $agent);

for ($i=0; $i < sizeof($data) ; $i++) { 
	echo "$i =>".$data[$i]."<br>";
}

$iosDevice = substr($data[1], 1, strlen($data[1]) - 2);
echo "<br>".$iosDevice."<br>";
$isApple = false;
$androidDevice = false;

if (strcmp($iosDevice, "iPhone") == 0) {
	$isApple = true;
	echo "es movil iPhone <br>";
} elseif (strcmp($iosDevice, "iPad") == 0) {
	$isApple = true;
	echo "es movil iPad <br>";
}
else if (strcmp($data[2], "Android") == 0) {
	$androidDevice = true;
	echo "es movil Android";
} else {
	$iosDevice = false;
}

if ($isApple || $androidDevice) {
	echo "es movil";
} else {
	echo "es web";
}

*/

$date = new DateTime('now');
echo $date->format('Y_m_d_H_i_s');

?>