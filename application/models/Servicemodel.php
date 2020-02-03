<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class ServiceModel extends ServiceModelMap
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
