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
	
	<link rel="import" href="http://www.polymer-project.org/components/paper-ripple/paper-ripple.html">	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<header class="blue">
		<div class="wrapper">
			<div class="title link" onclick="loadPage('http://www.matthewpateman.com/phidgets');">
				<div class="icon"></div>
				<div class="text">Phidgets Experiments</div>
				<paper-ripple fit></paper-ripple>
			</div>
			<div class="title2">Experiment 1
			</div>
		</div>
	</header>
	
	<div class="wrapper padding">

					<div class="project card">				
				<div class="background" style="background:url(../experiment01.jpg); background-repeat: no-repeat; background-size: 100%; background-position:50% 50%;"></div>
				<div class="image" style="background:url(../experiment01.jpg); background-size:100%"></div>
				<idv class="text">
					<div class="title">Experiment 1</div>
					<div>Post a message online and have it display on the LCD display.</div>
				</div>	
	
	<ul id="list">
		<li>
			<h1 class="blue">Current Text</h1>
			<p>The device currently displays:</p>
			<p><strong><?php echo $text; ?></strong></p>
		</li>
		<li>
			<h1 class="blue">Update Text</h1>
			<form action="<?=$PHP_SELF?>" method="post">
				<div>
					<label for="addition">Enter text</label>
			<input id="addition" type="text" name="addition" placeholder="Enter text"/> 
				</div>
			<input type="submit"/> 
			<div class="clear"></div>
		</form>
		</li>
	</ul>
		
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

// delay to allow for page ripple effect to finish.
function loadPage(url) {
	redirectTime = "150";
	redirectURL = url;
	setTimeout("location.href = redirectURL;",redirectTime);
}

$(document).ready(function() {

 listener();
 listener2();

});

var listener = function() {
    document.addEventListener('input', function(e) {
        if (e.target.value != "") {
            e.target.parentNode.className = "hasContent";
        }
        else {
            e.target.parentNode.className = "";
        }
    });
}


var listener2 = function() {
    console.log("loaded");
    
    inputs = document.getElementsByTagName('input');
    console.log(inputs);
    for (i = 0; i < inputs.length; ++i) {
        if (inputs[i].value != "") {
            inputs[i].parentNode.className = "hasContent";
        }
        else {
            inputs[i].parentNode.className = "";  
        }
    }
}



</script>

</body>
</html>