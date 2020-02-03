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

    public function getByCarId($car_id, $client_id){
        return $this->db->select()
            ->from(self::DB_TABLE_NAME)
            ->where([
                self::CAR_ID => $car_id,
                self::CLIENT_ID => $client_id,
            ])->get()->first_row(get_class($this));
    }
}
