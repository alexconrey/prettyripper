<?php

//function.php
//requires youtube-dl and libav-tools (debian)
//Written by Alex Conrey (c) 2015

function getVideo($url, $format) {
//	$get_cmd = 'youtube-dl --add-metadata --restrict-filenames -o "d/%(title)s-%(id)s.%(ext)s" -t --quiet  --extract-audio --audio-format '. $format .' '.$url;
	$get_cmd = 'youtube-dl --add-metadata --restrict-filenames -o "d/%(id)s.%(ext)s" --quiet --no-cache-dir --extract-audio --audio-format '. $format .' '.$url;

	exec($get_cmd);
}

function getFile($url) {
	$cmd = escapeshellcmd('youtube-dl --get-id '.$url);
	$rtn = exec($cmd);
	return $rtn;
}

?>
