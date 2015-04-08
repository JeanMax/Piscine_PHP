#!/usr/bin/php
<?php

if ($argv[1])
{
    $ch = curl_init($argv[1]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $str = curl_exec($ch);

    if (preg_match_all("#<img src\=\"(.+)\">#", $str, $matches))
    {
        print_r($matches);
    }

    curl_close($ch);
}

?>