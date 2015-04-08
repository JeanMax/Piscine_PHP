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
	else if (strstr($a, ":"))
		$tab[strstr($a, ":", true)] = ltrim(strstr($a, ":"), ":");
}

if (!strstr($argv[1], ":") && $tab[$argv[1]] !== false)
    echo($tab[$argv[1]]."\n");

    
?>