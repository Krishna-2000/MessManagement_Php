<?php
$url='https://contribute.geeksforgeeks.org/wp-content/uploads/gfg-40.png';
$file=fopen('hello.png','w+');

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FILE, $file);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
$data=curl_exec($ch);
$info=curl_getinfo($ch);
echo "The download speed of this server is: <b>".round(($info['speed_download']/(1024*1024)),2)."</b>";
curl_close($ch);

fclose($file);
?>

