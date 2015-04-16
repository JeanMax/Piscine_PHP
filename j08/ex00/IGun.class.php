<?php

require_once("Dice.trait.php");

interface IGun
{
    private $_name;
    private $_load;
    private $_short_range;
    private $_mid_range;
    private $_long_range;
    private $_area;
    //may have '_special'

    use Dice;
    
    public function use_gun();
}

?>