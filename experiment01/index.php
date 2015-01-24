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
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		  <link rel="import" href="http://www.polymer-project.org/components/paper-ripple/paper-ripple.html">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
		<header>
		<div class="wrapper">
			<div class="title link" onclick="loadPage('http://www.matthewpateman.com/phidgets');">Phidgets Experiments
				<paper-ripple fit></paper-ripple>
			</div>
			<div class="title2">Experiment 1
			</div>
		</div>
	</header>
	
	<div class="wrapper padding">


	<div class="wrapper card">
		<p>The device currently displays:</p>
		<p><strong><?php echo $text; ?></strong></p>
	</div>
	<form action="<?=$PHP_SELF?>" method="post" class="card wrapper"> 
		<input type="text" name="addition"/> 
		<input type="submit"/> 
	</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

// delay to allow for page ripple effect to finish.
function loadPage(url) {
	redirectTime = "150";
	redirectURL = url;
	setTimeout("location.href = redirectURL;",redirectTime);
}

</script>

</body>
</html>