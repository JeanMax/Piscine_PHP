<?php

function auth($login, $passwd)
{
    if (file_exists("../private/passwd"))
    {
        $id_pw = unserialize(file_get_contents('../private/passwd'));
        foreach ($id_pw as $id => $pw)
            if ($id === $login)
                if ($pw === hash('whirlpool', $passwd))
                    return true;
	}
	return false;
}

?>