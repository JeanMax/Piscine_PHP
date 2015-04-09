#!/usr/bin/php
<?php
$handle = fopen($argv[1], "rw");
$content = fread($handle, filesize($argv[1]));
preg_match_all('/"([^"]+)"/', $content, $m);
preg_match_all('/<a(.*?)>(.*?)<\/a>/si', $content, $m2);
$i = 0;
while ($m2[2][$i])
{
    preg_match('/\<([^>]+)\>/' , $m2[2][$i], $link_content);
    $m2[2][$i] = str_replace($link_content, "", $m2[2][$i]);
	$i++;
}
foreach($m[0] as $el)
{
	$content = str_replace($el, strtoupper($el), $content);
}
foreach($m2[2] as $el)
{
	$content = str_replace($el, strtoupper($el), $content);
}
echo($content);
?>