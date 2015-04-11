<?php

//check if we have some data from POST method
if (!isset($_POST["login"]) || !isset($_POST["oldpw"]) || !isset($_POST["newpw"]) || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK" || !file_exists("../private/passwd") || $_POST["oldpw"] === $_POST["newpw"])
{
	echo "ERROR\n";
	return false;
}

//editing pwd
$id_pw = unserialize(file_get_contents('../private/passwd'));
foreach ($id_pw as &$usr)
	if ($usr["login"] === $_POST["login"])
		if ($usr["passwd"] === hash('whirlpool', $_POST["oldpw"]))
		{
			$usr["passwd"] = hash('whirlpool', $_POST["newpw"]);
			file_put_contents('../private/passwd', serialize($id_pw));
			echo "OK\n";
			return true;
		}

// :/
echo "ERROR\n";
return false;

?>