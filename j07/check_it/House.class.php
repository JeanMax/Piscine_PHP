<?php

class House
{
	//PUBLIC
	public function introduce()
	{
		echo "House ".$this->getHouseName()
			." of ".$this->getHouseSeat()
			." : \"".$this->getHouseMotto()."\"".PHP_EOL;
	}

/* not set, so test2 will crash...
	//GET
	public function getHouseName()
	{
		return "undefined name";
	}
	public function getHouseMotto()
	{
		return "undefined motto";
	}
	public function getHouseSeat()
	{
		return "undefined seat";
	}
*/
}

?>