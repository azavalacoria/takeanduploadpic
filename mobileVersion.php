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
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">
				<form method="post" action="uploadPicture.php" enctype="multipart/form-data">
					<input type="file" accept="image/*" name="photo">
					<input type="submit" name="submit" value="Subir">
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>