<?php
//Opening the acronyms.txt file as read only
$myfile = fopen("files/acronyms.txt", "r") or die("Can't open file");
// Determining the total size of the file in bytes
$myfilelength = filesize("files/acronyms.txt");
//Reading the file and echoing it to the screen
echo fread($myfile, $myfilelength);
//Closing the file connection
fclose($myfile);

echo "<hr>";

//Opening the acronyms.txt file as read only
$myfile = fopen("files/acronyms.txt", "r") or die("Can't open file");
//Read the first line of text
echo fgets($myfile);
// Closing the file connection
fclose($myfile);
echo "<hr>";

$myfile = fopen("files/acronyms.txt", "r") or die("Can't open file");
//Read the first line of text
echo fgets($myfile);
while (!feof($myfile)){
	echo fgets($myfile) . "<br>";
}
//Closing file connection
fclose($myfile);
?>