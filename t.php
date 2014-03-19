<?php

	# This file passes the content of the Readme.md file in the same directory
	# through the Markdown filter. You can adapt this sample code in any way
	# you like.

	# Install PSR-0-compatible class autoloader
	spl_autoload_register(function($class){
		require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
	});

	# Get Markdown class
	#use \Michelf\Markdown;
	use \Michelf\MarkdownExtra;

	# Read file and pass content through the Markdown parser

	#$mdText = file_get_contents('1.md');
	@$mdText = file_get_contents('data/' .htmlspecialchars($_GET["f"]) .'.md');

	if ($mdText == FALSE){
		$mdText = file_get_contents('std.md');
	}

	//$htmlText = Markdown::defaultTransform($mdText);
	$htmlText = MarkdownExtra::defaultTransform($mdText);


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
				# Put HTML content in the document
				echo $htmlText;
			?>
			</div>
			<div id="sidebar">
				<h2>Andra texter</h2>
				<?php
					if ($dir = opendir('data/')) {
			    		while (false !== ($entry = readdir($dir))) {
				        	if ($entry != "." && $entry != "..") {
				           		$fileName = strstr($entry, '.', true);
				           		echo "<a href ='t.php?f=$fileName'> $fileName</a><br>";          
							}
			    		}
			    		closedir($dir);
					}
				?>

			</div>
			<!-- tar bort kanpparna tillvidare skall nog inte vara med i-->
			<!--<div id="footer">-->
				<!-- AddToAny BEGIN -->
				<!--<div class="a2a_kit a2a_kit_size_32 a2a_default_style">-->
				<!--<a class="a2a_dd" href="http://www.addtoany.com/share_save"></a> -->
				<!--<a class="a2a_button_facebook"></a>-->
				<!--<a class="a2a_button_twitter"></a>-->
				<!--<a class="a2a_button_google_plus"></a>-->
				<!--<a class="a2a_button_reddit"></a>-->
				<!--<a class="a2a_button_blogger_post"></a>-->
				<!--<a class="a2a_button_tumblr"></a>-->
				<!--</div>-->
				<!--<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>-->
				<!-- AddToAny END -->
			<!--</div>-->
		</div>
	</body>
</html>

