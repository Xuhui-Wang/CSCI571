<?php
$ourFileName = "apple.txt";
$ourFileHandle = fopen($ourFileName, "r") or die("can't open file");
$file = fread($ourFileHandle, filesize($ourFileName));
fclose($ourFileHandle);
header("Content-type: text/plain");
echo $file;
?>
