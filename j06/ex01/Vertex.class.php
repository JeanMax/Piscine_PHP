<?php

class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = false;

	public function __construct($kw_arg)
	{
		if (self::$verbose)
			printf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f, %s ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);

		$this->set_x($kw_arg["x"]);
		$this->set_y($kw_arg["y"]);
		$this->set_z($kw_arg["z"]);
		$this->set_w(isset($kwargs['w']) ? $kwargs['w'] : 1.0);
		if (isset($kwargs['color']))
			$this->set_color($kwargs['color']);
		else
			$this->set_color(new Color(array("red" => 255,
											 "green" => 255,
											 "blue" => 255)));
		return true;
	}

	public function __destruct()
	{
		if (self::$verbose)
			printf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f, %s ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		return true;
	}

	public function __toString()
	{
		if (self::$verbose)
			return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
		else
			return (sprintf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function doc()
	{
		if (file_exists("Vertex.doc.txt"))
			return file_get_contents("Vertex.doc.txt");
		else
			return false;
	}

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
	public function get_color()
	{
		return $this->_color;
	}

	public function set_x($x)
	{
		$this->_x = $x;
	}
	public function set_y($y)
	{
		$this->_y = $y;
	}
	public function set_z($z)
	{
		$this->_z = $z;
	}
	public function set_w($w)
	{
		$this->_w = $w;
	}
	public function set_color(Color $color)
	{
		$this->_color = $color;
	}

}

?>