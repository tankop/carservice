<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class ClientModel extends ClientModelMap
{

    function __construct()
    {
        parent::__construct();
    }

    public static function get()
    {
        return new self;
    }

    public function getById($id){
        return $this->db->select()
            ->from(self::DB_TABLE_NAME)
            ->where([
                self::ID => $id,
            ])->get()->first_row(get_class($this));
    }

    public function getClientDataByNameOrIDCard($name, $id_card){
        $this->db->select()
            ->from(self::DB_TABLE_NAME);
        if ($name != ''){
            $this->db->like(self::NAME, $name);
        }
        if ($id_card != ''){
            $this->db->where(self::IDCARD, $id_card);
        }
        return $this->db->get()->result(get_class($this));
    }

    public function getCountCars(){
        if (is_numeric($this->id)){
            return CarModel::get()->countAll([CarModel::CLIENT_ID => $this->id]);
        }
        return 0;
    }

    public function getCountService(){
        if (is_numeric($this->id)){
            return ServiceModel::get()->countAll([ServiceModel::CLIENT_ID => $this->id]);
        }
        return 0;
    }
}
