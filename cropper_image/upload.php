<?php

/*
$file = $_FILES['croppedImage'];


$filename = $_POST['filename'];
echo $filename;
$img = $_POST['data'];
echo $img;
$img = str_replace('data:image/png;base64,', '', $img);
echo $img;
$img = str_replace(' ', '+', $img);
echo $img;
$data = base64_decode($img);
echo $data;
file_put_contents('test.png', $data);
*/

$filename = $_POST['filename'];
$img = $_POST['pngimageData'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
file_put_contents($filename, $data);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



</body>
</html>