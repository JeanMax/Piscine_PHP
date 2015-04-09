#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$fd = fopen("/var/run/utmpx", "r");
fread($fd, 1256);
$i = 0;
while (!feof($fd))
{
	$str = fread($fd, 628);
	if (strlen($str) > 1)
	{
		$pack = unpack("a256user/a4id/a32line/ipid/itype/i2time/a256host/@", $str);

		if (!strncmp($pack["user"], get_current_user(), strlen(get_current_user())))
		{
			$tab[$i]["tty"] = $pack["line"];
			$tab[$i]["user"] = $pack["user"];
			$tab[$i]["date"] = strftime("%b %e %H:%M",$pack["time1"]);
			$i++;
		}
	}
}

sort($tab);
$len = $i;
for ($i = 0; $i < $len; $i++)
	echo $tab[$i]["user"]."   ".$tab[$i]["tty"]."  ".$tab[$i]["date"]."\n";

fclose($fd);

?>