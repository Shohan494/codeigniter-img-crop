<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

			img {
		  max-width: 100%; /* This rule is very important, please do not ignore this! */
		}
		.image_container{
			width:600px;
			height: 500px;	
		}
	</style>



	<script src="cropper_image/jquery.js"></script>
	<link  href="cropper_image/cropper.min.css" rel="stylesheet">
	<script src="cropper_image/cropper.min.js"></script>	
</head>

<body>
	
	<input type="file" name="image" id="image" onchange="readURL(this);"/>
	<div class="image_container">
		<img id="blah" src="#" alt="your image" />
	</div>
	<div id="cropped_result"></div>
	<button id="crop_button">Crop</button>


	<script type="text/javascript" defer>
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
                setTimeout(initCropper, 1000);
            }
        }
	    function initCropper(){
	    	console.log("Came here")
	    	var image = document.getElementById('blah');
			var cropper = new Cropper(image, {
			  aspectRatio: 1 / 1,
			  crop: function(e) {
			    console.log(e.detail.x);
			    console.log(e.detail.y);
			  }
			});

			// On crop button clicked
			document.getElementById('crop_button').addEventListener('click', function()
			{
	    		var croppng =  cropper.getCroppedCanvas().toDataURL();
	    		

	    		//var img = document.createElement("img");

// var cropcanvas = $('#imagetocrop').cropper('getCroppedCanvas');
// var croppng = cropcanvas.toDataURL("image/png");

						  // Use `jQuery.ajax` method
						  
alert(croppng);

							$.ajax({
							type: 'POST',
							url: "upload.php",
							data: {
							pngimageData: croppng,
							filename: 'test.png'
							},
						    success: function (data) {
						      alert('Upload success');
						      alert(data.filename);
						    },
						    error: function (data) {
						      alert('Upload error');
						      alert(data);
						      
						    }
							});
	    		
	    	})
	    }
	</script>
</body>
</html>