<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class CarModel extends CarModelMap
{

    function __construct()
    {
        parent::__construct();
    }

    public static function get()
    {
        return new self;
    }
}
