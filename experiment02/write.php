<?php 

// Defien the name of the file you wish to read and write.
$fn = "file.txt"; 

// Check if there is actual input
if($_POST['chip'] != "")
{

	// Open and write to file
	$file = fopen($fn, "w+"); 
	$size = filesize($fn); 
	

	$addition = $_POST['chip'] ." ". date('Y-m-d H:i:s');

	// remove special characters
	$noSpecialCharacters = htmlspecialchars($addition);

	// trim input to 40 characters
	$final = substr($noSpecialCharacters, 0, 40);


	fwrite($file, $addition); 
	fclose($file); 

	// set $text to new text
	$text = $addition;

}

?>