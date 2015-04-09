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
            switch ($argv[2])
            {
            case "nom" :
                $choice = 0;
                break;
            case "prenom" :
                $choice = 1;
                break;
            case "mail" :
                $choice = 2;
                break;
            case "IP" :
                $choice = 3;
                break;
            case "pseudo" :
                $choice = 4;
                break;
            default :
                $choice = 0;                
            }
			for ($i = 0; $tab[$i]; $i++)
			{
				$nom[$tab[$i][$choice]] = $tab[$i][0];
				$prenom[$tab[$i][$choice]] = $tab[$i][1];
				$mail[$tab[$i][$choice]] = $tab[$i][2];
				$IP[$tab[$i][$choice]] = $tab[$i][3];
				$pseudo[$tab[$i][$choice]] = $tab[$i][4];
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