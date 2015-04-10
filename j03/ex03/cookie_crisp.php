<?php

$action = $_GET["action"];
$name = $_GET["name"];
$value = $_GET["value"];

if (!$name)
{
    echo "A name is needed.\n";
    return ;
}
if (!$action)
{
    echo "An action is needed.\n";
    return ;
}

switch ($action)
{
case "set":
    if (!$value)
    {
        echo "A value is needed.\n";
        return ;
    }
    setcookie($name, $value, time() + 31536000, null, null, false, true);
    break;
case "get":
    $cook = $_COOKIE[$name];
    if ($cook)
        echo $cook."\n";
	break;
case "del":
    setcookie($name, null, -1, null, null, false, true);
	break;
default :
    echo "Unknown action.\n";
}

?>