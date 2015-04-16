<?php

class Targaryen 
{
	//PUBLIC
	public function resistsFire()
	{
		return false;
	}

	public function getBurned()
	{
		return static::resistsFire() ? 
			"emerges naked but unharmed" : "burns alive";
	}
}

?>