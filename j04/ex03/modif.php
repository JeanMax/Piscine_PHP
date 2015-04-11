<?php

//check if login/passwd are valid
function auth($login, $passwd)
{
    if (!file_exists("../private/passwd"))
        return false;
    $id_pw = unserialize(file_get_contents('../private/passwd'));
    foreach ($id_pw as $id => $pw)
        if ($id === $login)
            if ($pw === hash('whirlpool', $passwd))
				return true;
	return false;
}

//check if we have some data from POST method
if (!isset($_POST["login"]) || !isset($_POST["oldpw"]) || !isset($_POST["newpw"]) || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK" || !auth($_POST["login"], $_POST["oldpw"]))
{
	echo "ERROR\n";
	return false;
}

//editing pwd
$id_pw = unserialize(file_get_contents('../private/passwd'));
$id_pw[$_POST["login"]] = hash('whirlpool', $_POST["newpw"]);
file_put_contents('../private/passwd', serialize($id_pw));

//yay
echo "OK\n";
?>