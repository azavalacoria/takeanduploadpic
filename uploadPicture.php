<?php
if($_FILES['photo']['name'])
{
	if(!$_FILES['photo']['error'])
	{
		$date = new DateTime('now');
		$filename = 'imagen_'.$date->format('Y_m_d_H_i_s').'.jpg';
		
		
		move_uploaded_file($_FILES['photo']['tmp_name'], 'imagenes/'.$filename);
		$message = 'File uploaded.';
	}

	else
	{
		$message = 'Error at up:  '.$_FILES['photo']['error'];
	}
}
echo "$message<br>";
?>