<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class CarModelMap extends MasterModel
{

    const CLIENT_ID = 'client_id';
    const CAR_ID = 'car_id';
    const TYPE = 'type';
    const REGISTERED = 'registered';
    const OWNBRAND = 'ownbrand';
    const ACCIDENT = 'accident';
    const DB_TABLE_NAME = 'cars';

    protected $client_id;
    protected $car_id;
    protected $type;
    protected $registered;
    protected $ownbrand;
    protected $accident;
    protected $last_service_event;
    protected $last_service_event_time;

    function __construct()
    {
        parent::__construct();
        $this->setDbTablename(self::DB_TABLE_NAME);
        $this->db_fields = $this->db->list_fields($this->db_tablename);
        $this->json_data_path = 'uploads/project_data/cars.json';
        $last_service = ServiceModel::get()->getLastService($this->client_id, $this->car_id);
        if ($last_service instanceof ServiceModel){
            $this->last_service_event = $last_service->getEvent();
            $this->last_service_event_time = $last_service->getEventtime();
        }
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    public function getCarId()
    {
        return $this->car_id;
    }

    public function setCarId($car_id)
    {
        $this->car_id = $car_id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getRegistered()
    {
        return $this->registered;
    }

    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }

    public function getOwnbrand()
    {
        return $this->ownbrand;
    }

    public function setOwnbrand($ownbrand)
    {
        $this->ownbrand = $ownbrand;
    }

    public function getAccident()
    {
        return $this->accident;
    }

    public function setAccident($accident)
    {
        $this->accident = $accident;
    }

    public function getLastServiceEvent()
    {
        return $this->last_service_event;
    }

    public function setLastServiceEvent($last_service_event)
    {
        $this->last_service_event = $last_service_event;
    }

    public function getLastServiceEventTime()
    {
        return $this->last_service_event_time;
    }

    public function setLastServiceEventTime($last_service_event_time)
    {
        $this->last_service_event_time = $last_service_event_time;
    }
}
