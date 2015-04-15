<?php

require_once "Vector.class.php";

class Matrix
{
	private $_matrix;
	const IDENTITY = 1;
	const SCALE = 2;
	const RX = 3;
	const RY = 4;
	const RZ = 5;
	const TRANSLATION = 6;
	const PROJECTION = 7;
	public static $verbose = false;

	public function __construct(array $kw_arg)
	{
		if (!array_key_exists("preset", $kw_arg))
			return false;

		switch ($kw_arg["preset"])
		{
		case self::IDENTITY:
			$this->identity();
			break ;

		case self::SCALE:
			if (!array_key_exists("scale", $kw_arg))
				exit();
			$this->scale($kw_arg["scale"]);
			break ;

		case self::RX:
		case self::RY:
		case self::RZ:
			if (!array_key_exists("angle", $kw_arg))
				exit();
			$this->rotation($kw_arg["preset"], $kw_arg["angle"]);
			break ;

		case self::TRANSLATION:
			if (!array_key_exists("vtc", $kw_arg))
				exit();
			$this->translation($kw_arg["vtc"]);
			break ;

		case self::PROJECTION:
			if (!array_key_exists("fov", $kw_arg) ||
				!array_key_exists("ratio", $kw_arg) ||
				!array_key_exists("near", $kw_arg) ||
				!array_key_exists("far", $kw_arg))
				exit();
			$this->projection($kw_arg["fov"], $kw_arg["ratio"],
							  $kw_arg["near"], $kw_arg["far"]);
			break ;

		default:
			exit();
		}

		return true;
	}

	public function __destruct()
	{
		if (self::$verbose)
			echo "Matrix instance destructed\n";
		return true;
	}

	public function __toString()
	{
		$s  = sprintf("M | vtcX | vtcY | vtcZ | vtxO\n");
		$s .= sprintf("-----------------------------\n");
		$s .= sprintf("x | %3.2f | %3.2f | %3.2f | %3.2f\n", $this->_matrix[0][0], $this->_matrix[0][1], $this->_matrix[0][2], $this->_matrix[0][3]);
		$s .= sprintf("y | %3.2f | %3.2f | %3.2f | %3.2f\n", $this->_matrix[1][0], $this->_matrix[1][1], $this->_matrix[1][2], $this->_matrix[1][3]);
		$s .= sprintf("z | %3.2f | %3.2f | %3.2f | %3.2f\n", $this->_matrix[2][0], $this->_matrix[2][1], $this->_matrix[2][2], $this->_matrix[2][3]);
		$s .= sprintf("w | %3.2f | %3.2f | %3.2f | %3.2f", $this->_matrix[3][0], $this->_matrix[3][1], $this->_matrix[3][2], $this->_matrix[3][3]);
		return ($s);
	}

	public function doc()
	{
		if (file_exists("Matrix.doc.txt"))
			return file_get_contents("Matrix.doc.txt");
		else
			return false;
	}

	public function mult(Matrix $rhs)
	{
		$mult = clone $this;
		for ($i = 0; $i < 4; $i++)
			for ($j = 0; $j < 4; $j++)
			{
				$sum = 0;
				for ($k = 0; $k < 4; $k++)
					$sum += $this->_matrix[$i][$k] * $rhs->_matrix[$k][$j];
				$mult->_matrix[$i][$j] = $sum;
			}

		return ($mult);
	}

	public function transformVertex(Vertex $vtx)
	{
		return new Vertex(array(
			"x" => ($this->_matrix[0][0] * $vtx->get_x() +
					$this->_matrix[0][1] * $vtx->get_y() +
					$this->_matrix[0][2] * $vtx->get_z() +
					$this->_matrix[0][3] * $vtx->get_w()),
			
			"y" => ($this->_matrix[1][0] * $vtx->get_x() +
					$this->_matrix[1][1] * $vtx->get_y() +
					$this->_matrix[1][2] * $vtx->get_z() +
					$this->_matrix[1][3] * $vtx->get_w()),
			
			"z" => ($this->_matrix[2][0] * $vtx->get_x() +
					$this->_matrix[2][1] * $vtx->get_y() +
					$this->_matrix[2][2] * $vtx->get_z() +
					$this->_matrix[2][3] * $vtx->get_w()),
			
			"w" => ($this->_matrix[3][0] * $vtx->get_x() +
					$this->_matrix[3][1] * $vtx->get_y() +
					$this->_matrix[3][2] * $vtx->get_z() +
					$this->_matrix[3][3] * $vtx->get_w()),
			
			"color" => $vtx->get_color()));
	}

	private function identity()
	{
		$this->_matrix = array(array(1, 0, 0, 0),
							   array(0, 1, 0, 0),
							   array(0, 0, 1, 0),
							   array(0, 0, 0, 1));

		if (self::$verbose)
			echo "Matrix IDENTITY instance constructed\n";
	}

	private function translation(Vector $vtc)
	{
		$this->_matrix = array(array(1, 0, 0, $vtc->get_x()),
							   array(0, 1, 0, $vtc->get_y()),
							   array(0, 0, 1, $vtc->get_z()),
							   array(0, 0, 0, 1));

		if (self::$verbose)
			echo "Matrix TRANSLATION preset instance constructed\n";
	}

	private function scale($scale)
	{
		$this->_matrix = array(array($scale, 0, 0, 0),
							   array(0, $scale, 0, 0),
							   array(0, 0, $scale, 0),
							   array(0, 0, 0, 1));

		if (self::$verbose)
			echo "Matrix SCALE preset instance constructed\n";
	}

	private function rotation($preset, $angle)
	{
		switch ($preset)
        {
		case self::RX:
			$this->_matrix = array(array(1, 0, 0, 0),
								   array(0, cos($angle), -sin($angle), 0),
								   array(0, sin($angle), cos($angle), 0),
								   array(0, 0, 0, 1));
			if (self::$verbose)
				echo "Matrix Ox ROTATION preset instance constructed\n";
			break;

		case self::RY:
			$this->_matrix = array(array(cos($angle), 0, sin($angle), 0),
								   array(0, 1, 0, 0),
								   array(-sin($angle), 0, cos($angle), 0),
								   array(0, 0, 0, 1));
			if (self::$verbose)
				echo "Matrix Oy ROTATION preset instance constructed\n";
			break;

        case self::RZ:
			$this->_matrix = array(array(cos($angle), -sin($angle), 0, 0),
								  array(sin($angle), cos($angle), 0, 0),
								  array(0, 0, 1, 0),
								  array(0, 0, 0, 1));
			if (self::$verbose)
				echo "Matrix Oz ROTATION preset instance constructed\n";
			break;
		}
	}

	private function projection($fov, $ratio, $near, $far)
	{
		$this->_matrix = array(
			array(1 / (tan(deg2rad($fov / 2)) * $ratio), 0, 0, 0),
			array(0, 1 / tan(deg2rad($fov / 2)), 0, 0),
			array(0, 0, -$far / ($far - $near),
				  -1 - ($far * $near) / ($far - $near)),
			array(0, 0, -1, 0));

		if (self::$verbose)
			echo "Matrix PROJECTION preset instance constructed\n";
	}

}

?>