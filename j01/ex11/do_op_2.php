#!/usr/bin/php
<?PHP
function check($str)
{
	$i = 0;
	$len = strlen($str);
	while($i < $len)
	{
		if (($str[$i] < '0' || $str[$i] > '9') && $str[$i] !== '+' && $str[$i] !== '-' && $str[$i] !== '*' && $str[$i] !== '/' && $str[$i] !== '%' && $str[$i] !== ' ')
			return (0);
		$i++;
	}
	$i = 0;
	$nb = 0;
	$op = 0;
	$minus = 0;
	$test = 0;
	$pos = array();
	while ($i < $len)
	{
		if ($str[$i] >= '0' && $str[$i] <= '9')
		{
			$nb++;
			while ($i < $len && $str[$i] >= '0' && $str[$i] <= '9')
				$i++;
		}
		if ($test > 1 && ($str[$i] == '+' || $str[$i] == '*' || $str[$i] == '/' || $str[$i] == '%'))
			$minus = 100;
		if ($str[$i] == '+' || $str[$i] == '*' || $str[$i] == '/' || $str[$i] == '%' || $str[$i] == '-')
		{
			if ($str[$i] == '-')
				$test++;
			$pos = array_merge($pos, array($i));
			$op++;
		}
		if ($i < $len)
			$i++;
	}
	if ($op > 1)
	{
		$sign = 0;
		$tmp2 = 0;
		foreach($pos as $tmp)
		{
			if ($str[$tmp] != '-')
				$sign++;
			if (!$tmp2 && $str[$tmp] == '-')
				$tmp2 = $tmp;
			if ($str[$tmp] == '-' && ($tmp2 == $tmp - 1 || $str[$tmp + 1] == ' ') && $sign)
				$sign = 100;
		}
		$c = count($pos);
		if ($sign > 1 || ($sign && $c == 4) || $c > 3)
			return (0);
	}
	if ($nb != 2 || $op == 0 || $minus == 100)
		return (0);
	return (1);
}
function nospace($str)
{
	$len = strlen($str);
	$i = 0;
	$sign = 0;
	$op = 0;
	while ($i < $len)
	{
		if ($str[$i] == '-')
			$sign++;
		if ($str[$i] == '+' ||  $str[$i] == '/' || $str[$i] == '*' || $str[$i] == '%')
			$op++;
		$i++;
	}
	if ($op)
		return (0);
	return (1);
}
function ft_split($str, $nb)
{
	$tmp = $str;
	$len = strlen($tmp);
	$tmp = str_replace("+", " + ", $tmp);
	$tmp = str_replace("*", " * ", $tmp);
	$tmp = str_replace("/", " / ", $tmp);
	$tmp = str_replace("%", " % ", $tmp);
	if (nospace($tmp) !== 0)
	{
		$len = strlen($tmp);
		$i = 0;
		$j = 0;
		$s = 0;
		$tmp2 = array();
		while ($i < $len)
		{
			if ($tmp[$i] !== " ")
			{
				$tmp2[$j] = $tmp[$i];
				if ($i > 0 && $j > 0 && !$s && $tmp[$i] == '-')
				{
					$tmp2[$j] = "+";
					$s = $j;
					$j++;
				}
				$j++;
			}
			$i++;
		}
		$a = array(implode(array_slice($tmp2, 0, $s)));
		$b = array(implode(array_slice($tmp2, $s + 1)));
		$op = array("-");
		$tab = array_merge($a, $op, $b);
	}
	else
	{
		$tab = explode(" ", $tmp);
		$tab = array_filter($tab);
		$us = array();
		$tab = array_merge($tab, $us);
	}
	return ($tab);
}
if ($argc == 2)
{
	$new = $argv[1];
	if (check($new))
	{
		$tab = ft_split($new, $nb);
		$a = $tab[0];
		$b = $tab[2];
		$op = $tab[1];
		if ($op == "+")
			$nb	= $a + $b;
		else if ($op == "-")
			$nb = $a - $b;
		else if ($op == "*")
			$nb = $a * $b;
		else if ($op == "/")
			$nb = $a / $b;
		else
			$nb = $a % $b;
		echo "$nb\n";
	}
	else
		echo "Syntax Error\n";
}
else
	echo "Incorrect Parameters\n";
?>