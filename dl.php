<!DOCTYPE html>
<html>
    <head>
        <title>Martins texter</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>

<?php

if ($dir = opendir('data/')) {
    while (false !== ($entry = readdir($dir))) {
        if ($entry != "." && $entry != "..") {
            $number = strstr($entry, '.', true);
            echo "<a href ='t.php?f=$number'> $entry</a><br>";
                 
	}
    }
    closedir($dir);
}
//$number = strstr($entry, '.', true);
?>



    </body>
</html>
