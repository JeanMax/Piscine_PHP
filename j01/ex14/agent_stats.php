#!/usr/bin/php
<?php

if ($argv[1] == "moyenne" || $argv[1] == "moyenne_user" || $argv[1] == "ecart_moulinette")
{
    $i = 0;
    $tab = array(array()); //tab("user", note, moulinette)

	while (($line = fgets(STDIN)))
	{
		if (!$i)
		{
			$i++;
			continue ;
		}

		if (strstr($line, ";"))
		{
			$tab[$i - 1][0] = strstr($line, ";", true);
			$tab[$i - 1][1] = strstr(trim(strstr($line, ";"), ";"), ";", true);
			$tab[$i - 1][2] = strstr($line, "moulinette") ? 1 : 0;
			if (!ctype_digit($tab[$i - 1][1]))
			{
				$tab[$i - 1][0] = null;
				$tab[$i - 1][1] = null;
				$tab[$i - 1][2] = null;
				$i--;
			}
		}

		$i++;
	}

	if ($argv[1] == "moyenne")
	{
		$len = -1;
		$sum = 0;
		for ($i = 0; $tab[$i]; $i++)
			if (!$tab[$i][2])
			{
				$sum += $tab[$i][1];
				$len++;
			}
		echo $sum / $len."\n";
	}
	else if ($argv[1] == "moyenne_user")
	{
		sort($tab);
		$i = 1;
		while ($tab[$i])
		{
			$sum = 0;
			$len = 0;
			echo $tab[$i][0].":";
			while ($tab[$i])
			{
				if (!$tab[$i][2])
				{
					$sum += $tab[$i][1];
					$len++;
				}
				if ($tab[$i][0] != $tab[$i + 1][0])
				{
					echo $sum / $len."\n";
					break ;
				}
				$i++;
			}
			$i++;
		}
	}
	else if ($argv[1] == "ecart_moulinette")
	{
		sort($tab);
		$i = 1;
		while ($tab[$i])
		{
			$sum = 0;
			$len = 0;
            $mou = 0;
			echo $tab[$i][0].":";

			$swap = $i;
			while ($tab[$swap])
			{
                if ($tab[$swap][2])
                    $mou = $tab[$swap][1];
                if ($tab[$swap][0] != $tab[$swap + 1][0] || $mou)
                    break ;
                $swap++;
			}

			while ($tab[$i])
			{
				if (!$tab[$i][2])
				{
					$sum += ($tab[$i][1] - $mou);
					$len++;
				}
				if ($tab[$i][0] != $tab[$i + 1][0])
				{
					echo $sum / $len."\n";
					break ;
				}
				$i++;
			}
			$i++;
		}
	}
}

?>