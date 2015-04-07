/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ssap.php                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mcanal <zboub@42.fr>                       +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2015/04/07 20:37:06 by mcanal            #+#    #+#             */
/*   Updated: 2015/04/07 20:37:12 by mcanal           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#!/usr/bin/php

<?php
$i = 0;
$a = array();
while($i++ < $argc - 1)
{
	$argv[$i] = trim($argv[$i]);
	while(strpos($argv[$i], "  "))
	$argv[$i] = str_replace("  ", " ", $argv[$i]);
	$tmp = explode(" ", $argv[$i]);
	$a = array_merge($a, $tmp);
}
sort($a);
foreach($a as $tmp)
	echo "$tmp\n";
?>