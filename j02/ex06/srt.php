#!/usr/bin/php
<?php

//reading file and filling tab
$i = 0;
$j = 0;
$fd = fopen($argv[1], "r");
while ($line = fgets($fd))
{
	if ($line === "\n")
	{
		$i++;
		$j = 0;
		continue ;
	}
	if (strstr($line, "-->"))
	{
		$tab[$i][$j] = strstr($line, "-->", true);
		$j++;
		$tab[$i][$j] = trim(trim(strstr($line, "-->"), "\n"), "--> ");
	}
	else
		$tab[$i][$j] = trim($line, "\n");
	$j++;
}
fclose($fd);

//convert time
for ($i = 0; $tab[$i]; $i++)
{
	$time = explode(":", $tab[$i][1]);
	$tab[$i][4] = $time[0] * 3600 + $time[1] * 60 + $time[2];
	$time = explode(":", $tab[$i][2]);
	$tab[$i][5] = $time[0] * 3600 + $time[1] * 60 + $time[2];

	//for sorting
	$swap = $tab[$i][4];
	$tab[$i][4] = $tab[$i][0];
	$tab[$i][0] = $swap;
}

sort($tab);

//print
for ($i = 0; $tab[$i]; $i++)
{
	echo ($i + 1)."\n".$tab[$i][1]." --> ".$tab[$i][2]."\n".$tab[$i][3]."\n";
	if ($tab[$i + 1])
		echo "\n";
}

?>