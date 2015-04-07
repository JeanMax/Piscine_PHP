#!/usr/bin/php
<?php
$a = explode(" ", $argv[1]);
$a = array_filter($a);
$i = 0;
foreach($a as $tmp)
{
	if ($i)
		echo "$tmp ";
	else
		$i = 1;
}
if ($a[0])
	echo "$a[0]\n";
?>