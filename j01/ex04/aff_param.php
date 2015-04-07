#!/usr/bin/php
<?php
$i = 0;
foreach ($argv as $a)
{
	if (!$i)
	{
		$i++;
		continue ;
	}
	echo($a);
	echo("\n");
}
?>