<?php

interface IZone
{
    private $_width;
    private $_height;
    private $_map; //array
    private $_p1_ships; //array
    private $_p2_ships; //array

    
    public __construct(array $kw_arg);
/*
  keys : "width" => int, "height" => int, "obstacle" => array("x" => y))
*/

    public function init_obstacle($arr);
    public function init_ship();
    
}

?>