#!/usr/bin/php
<?php

if ($argv[2])
{
    if (file_exists($argv[1]) && ($argv[2] === "nom" || $argv[2] === "prenom" || $argv[2] === "mail" || $argv[2] === "IP" || $argv[2] === "pseudo"))
    {
        if (($fd = fopen($argv[1], "r")))
        {
            //reading
            $i = 0;
			fgetcsv($fd, 0, ";");
			while (!feof($fd))
			{
				$tab[$i] = fgetcsv($fd, 0, ";");
				$i++;
			}
			fclose($fd);

			//edit tab
			for ($i = 0; $tab[$i]; $i++)
			{
				$nom[$tab[$i][1]] = $tab[$i][0];
				$prenom[$tab[$i][1]] = $tab[$i][1];
				$mail[$tab[$i][1]] = $tab[$i][2];
				$IP[$tab[$i][1]] = $tab[$i][3];
				$pseudo[$tab[$i][1]] = $tab[$i][4];
			}

			//asking
			echo "Entrez votre commande: ";
			while (($cmd = fgets(STDIN)))
			{
				eval($cmd); //to protect? && edit error msg?
				echo "Entrez votre commande: ";
			}
			echo "\n";
		}
	}
}

?>