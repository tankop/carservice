<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class ServiceModelMap extends MasterModel
{

    const CLIENT_ID = 'client_id';
    const CAR_ID = 'car_id';
    const LOGNUMBER = 'lognumber';
    const EVENT = 'event';
    const EVENTTIME = 'eventtime';
    const DOCUMENT_ID = 'document_id';
    const DB_TABLE_NAME = 'services';

    protected $client_id;
    protected $car_id;
    protected $lognumber;
    protected $event;
    protected $eventtime;
    protected $document_id;

    function __construct()
    {
        parent::__construct();
        $this->setDbTablename(self::DB_TABLE_NAME);
        $this->db_fields = $this->db->list_fields($this->db_tablename);
        $this->json_data_path = 'uploads/project_data/services.json';
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

    public function getLognumber()
    {
        return $this->lognumber;
    }

    public function setLognumber($lognumber)
    {
        $this->lognumber = $lognumber;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setEvent($event)
    {
        $this->event = $event;
    }

    public function getEventtime()
    {
        return $this->eventtime;
    }

    public function setEventtime($eventtime)
    {
        $this->eventtime = $eventtime;
    }

    public function getDocumentId()
    {
        return $this->document_id;
    }

    public function setDocumentId($document_id)
    {
        $this->document_id = $document_id;
    }
}
