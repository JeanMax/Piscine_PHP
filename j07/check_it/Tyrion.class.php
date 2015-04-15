<?php

class Tyrion extends Lannister
{
	//MAGIC
	public function __construct()
	{
		parent::__construct();
		echo "My name is ".$this.PHP_EOL;
	}

	public function __toString()
	{
		return "Tyrion";
	}

	//PUBLIC
	public function getSize()
	{
		return "Short";
	}
}

?>