#!/usr/bin/php
<?php
echo trim(preg_replace('/\s\s+/', " ", $argv[1]))."\n";
?>