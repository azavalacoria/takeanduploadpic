<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-escalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<script>
	// <![CDATA[
	navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ); 
	if (navigator.getUserMedia) {
		navigator.getUserMedia({
			video:true,
			audio:false
		},
		function(stream) { /* do-say something */ },
		function(error) {
			alert('Ocurrió un error: (Código ' + error.code + ')'); 
			return false;
		});
	} else {
		alert("Sorry, the browser you are using doesn't support the HTML5 webcam API");
		return false; 
	}
	// ]]>
	</script>

	<script>
	// <![CDATA[
	// Put event listeners into place
	window.addEventListener("DOMContentLoaded", function() {
		// Grab elements, create settings, etc.
		var canvas = document.getElementById("canvas"),
							context = canvas.getContext("2d"),
							video = document.getElementById("video"),
							videoObj = { "video": true },
							image_format= "jpeg",
							jpeg_quality= 85,
							errBack = function(error) {
								console.log("Video capture error: ", error.code); 
							};
		// Put video listeners into place

		if(navigator.getUserMedia) {
			// Standard
			navigator.getUserMedia(videoObj, function(stream) {
				video.src = stream;
				video.play();
				//$("#snap").show();
			}, errBack);
		} else if(navigator.webkitGetUserMedia) {
			// WebKit-prefixed
			navigator.webkitGetUserMedia(videoObj, function(stream){
				video.src = window.webkitURL.createObjectURL(stream);
				video.play();
				//$("#snap").show();
			}, errBack);
		} else if(navigator.mozGetUserMedia) {
			// moz-prefixed
			navigator.mozGetUserMedia(videoObj, function(stream){
				video.src = window.URL.createObjectURL(stream);
				video.play();
				$("#snap").show();
			}, errBack);
		}

		// video.play(); these 2 lines must be repeated above 3 times
		// $("#snap").show(); rather than here once, to keep "capture" hidden
		// until after the webcam has been activated.
		// Get-Save Snapshot - image

		document.getElementById("snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 640, 480);
				// the fade only works on firefox?
				$("#video").hide();
				$("#canvas").fadeIn();
				$("#snap").hide();
				$("#reset").show();
				$("#upload").show();
			});
		// reset - clear - to Capture New Photo
		document.getElementById("reset").addEventListener("click", function() {
				$("#canvas").hide();
				$("#video").fadeIn();
				$("#snap").show();
				$("#reset").hide();
				$("#upload").hide();
			});

		document.getElementById("clear").addEventListener("click", function() {
				$("#canvas").hide();
				$("#video").fadeIn();
				$("#uploaded").hide();
				$("#snap").show();
				$("#reset").hide();
				$("#upload").hide();
				$("#control-number").val("");
				$("#names").html("");
				$("#first-lastname").html("");
				$("#second-lastname").html("");
			});

		// Upload image to sever
		document.getElementById("upload").addEventListener("click", function(){
			var dataUrl = canvas.toDataURL("image/jpeg", 0.85);
			//$("#uploading").show();
			$.ajax({
				type: "POST",
				url: "savePicture.php",
				data: { 
					imgBase64: dataUrl, id: $("#control-number").val()
				},
				success: function(data){
					console.log(data);
					$('#camFeedback').html(data);
				}
			}).done(function(msg) {
				console.log("saved " + msg);
				$("#uploading").hide();
				$("#uploaded").show();
			});
		});
	}, false);
	// ]]>
	</script>
</head>
<body>
	<header>
		<div class="container">
			<h1>Captura de fotografía</h1>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
				<div class="alert alert-danger" id="noStudent" style="display:none">
					<span>
						<p>No se encontró el número de control.</p>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<label>Número de Control</label>
				<br>
				<input type="number" class="form-control" id="control-number" maxlength="8" onKeyUp="getStudent();">
				<div>
					<br><br>
					<label id="names"></label> <br>
					<label id="first-lastname"></label> <br>
					<label id="second-lastname"></label> <br>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">
				<div class="camcontent">
					<video id="video" autoplay="autoplay" width="640" height="480"></video>
				</div>
				<div class="camcontent">
					<canvas id="canvas" width="640" height="480" style="display:none;"> </canvas>
				</div>
				<div class="cambuttons" id="cambuttons" style="margin-top: 10px; display: none;">
					<button id="snap" class="btn btn-primary" style="">
						<i class="fa fa-camera"></i>
						Capturar fotografía
					</button>
					<button id="reset" class="btn btn-warning" style="display:none">
						<i class="fa fa-camera"></i>
						Volver a capturar
					</button>
					<button id="upload" class="btn btn-primary" style="display:none">
						<i class="fa fa-save"></i>
						Guardar
					</button>
					<span id="uploading" style="display: none;">
						Guardando fotogragía . . .
					</span>
					<span id="uploaded" style="display: none;">
						¡La fotografía se ha guardado correctamente!. 
						<button id="clear" type="button" class="btn btn-success">
							Limpiar
						</button>
					</span>
				</div>
				<div id="camFeedback"></div>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>