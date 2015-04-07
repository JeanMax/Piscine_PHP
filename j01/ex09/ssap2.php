#!/usr/bin/php
<?php
$name = $argv[0];
$tab = array();
foreach($argv as $tmp)
    if (strcmp($name, $tmp))
    {
        $new = $tmp;
        while (strcmp($new, $tmp1))
        {
			$tmp1 = $new;
			$new = str_replace("\t", " ", $new);
			$new = str_replace("\t", " ", $new);
		}
		$new = trim($new);
		$tab1 = explode(" ", $new);
		$tab = array_merge($tab, $tab1);
	}
$i1 = 0;
$s1 = 0;
$i2 = 0;
$s2 = 0;
$j = 0;
sort($tab, SORT_STRING | SORT_FLAG_CASE);
foreach($tab as $tmp)
{
	if (ctype_alpha($tmp))
	{
		if (!$s1)
			$s1 = $j;
		$i1++;
	}
	if (ctype_digit($tmp))
	{
		if (!$s2)
			$s2 = $j;
		$i2++;
	}
	$j++;
}
$alpha = array_slice($tab, $s1, $i1);
$number = array_slice($tab, $s2, $i2);
$tri = array_merge($alpha, $number);
$tab = array_diff($tab, $tri);
$tri = array_merge($tri, $tab);
foreach($tri as $tmp)
	echo $tmp."\n";
?>