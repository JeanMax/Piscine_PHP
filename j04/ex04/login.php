<?php

include "auth.php";
session_start();

if (!isset($_GET["login"]) || !isset($_GET["passwd"]) || $_GET["login"] === "" || $_GET["passwd"] === "" || !auth($_GET["login"], $_GET["passwd"]))
{
    $_SESSION["loggued_on_user"] = "";
    echo "ERROR\n";
    return false;
}

$_SESSION["loggued_on_user"] = $_GET["login"];

echo "OK\n";
?>