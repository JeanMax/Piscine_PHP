#!/usr/bin/php
<?php
echo "Entrez un nombre: ";
while (($nb = fgets(STDIN)))
{
	$nb = trim($nb);
	if (!ctype_digit($nb))
		echo "'$nb' n'est pas un chiffre\n";
	else if (!($nb % 2))
		echo "Le chiffre $nb est Pair\n";
	else
		echo "Le chiffre $nb est Impair\n";
	echo "Entrez un nombre: ";
}
echo "\n";
?>