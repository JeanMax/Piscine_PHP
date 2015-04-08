#!/usr/bin/php
<?php
function check($s1)
{
	$k = 1;
	while ($s1[$k])
	{
		if ($s1[$k] != ' ' && ($s1[$k] < '0' || $s1[$k] > '9'))
		   return 0;
		   $k++;
}
	return 1;
} 

function error($s)
{
	$i = 0;
	$l = strlen($s);
	if ($l < 3)
{
		echo "Syntax Error\n";
	   return 0;
}
	$n = 0;
	$p = 0;
	while ($s[$i])
{
	if ($s[$i] != " " && $s[$i] != "*" && $s[$i] != "+" && $s[$i] != "-" && $s[$i] != "/" && $s[$i] != "%"  && ($s[$i] < '0' || $s[$i] > '9'))
	{
		echo "Syntax Error\n";
        return 0;
		}
		$i++;
}
	return 1;
}
if ($argc != 2)
{
   echo "Incorrect Parameters\n";
   return (0);
}

if (!error($argv[1]))
   return 0;

$c = '+';
$pos = strpos($argv[1], $c);
if ($pos)
 {
	$tab = explode("+", $argv[1]);
	if ($tab[0][0] == '-' || $tab[1][0] == '-')
{ 
		$ck1 = check(trim($tab[0]));
		$ck2 = check(trim($tab[1]));
	if (!$ck1 || !$ck2)
	{
		echo "Syntax Error\n";
		return (0);
	}
	else
		{
		echo ($tab[0] + $tab[1]);
	echo "\n";
	return (0);
}
}
		 
else	if ((ctype_digit(trim($tab[0]))) && (ctype_digit(trim($tab[1]))))
	{
	echo ($tab[0] + $tab[1]);
	echo "\n";
	return (0);
	}
	else
	{
echo "Syntax Error\n";
	
	return (0);
	}
}



$c = '/';
$pos = strpos($argv[1], $c);
if ($pos)
 {
    $tab = explode("/", $argv[1]);

   if ($tab[0][0] == '-' || $tab[1][0] == '-')
{
        $ck1 = check(trim($tab[0]));
        $ck2 = check(trim($tab[1]));
    if (!$ck1 || !$ck2)
    {
		echo "Syntax Error\n";
    	return (0);
    }
else
		{
		echo ($tab[0] / $tab[1]);
    echo "\n";
    return (0);
}
}
 else   if ((is_numeric(trim($tab[0])))  && (is_numeric(trim($tab[1]))))
    {
    echo ($tab[0] / $tab[1]);
    echo "\n";
    return (0);
    }
    else
    {
echo "Syntax Error\n";
    return (0);
    }
}

$c = '%';
$pos = strpos($argv[1], $c);
if ($pos)
 {
    $tab = explode("%", $argv[1]);
 if ($tab[0][0] == '-' || $tab[1][0] == '-')
{
        $ck1 = check(trim($tab[0]));
        $ck2 = check(trim($tab[1]));
    if (!$ck1 || !$ck2)
    {
        echo "Syntax Error\n";
        return (0);
    }
else
        {
        echo ($tab[0] % $tab[1]);
    echo "\n";
    return (0);
}
}
 else   if ((is_numeric(trim($tab[0])))    && (is_numeric(trim($tab[1]))))
    {
    echo ($tab[0] % $tab[1]);
    echo "\n";
    return (0);
    }
    else
    {
echo "Syntax Error\n";
    return (0);
    }
}

$c = '*';
$pos = strpos($argv[1], $c);
if ($pos)
 {
    $tab = explode($c, $argv[1]);
 if ($tab[0][0] == '-' || $tab[1][0] == '-')
{
        $ck1 = check(trim($tab[0]));
        $ck2 = check(trim($tab[1]));
    if (!$ck1 || !$ck2)
    {
        echo "Syntax Error\n";
        return (0);
    }
else
        {
        echo ($tab[0] * $tab[1]);
    echo "\n";
    return (0);
}
}
 else   if ((is_numeric(trim($tab[0])))  && (is_numeric(trim($tab[1]))))
    {
    echo ($tab[0] * $tab[1]);
    echo "\n";
    return (0);
    }
    else
    {
echo "Syntax Error\n";
    return (0);
    }
}

$c = '-';
$pos = strpos($argv[1],	$c);
if ($pos !== FASLE)
{
		$y = 0;
		$i = 0;
		while ($argv[1][$i])
			  {
				if ($argv[1][$i] != '-' && ($s1[$k] < '0' && $s1[$k] > '9'))
				{
				echo "Syntax Error\n";
    			return (0);
				}
				if ($argv[1][$i] == '-')
						$y++;
				$i++;
				}
		if ($y > 3)
		{
		echo "Syntax Error\n";
    	return (0);
		}
	$i = 0;
	$y = 0;
//	$tp1 = array($argv[1]);
$tp2 = array();	
	while ($argv[1][$i] && !$y)
	{
		if ($i > 0 && $argv[1][$i+1] == '-')
		$y++;
		$tp1[$i] = $argv[1][$i];
		$i++;
	} 
	$i++;
	$y = 0;
	while ($argv[1][$i])
	{
		$tp2[$y] = $argv[1][$i];
		$i++;
		$y++;
	}
	$tab = explode("-", $argv[1]);
	$n = count($tab);
	if ($n == 2)
{
	   echo ($tab[0] - $tab[1]);
	   echo "\n";
	   return 0;
}	
else if ($n == 3 && $argv[1][0] == '-')
{ 
	   echo (-$tab[1] - $tab[2]);
	   echo "\n";
	   return 0;
}
else if ($n == 4 && $argv[1][0] == '-')
{ 
	   echo (-$tab[1] + $tab[3]);
	   echo "\n";
	   return 0;
}
else if ($n == 3)
{ 
	   echo ($tab[0] + $tab[2]);
	   echo "\n";
	   return 0;
}
    return (0);
}
return (0);
?>