<?php

require_once("IPlayer.class.php");
require_once("IGun.class.php");
require_once("IZone.class.php");
require_once("IShip.class.php");

function init()
{
    $z = new zone(["3" => 2]);

	$g1 = New gun();
	$g2 = New gun();
	$g3 = New gun();
	$g4 = New gun();
    

	$s1 = New ship([$g1, $g2, $g3]);
	$s2 = New ship([$g1, $g2, $g3]);
	$s3 = New ship([$g2, $g3]);
	$s4 = New ship([$g1, $g3]);

	$p1 = New player([$s1, $s2]);
	$p2 = New player([$s3, $s4]);

}


init();

while (42)
{
	if (!$p1->play())
		break ;

	if (!$p2->play())
		break ;
}

echo "game over";

?>