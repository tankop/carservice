<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Tankó Péter
 */
class Index extends MasterController
{

	public function __construct()
	{
		$this->load_models[] = 'Client';
		$this->load_models[] = 'Service';
		$this->load_models[] = 'Car';
		parent::__construct();
		 $this->checkProjectData();
	}

	public function index()
	{
		$this->build('Index');
	}

	private function checkProjectData(){
	    ClientModel::get()->checkTable();
        CarModel::get()->checkTable();
        ServiceModel::get()->checkTable();
    }
}
