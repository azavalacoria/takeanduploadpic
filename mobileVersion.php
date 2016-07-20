<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-escalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="header">
	</div>
	<div class="container">
		<div class="row">
			<form method="post" action="uploadPicture.php" enctype="multipart/form-data">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<label>Número de Control</label>
					<br>
					<input type="number" class="form-control" id="control-number" maxlength="8">
					<div>
						<label id="names"></label> <br>
						<label id="first-lastname"></label> <br>
						<label id="second-lastname"></label> <br>
					</div>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">
					<br><br><br>
					<input type="number" class="form-control">
					<input type="file" accept="image/*" name="photo">
					<input type="submit" name="submit" value="Subir">
				
			</div>
			</form>
		</div>
	</div>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>