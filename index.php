<?php
#Needs the following in site config
#location ~ \.(mvk)$ {
#	rewrite ^/(.*)$ /index.php?/$1;
#}
# The above re-writes all requests for mkv file to the index.php

if(!empty($_GET['id'])){
	$VidID=$_GET['id'];
	# Hwne in production enviroment this id needs to validated as a number.
}

if(!empty($VidID)){
	#echo "Download ID: " . $VidID;
	# Insert code to connect to db and get url to match dl id. If id not found then return 404 img.
	#ProxyDownload($url);
}else{
	$Request="." . urldecode($_SERVER[REQUEST_URI]);
	#echo "Request: " . $Request;
	if(file_exists($Request)){
		if($Request != "./index.php"){
			#echo "File Found";
			#ProxyDownload("." . $_SERVER[REQUEST_URI]);
		}
	}else{
		# 404 file not found.
		echo "<img src='/okuued_2_0_by_guuchama-d7l80km.jpg' />";
	}
}

function ProxyDownload($url){
	$file = fopen($url,"r");
        header("Content-Type: video/x-matroska");
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment;filename=" . basename($url));
        header("Accept-Ranges: bytes");
        fpassthru($file);
}
?>
