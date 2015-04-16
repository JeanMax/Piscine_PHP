<?php

require_once("Dice.trait.php");

interface IShip
{
    private $_name;
    private $_width;
    private $_height;
    private $_sprite;
    private $_pc; //point de coque
    private $_pp; //point moteur
    private $_speed;
	private $_maneuver;
	private $_shield;
	private $_gun;
    private $_activated;
    private $_still;

    private $_bonus_speed;
    private $_bonus_shield;
    private $_bonus_gun;

    use Dice;

    //MAGIC
    public function __construct(array $kw_arg)

        
    //PUBLIC
        //bonus
    public function bonus_move($pp);
    public function bonus_shield($pp);
    public function bonus_gun($pp);
    public function bonus_repair($pp);

        //move
    public function bend($way); //todo : edit w/h
    public function move($length);

        //shoot
    public function shoot();
}

?>