<?php

require_once "Matrix.class.php";

class Camera
{
	private $_origin;
	private $_tt;
	private $_tr;
	private $_view;
	private $_proj;
	private $_height;
	private $_width;
	public static $verbose = false;

	//MAGIC
	public function __construct(array $kw_arg)
	{
		if (!array_key_exists("origin", $kw_arg) ||
			!array_key_exists("orientation", $kw_arg) ||
			!array_key_exists("fov", $kw_arg) ||
			!array_key_exists("near", $kw_arg) ||
			!array_key_exists("far", $kw_arg))
			return false;

		//getting ratio/width/height
		if (array_key_exists("ratio", $kw_arg))
		{
			if (!array_key_exists("width", $kw_arg) &&
				!array_key_exists("height", $kw_arg))
				return false;
			if (!array_key_exists("width", $kw_arg))
				$kw_arg["width"] = $kw_arg["height"] * $kw_arg["ratio"];
			if (!array_key_exists("height", $kw_arg))
				$kw_arg["height"] = $kw_arg["width"] / $kw_arg["ratio"];
			$this->_width = $kw_arg["width"];
			$this->_height = $kw_arg["height"];
		}
		else 
		{
			if (!array_key_exists("width", $kw_arg) ||
				!array_key_exists("height", $kw_arg))
				return false;
			$kw_arg["ratio"] = $kw_arg["width"] / $kw_arg["height"];
		}
		
		$this->_set_origin($kw_arg["origin"]);
		$this->_set_tt();
		$this->_set_tr($kw_arg["orientation"]);
		$this->_set_view();
		$this->_set_proj($kw_arg);
		$this->_set_width($kw_arg["width"]);
		$this->_set_height($kw_arg["height"]);

		if (self::$verbose)
			echo "Camera instance constructed\n";
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
		return	"Camera( "
			."\n+ Origine: ".$this->get_origin()
			."\n+ tT:\n".$this->get_tt()
			."\n+ tR:\n".$this->get_tr()
			."\n+ tR->mult( tT ):\n".$this->get_view()
			."\n+ Proj:\n".$this->get_proj()
			."\n)";
	}

	//STATIC
	public static function doc()
	{
		if (file_exists("Camera.doc.txt"))
			return file_get_contents("Camera.doc.txt");
		else
			return false;
	}

	//PUBLIC
	public function watchVertex(Vertex $worldVertex)
	{
		$v = $this->get_proj()->transformVertex($worldVertex);
		$w = $this->get_width() / 2;
		$h = $this->get_height() / 2;

		return new Vertex(array("x" => $v->get_x() * $w + $w,
								"y" => $v->get_y() * $h + $h,
								"z" => $v->get_z()));
	}

	//SET
	private function _set_origin(Vertex $origin)
	{
		$this->_origin = $origin;
	}
	private function _set_tt()
	{
		$v = new Vector(array("dest" => $this->_origin));
		$this->_tt = new Matrix(array("preset" => Matrix::TRANSLATION,
										 "vtc" => $v->opposite()));
	}
	private function _set_tr(Matrix $orientation)
	{
		$this->_tr = $orientation->invert();
	}
	private function _set_view()
	{
		$this->_view = $this->_tr->mult($this->_tt); 
	}
	private function _set_proj(array $kw_arg)
	{
		$this->_proj = new Matrix(array("preset" => Matrix::PROJECTION,
									   "ratio" => $kw_arg["ratio"],
									   "fov" => $kw_arg["fov"],
									   "near" => $kw_arg["near"],
									   "far" => $kw_arg["far"]));
	}
	private function _set_width($width)
	{
		$this->_width = $width;
	}
	private function _set_height($height)
	{
		$this->_height = $height;
	}

	//GET
	public function get_origin()
	{
		return $this->_origin;
	}
	public function get_tt()
	{
		return $this->_tt;
	}
	public function get_tr()
	{
		return $this->_tr;
	}
	public function get_view()
	{
		return $this->_view;
	}
	public function get_proj()
	{
		return $this->_proj;
	}
	public function get_width()
	{
		return $this->_width;
	}
	public function get_height()
	{
		return $this->_height;
	}

}

?>