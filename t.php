<?php

# This file passes the content of the Readme.md file in the same directory
# through the Markdown filter. You can adapt this sample code in any way
# you like.

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\Markdown;

# Read file and pass content through the Markdown parser
#$text = file_get_contents('1.md');
@$text = file_get_contents('data/' .htmlspecialchars($_GET["f"]) .'.md');

if ($text == FALSE)
	{
	$text = file_get_contents('std.md');
	}

$html = Markdown::defaultTransform($text);

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo htmlspecialchars($_GET["f"]);?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>

<div id="wrap">
	<div id="main">
	
	<?php
	#<div style="width: 20em; margin-left: auto; margin-right: auto;">
	# Put HTML content in the document
		echo $html;
	?>
	</div>
	<div id="sidebar">
		<h2>Andra texter</h2>
		<!--<a href='upload.php'>ladda upp</a><br>-->
		<?php

		if ($dir = opendir('data/')) {
    			while (false !== ($entry = readdir($dir))) {
        		if ($entry != "." && $entry != "..") 			{
            	$fileName = strstr($entry, '.', true);
            	echo "<a href ='t.php?f=$fileName'> $fileName</a><br>";
                 
		}
    		}
    closedir($dir);
}
//$number = strstr($entry, '.', true);
?>
	</div>

<div id="footer">
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<!-- <a class="a2a_dd" href="http://www.addtoany.com/share_save"></a> -->
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_reddit"></a>
<a class="a2a_button_blogger_post"></a>
<a class="a2a_button_tumblr"></a>
</div>
<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
</div>
</div>
	


    </body>
</html>
