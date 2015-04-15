<?php

require_once "Matrix.class.php";

class Camera
{
	public static $verbose = false;

	public function __construct(array $kw_arg)
	{
		return true;
	}

	public function __destruct()
	{
		if (self::$verbose)
			echo "Camera instance destructed\n";
		return true;
	}

	public function __toString()
	{
	}

	public function doc()
	{
		if (file_exists("Camera.doc.txt"))
			return file_get_contents("Camera.doc.txt");
		else
			return false;
	}

}

?>