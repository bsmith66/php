<?php
if (file_exists('hits.txt')) {
	$counter = fopen('hits.txt', 'r');
	$data = fread($counter, filesize('hits.txt'));
	echo "Visits: ";
	echo $data+1;
	fclose($counter);
	$counter = fopen('hits.txt', 'w');
	fwrite($counter, $data+1);
}
else {
	$counter = fopen('hits.txt', 'w');
	fwrite($counter, 1);
	echo '1';
	fclose($counter); 
}
?>