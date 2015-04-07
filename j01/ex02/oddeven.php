/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   oddeven.php                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mcanal <zboub@42.fr>                       +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2015/04/07 20:36:23 by mcanal            #+#    #+#             */
/*   Updated: 2015/04/07 20:36:31 by mcanal           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

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
echo "^D\n";
?>
