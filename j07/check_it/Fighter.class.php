<?php

abstract class Fighter
{
	private $_type;

	//MAGIC
	public function __construct($arg)
	{
		$this->set_type($arg);
	}


	//GET
	public function get_type()
	{
		return $this->_type;
	}


	//SET
	public function set_type($type)
	{
		$this->_type = $type;
	}

	//PUBLIC
	abstract public function fight($target);

}

?>