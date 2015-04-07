/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_is_sort.php                                     :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mcanal <zboub@42.fr>                       +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2015/04/07 20:37:27 by mcanal            #+#    #+#             */
/*   Updated: 2015/04/07 20:37:34 by mcanal           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#!/usr/bin/php

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