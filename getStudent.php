<?php
define('ADODB_ASSOC_CASE', 2);
include 'adodb/adodb.inc.php';
//define('ADODB_FETCH_ASSOC',2);

$numberOfControl = 0;
if (isset($_POST['numberOfControl'])) {
	$numberOfControl = $_POST['numberOfControl'];
}
else 
{
	$numberOfControl = 1;
}

$db = NewADOConnection('mysql');
$db->Connect('localhost', 'hawkzc2', 'z3k3100', 'hawkzc2_camara');
$db->SetFetchMode(ADODB_FETCH_ASSOC);
$result = $db->Execute("select * from alumnos where numeroDeControl = '".$numberOfControl."';");

if ($result === false) {
	echo json_encode(array('error' => true));
}
else 
{
	$count = $result->RecordCount();
	$error = false;
	$alumno = null;

	while (!$result->EOF) {
		$alumno = $result->fields;
		$result->MoveNext();
	}

	$data = array('error' => $error, 'count' => $count, 'alumno' => $alumno);
	echo json_encode($data);
}

?>