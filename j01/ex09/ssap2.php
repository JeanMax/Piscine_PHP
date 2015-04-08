#!/usr/bin/php
<?php
$i = 1;
$res = array();

while ($i <= $argc)
{
	 $tmp = array_filter(explode(" ", $argv[$i++]));
	  $res = array_merge($res, $tmp);
}
usort($res, "strcasecmp");
$n = count($res);
$i = 0;
$tmp = array();
while ($i < $n)
{
	if (ctype_alpha($res[$i]))
	   echo $res[$i]."\n";
	else
		 $tmp[] = $res[$i];
	$i++;
}
$res = $tmp;
sort($res);
$tmp = array();
$res = array_filter($res);
$n = count($res);
$i = 0;
while ($i < $n)
{
	if (is_numeric($res[$i]) && strlen($res[$i]) > 0)
   		echo $res[$i]."\n";
	else
		 $tmp[] = $res[$i];
	$i++;
}
$res = $tmp;
$res = array_filter($res);
$n = count($res);
$i = 0;
$j = 1;
while ($i < $n)
{
	 echo $res[$i++]."\n";	
}
?>