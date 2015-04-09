#!/usr/bin/php
<?php
if ($argc != 2)
	return;
$my_tab = explode(' ', $argv[1]);
$check_day1 = preg_match_all("/^[Mm][a][r][d][i]$|^[Ll][u][n][d][i]&|$[Mm][e][r][c][r][e][d][i]$|^[Jj][e][u][d][i]$|^[Vv][e][n][d][r][e][d][i]$|^[Ss][a][m][e][d][i]$|^[Dd][i][m][a][n][c][h][e]$/", $my_tab[0]);
$check_day2 = preg_match_all("/^[0-2][0-9]$|^[3][0-1]$|^[0-9]$/", $my_tab[1]);
$check_month = preg_match_all("/^[Jj][a][n][v][i][e][r]$|^[Ff][e][v][r][i][e][r]$|^[Mm][a][r][s]$|^[Aa][v][r][i][l]$|^[Mm][a][i]$|^[Jj][u][i][n]$|^[Jj][u][i][l][l][e][t]$|^[aA][o][u][t]$|^[Ss][e][p][t][e][m][b][r][e]$|^[Oo][c][t][o][b][r][e]$|^[Nn][o][v][e][m][b][r][e]$|^[Dd][e][c][e][m][b][r][e]$/", $my_tab[2]);
$check_year = preg_match_all("/^[1][9][7-9][0-9]$|^[2-9][0-9][0-9][0-9]$/", $my_tab[3]);
$check_time = preg_match_all("/^[0-1][0-9]:[0-5][0-9]:[0-5][0-9]$|^[2][0-3]:[0-5][0-9]:[0-5][0-9]$/", $my_tab[4]);
if (!$check_day1 || !$check_day2 || !$check_month || !$check_year || !$check_time || $my_tab[5])
{
	echo "Wrong Format\n";
	return ;
}
if ($my_tab[2] === "Juillet" || $my_tab[2] === "juillet")
	$my_tab[2] = "July";
else if ($my_tab[2] === "Juin" || $my_tab[2] === "juin")
	$my_tab[2] = "June";
else if ($my_tab[2] === "Mai"	|| $my_tab[2] === "mai")
	$my_tab[2] = "May";
else if ($my_tab[2] === "Avril" || $my_tab[2] === "avril")
	$my_tab[2] = "April";
else if ($my_tab[2] === "Mars" || $my_tab[2] === "mars")
	$my_tab[2] = "March";
else if ($my_tab[2] === "Fevrier" || $my_tab[2] === "fevrier")
	$my_tab[2] = "Febuary";
else if ($my_tab[2] === "Janvier" || $my_tab[2] === "janvier")
	$my_tab[2] = "January";
else if ($my_tab[2] === "Novembre")	$my_tab[2] = "November";
else if ($my_tab[2] === "Decembre" || $my_tab[2] === "decembre")
	$my_tab[2] = "December";
else if ($my_tab[2] === "Septembre" || $my_tab[2] === "septembre")
	$my_tab[2] = "September";
else if ($my_tab[2] === "Octobre" || $my_tab[2] === "octobre")
	$my_tab[2] = "October";
else if ($my_tab[2] === "Aout" || $my_tab[2] === "aout")
	$my_tab[2] = "August";
date_default_timezone_set('Europe/Paris');
echo strtotime("$my_tab[1] $my_tab[2] $my_tab[3] $my_tab[4]")."\n";
?>