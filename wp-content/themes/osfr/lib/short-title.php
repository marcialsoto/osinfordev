<?php

function the_short_title($len,$rep='...') {
	$title = the_title('','',false);
	$shortened_title = textLimit($title, $len, $rep);
	print $shortened_title;
}

function textLimit($string, $length, $replacer) {
	if(strlen($string) > $length)
	return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
	return $string;
}