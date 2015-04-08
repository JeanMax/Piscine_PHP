<?php
function ft_split($str)
{
	$array = explode(" ", $str);
	$array = array_filter($array);
	sort($array);
	return $array;
}
?>
