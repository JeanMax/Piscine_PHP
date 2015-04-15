<?php

class Color
{
	public $red;
	public $green;
	public $blue;
	public static $verbose = false;

	//MAGIC
	public function __construct($kw_arg)
	{
		if (!($ac = $this->_check_arg($kw_arg)))
		{
			$this->red = 0;
			$this->green = 0;
			$this->blue = 0;
		}
		else if ($ac == 1)
		{
			$this->red = intval(($kw_arg['rgb'] >> 16) % 256);
			$this->green = intval(($kw_arg['rgb'] >> 8) % 256);
			$this->blue = intval($kw_arg['rgb'] % 256);
		}
		else
		{
			$this->red = intval($kw_arg["red"]);
			$this->green = intval($kw_arg["green"]);
			$this->blue = intval($kw_arg["blue"]);
		}

		if (self::$verbose)
			echo $this." constructed.".PHP_EOL;

		return true;
	}

	public function __destruct()
	{
		if (self::$verbose)
			echo $this." destructed.".PHP_EOL;

		return true;
	}

	public function __toString()
	{
		return sprintf("Color( red: % 3d, green: % 3d, blue: % 3d )", $this->red, $this->green, $this->blue);
	}


	//STATIC
	public static function doc()
	{
		if (file_exists("Color.doc.txt"))
			return file_get_contents("Color.doc.txt");
		else
			return false;
	}


	//PRIVATE
	private function _check_arg(array $kw_arg)
	{
		$ac = count($kw_arg);
		if ($ac == 1 && array_key_exists("rgb", $kw_arg))
			return 1;
		else if ($ac == 3 && array_key_exists("red", $kw_arg)
				 && array_key_exists("green", $kw_arg)
				 && array_key_exists("blue", $kw_arg))
			return 3;
		else
			return 0;
	}


	//PUBLIC
	public function add(Color $rhs)
	{
		return new Color(array("red" => $this->red + $rhs->red,
							   "green" => $this->green + $rhs->green,
							   "blue" => $this->blue + $rhs->blue));
	}

	public function sub(Color $rhs)
	{
		return new Color(array("red" => $this->red - $rhs->red,
							   "green" => $this->green - $rhs->green,
							   "blue" => $this->blue - $rhs->blue));
	}

	public function mult($f)
	{
		return new Color(array("red" => $this->red * $f,
							   "green" => $this->green * $f,
							   "blue" => $this->blue * $f));
	}
}

?>