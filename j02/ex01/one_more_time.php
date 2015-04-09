#!/usr/bin/php
<?php
functionconv_month_fr($s)
{
    if (!strcasecmp($s, "janvier"))
        $s = "January";
    else if (!strcasecmp($s, "fevrier"))
        $s = "February";
    else if (!strcasecmp($s, "mars"))
		$s = "March";
	else if (!strcasecmp($s, "avril"))
		$s = "April";
	else if (!strcasecmp($s, "mai"))
		$s = "May";
	else if (!strcasecmp($s, "juin"))
		$s = "June";
	else if (!strcasecmp($s, "juillet"))
		$s = "July";
	else if (!strcasecmp($s, "aout"))
		$s = "August";
	else if (!strcasecmp($s, "septembre"))
		$s = "September";
	else if (!strcasecmp($s, "octobre"))
		$s = "October";
	else if (!strcasecmp($s, "novembre"))
		$s = "November";
	else if (!strcasecmp($s, "decembre"))
		$s = "December";
	else
		$s = NULL;
	return ($s);
}

functionconv_sec($s)
{
	$time = explode(":", $s);
	if ($time[0] >= 0 && $time[0] <= 23
		&& $time[1] >= 0 && $time[1] <= 59
		&& $time[2] >= 0 && $time[2] <= 59)
		$sec = $time[0] * 3600 + $time[1] * 60 + $time[2];
	return ($sec);
}

functionputerror()
{
	echo("Wrong Format\n");
	exit();
}

if ($argc != 2)
	puterror();
$date = explode(" ", "$argv[1]");
if (count($date) > 5)
	puterror();
date_default_timezone_set('Europe/Paris');
$days = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
if (!in_array(strtolower($date[0]), $days))
	puterror();
if ($date[1] > 31)
	puterror();
$month = conv_month_fr($date[2]);
if (!$month)
	puterror();
$format = $date[1] . " $month" . " $date[3]";
$sec = conv_sec($date[4]);
if (!$sec)
	puterror();
$time = strtotime($format);
$time += $sec;
echo($time);
?>