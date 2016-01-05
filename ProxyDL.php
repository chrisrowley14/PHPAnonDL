<?php
function ProxyDownload($url){
	$file = fopen($url,"r");
        header("Content-Type: video/x-matroska");
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment;filename=" . basename($url));
        header("Accept-Ranges: bytes");
        fpassthru($file);
}
?>
