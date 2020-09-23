<?php
// Takes raw data from the request
$json = file_get_contents('php://input');


$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $json);
fclose($myfile);

echo $json;


?>
