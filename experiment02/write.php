<?php 

// Defien the name of the file you wish to read and write.
$fn = "file.txt"; 

// Check if there is actual input
if($_POST['chip'] != "")
{

	// Open and write to file
	$file = fopen($fn, "w+"); 
	$size = filesize($fn); 
	
	$noSpecialCharacters = htmlspecialchars($_POST['chip']);

	$addition = "<strong>Chip ". $_POST['chip'] ."</strong> was touched in at ". date('H:i:s') ." on ". date('j F Y');

	// remove special characters
	



	// trim input to 40 characters
	$final = substr($noSpecialCharacters, 0, 200);


	fwrite($file, $addition); 
	fclose($file); 

	// set $text to new text
	$text = $addition;

}

?>