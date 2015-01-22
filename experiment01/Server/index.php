<?php 

// Defien the name of the file you wish to read and write.
$fn = "file.txt"; 

// Check if there is actual input
if($_POST['addition'] != "")
{

	// Open and write to file
	$file = fopen($fn, "w+"); 
	$size = filesize($fn); 
	

	$addition = $_POST['addition'];

	// remove special characters
	$noSpecialCharacters = htmlspecialchars($addition);

	// trim input to 40 characters
	$final = substr($noSpecialCharacters, 0, 40);


	fwrite($file, $addition); 
	fclose($file); 

	// set $text to new text
	$text = $addition;

} else {

	// read file
	$file = fopen($fn, "r") or die("Unable to open file!");

	// set $text to content from file
	$text = fread($file,filesize($fn));
	fclose($file);

}

?> 

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h1> The device currently displays<h1>
	<h2><?php echo $text; ?></h2>
	<form action="<?=$PHP_SELF?>" method="post"> 
		<input type="text" name="addition"/> 
		<input type="submit"/> 
	</form>
</body>
</html>