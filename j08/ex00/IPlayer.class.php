<?php

interface IPlayer
{
    private $_ships;

    public function __construct(array $ships);

    
    public function play();
/*
call : order, movement, shoot

set to false $ships->_activated

return false if count($_ships) = 0
*/

    private function order();
    private function movement();
    private function shoot();
    
}

?>