<?php
function ft_is_sort($tab)
{
    $len = count($tab);
    $sorted = $tab;
    sort($sorted);

    for ($i = 0; $i < $len; $i++)
        if (!strcmp($tab[$i], $sorted[$i]))
			return false;
	return true;
}
?>