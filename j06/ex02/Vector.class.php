<?php

require_once "Vertex.class.php";

class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	public static $verbose = false;

	//MAGIC
	public function __construct($kw_arg)
	{
		if (array_key_exists("x", $kw_arg) &&
			array_key_exists("y", $kw_arg) &&
			array_key_exists("z", $kw_arg))
		{
			$this->_x = $kw_arg["x"];
			$this->_y = $kw_arg["y"];
			$this->_z = $kw_arg["z"];
		}
		else
		{
			if (!array_key_exists("orig", $kw_arg) )
				$kw_arg["orig"] = new Vertex(array("x" => 0.0,
												   "y" => 0.0,
												   "z" => 0.0));
			
			$this->_x = $kw_arg["dest"]->get_x() - $kw_arg["orig"]->get_x();
			$this->_y = $kw_arg["dest"]->get_y() - $kw_arg["orig"]->get_y();
			$this->_z = $kw_arg["dest"]->get_z() - $kw_arg["orig"]->get_z();
			$this->_w = 0.0;
		}

		if (self::$verbose)
			echo $this." constructed\n";

		return true;
	}

	public function __destruct()
	{
		if (self::$verbose)
			echo $this." destructed\n";
		return true;
	}

	public function __toString()
	{
		if (self::$verbose)
			return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
							$this->_x, $this->_y, $this->_z, $this->_w));
	}

	//STATIC
	public static function doc()
	{
		if (file_exists("Vector.doc.txt"))
			return file_get_contents("Vector.doc.txt");
		else
			return false;
	}


	//GET
	public function get_x()
	{
		return $this->_x;
	}
	public function get_y()
	{
		return $this->_y;
	}
	public function get_z()
	{
		return $this->_z;
	}
	public function get_w()
	{
		return $this->_w;
	}


	//PUBLIC
		// magnitude = sqrt(vector²)
	public function magnitude()
	{
		return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
	}

		// normalize = vector / magnitude(vector)
	public function normalize()
	{
		$mag = $this->magnitude();

		return new Vector(array("x" => $this->_x / $mag,
								"y" => $this->_y / $mag,
								"z" => $this->_z / $mag));
	}

		// add = vector + rhs
	public function add(Vector $rhs)
	{
		return new Vector(array("x" => $this->_x + $rhs->_x,
								"y" => $this->_y + $rhs->_y,
								"z" => $this->_z + $rhs->_z));
	}

		// sub = vector - rhs
	public function sub(Vector $rhs)
	{
		return new Vector(array("x" => $this->_x - $rhs->_x,
								"y" => $this->_y - $rhs->_y,
								"z" => $this->_z - $rhs->_z));
	}

		// opposite = vector * -1
	public function opposite()
	{
		return new Vector(array("x" => $this->_x * -1,
								"y" => $this->_y * -1,
								"z" => $this->_z * -1));
	}

		// scalarProduct = vector * k
	public function scalarProduct($k)
	{
		return new Vector(array("x" => $this->_x * $k,
								"y" => $this->_y * $k,
								"z" => $this->_z * $k));
	}

		//dotProduct = vector * rhs
	public function dotProduct(Vector $rhs)
	{
		return ($this->_x * $rhs->_x +
				$this->_y * $rhs->_y +
				$this->_z * $rhs->_z);
	}

		// cos = (XaXb+YaYb+ZaZb) / sqrt((Xa²+Ya²+Za²)(Xb²+Yb²+Zb²))
	public function cos(Vector $rhs)
	{
		return ($this->_x * $rhs->_x +
				$this->_y * $rhs->_y + 
				$this->_z * $rhs->_z) / 
			sqrt(($this->_x * $this->_x + 
				  $this->_y * $this->_y + 
				  $this->_z * $this->_z) *
				 ($rhs->_x * $rhs->_x +
				  $rhs->_y * $rhs->_y +
				  $rhs->_z * $rhs->_z));
	}

		// crossProduct = (YaZb-ZaYb, ZaXb-XaZb, XaYb-YaXb) 
	public function crossProduct(Vector $rhs)
	{
		return new Vector(array("x" =>	$this->_y * $rhs->_z -
										$this->_z * $rhs->_y,
								"y" =>	$this->_z * $rhs->_x -
										$this->_x * $rhs->_z,
								"z" =>	$this->_x * $rhs->_y -
										$this->_y * $rhs->_x));
	}
}

?>