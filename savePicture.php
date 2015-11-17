<?php

$rawData = $_POST['imgBase64'];
//echo "<img src='".$rawData."' />"; // Show photo

list($type, $rawData) = explode(';', $rawData);
list(, $rawData)      = explode(',', $rawData);
$unencoded = base64_decode($rawData);

$filename = 'imagen_'.date('dmYHi').'_'.rand(1111,9999).'.jpg'; // Set a filename
file_put_contents("imagenes/$filename", base64_decode($rawData)); // Save photo to folde

?>