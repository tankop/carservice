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

    public function getLastService($client_id, $car_id){
        return $this->db->select()
            ->from(self::DB_TABLE_NAME)
            ->where([
                self::CLIENT_ID => $client_id,
                self::CAR_ID => $car_id
            ])->order_by(self::LOGNUMBER, 'DESC')->get()->first_row(get_class($this));
    }
}
