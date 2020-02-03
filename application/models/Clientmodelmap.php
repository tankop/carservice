<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class ClientModelMap extends MasterModel
{

    const ID = 'id';
    const NAME = 'name';
    const IDCARD = 'idcard';
    const DB_TABLE_NAME = 'clients';

    protected $id;
    protected $name;
    protected $idcard;

    function __construct()
    {
        parent::__construct();
        $this->setDbTablename(self::DB_TABLE_NAME);
        $this->db_fields = $this->db->list_fields($this->db_tablename);
        $this->json_data_path = 'uploads/project_data/clients.json';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getIdcard()
    {
        return $this->idcard;
    }

    public function setIdcard($idcard)
    {
        $this->idcard = $idcard;
    }
}
