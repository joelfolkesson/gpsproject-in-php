<?php
	// = = = = UPLOAD FILE = = = =
	// Must be absolute path
	$target_directory = "/Applications/XAMPP/xamppfiles/htdocs/uploads/images/";
	$filename = $_POST['fileLocation'];
	$temp_filename = $_FILES["file"]["tmp_name"];
	$size = $_FILES["file"]["size"];

	// Produce a unique filename
	$randomNumber = time();
	$filetype = substr($filename, strrpos($filename, '.'));
	$target_file = $target_directory . $randomNumber . $filetype;
	$local_path = "/uploads/images/" . $randomNumber . $filetype;


	move_uploaded_file($temp_filename, $target_file);

	// = = = = Add to database = = = =
	// Establish connection to database
	$conn = mysql_connect("localhost", "root", "") or die(mysql_error());
	//Select database
	$db = mysql_select_db("gpsmega");

	// Collect data from form

	$imagetext = $_POST['imagetext'];
	$locationstring = $_POST['locationstring'];

	if($size > 0){
	$query = "INSERT INTO images (imagetext, image, locationstring) VALUES ('$imagetext', '$local_path', '$locationstring')";
	//$query = "INSERT INTO `images`( `imagetext`, `imagetext`, `locationstring`) VALUES ($imagetext,$local_path,$locationstring)";
	mysql_query($query) or die('Error, query failed');
	}
	mysql_close();
				header('Location: http://d001a5ce.ngrok.io');




?>
