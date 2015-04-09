#!/usr/bin/php
<?php

if ($argc != 2)
    return 0;

if (strstr($argv[1], "http"))
{
    $ch = curl_init($argv[1]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$str = curl_exec($ch);
	if (preg_match_all('#<img.* src="(.*)".*>#iU', $str, $matches))
	{
		//check if we are in a subdir
		if (strpos($argv[1], "/") == strrpos($argv[1], "/") - 1)
			$url = $argv[1];
		else
			$url = substr($argv[1], 0, strpos($argv[1], "/", 8));

		//editing links
		$len = count($matches[1]);
		for ($i = 0; $i	< $len; $i++)
		{
			if (strstr($matches[1][$i], "http"))
				$tab[$i] = $matches[1][$i];
			else if ($matches[1][$i][0] == '/' && $matches[1][$i][1] == '/')
				$tab[$i] = "http:".$matches[1][$i];
			else if ($matches[1][$i][0] == '/')
				$tab[$i] = $url.$matches[1][$i];
			else
				$tab[$i] = $url."/".$matches[1][$i];
		}

		//make directory
		if (strstr($argv[1], "https"))
			$path = substr($argv[1], 8);
		else
			$path = substr($argv[1], 7);

        
		if (!is_dir($path))
			mkdir($path, 0755, true);

		//getting images
		for ($i = 0; $i < $len; $i++)
		{
			if (!($matches[1][$i]))
                continue ;
			$ci = curl_init($tab[$i]);
			curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ci, CURLOPT_HEADER, 0);
			curl_setopt($ci, CURLOPT_BINARYTRANSFER,1);
			$data = curl_exec($ci);
			curl_close ($ci);
			$file = substr($tab[$i], strrpos($tab[$i], "/"));
			$fd = fopen($path.$file,'wb');
			fwrite($fd, $data);
			fclose($fd);
		}
	}
	curl_close($ch);
}

?>
