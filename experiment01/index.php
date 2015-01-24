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
	<style>
	/* Eric Meyer's Reset CSS v2.0 - http://cssreset.com */
	html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}table{border-collapse:collapse;border-spacing:0}
	/* end of reset */

	body {background: #ECEFF1; font-family: 'Roboto'; font-weight: 300;}

	strong {font-weight: 400;}

	header {height: 56px; background: #2196F3; color: #FFF; line-height: 24px; font-size: 20px; font-weight: 400;}
	
	.wrapper {width:300px; padding:16px; margin: 0 auto; box-sizing:border-box;}
	
	.card {background: #FFF; border-radius: 2px; box-shadow: 0px 0px 4px rgba(0,0,0,0.3); margin: 16px auto; font-size: 14px; line-height: 20px;}
	</style>
</head>
<body>
	<header><div class="wrapper">Experiment 1</div></header>
	<div class="wrapper card">
		<p>The device currently displays:</p>
		<p><strong><?php echo $text; ?></strong></p>
	</div>
	<form action="<?=$PHP_SELF?>" method="post" class="card wrapper"> 
		<input type="text" name="addition"/> 
		<input type="submit"/> 
	</form>
</body>
</html>