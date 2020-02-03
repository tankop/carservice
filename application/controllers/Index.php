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
        $this->data['clients'] = ClientModel::get()->getAll();
        $this->build('Index');
    }

    public function getclients(){
        if ($this->isAjax()) {
            echo json_encode([
                'status' => true,
                'html' => $this->load->view('ClientTable', ['clients' => ClientModel::get()->getAll()], true),
                'csrfName' => $this->security->get_csrf_token_name(),
                'csrfHash' => $this->security->get_csrf_hash()
            ], JSON_UNESCAPED_UNICODE);
            return;
        }
        echo json_encode([
            'status' => false,
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        ]);
        return;
    }

    public function getCars()
    {
        if ($this->isAjax()) {
            $post = $this->input->post();
            if (isset($post['id'])) {
                $client = ClientModel::get()->getById($post['id']);
                if ($client instanceof ClientModel){
                    $cars = CarModel::get()->getAll(0, 0, [CarModel::CLIENT_ID => $client->getId()]);
                    $response_html = $this->load->view('CarsTable', ['cars' => $cars, 'client' => $client], true);
                    echo json_encode([
                        'status' => true,
                        'html' => $response_html,
                        'csrfName' => $this->security->get_csrf_token_name(),
                        'csrfHash' => $this->security->get_csrf_hash()
                    ], JSON_UNESCAPED_UNICODE);
                    return;
                }
            }
        }
        echo json_encode([
            'status' => false,
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        ]);
        return;
    }

    public function getservice(){
        if ($this->isAjax()) {
            $post = $this->input->post();
            if (isset($post['car_id']) && isset($post['client_id'])) {
                $car = CarModel::get()->getByCarId($post['car_id'], $post['client_id']);
                if ($car instanceof CarModel){
                    $services = ServiceModel::get()->getAll(0, 0, [ServiceModel::CAR_ID => $car->getCarId(), ServiceModel::CLIENT_ID =>  $car->getClientId()]);
                    $response_html = $this->load->view('ServiceTable', ['services' => $services, 'car' => $car], true);
                    echo json_encode([
                        'status' => true,
                        'html' => $response_html,
                        'csrfName' => $this->security->get_csrf_token_name(),
                        'csrfHash' => $this->security->get_csrf_hash()
                    ], JSON_UNESCAPED_UNICODE);
                    return;
                }
            }
        }
        echo json_encode([
            'status' => false,
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        ]);
        return;
    }

    public function getclientdata(){
        if ($this->isAjax()) {
            $post = $this->input->post();
            if (isset($post['client_name']) && isset($post['client_id_card'])) {
                if ($post['client_name'] == '' && $post['client_id_card'] == ''){
                    echo json_encode([
                        'status' => false,
                        'error_msg' => lang('default.00022'),
                        'csrfName' => $this->security->get_csrf_token_name(),
                        'csrfHash' => $this->security->get_csrf_hash()
                    ]);
                    return;
                }else if ($post['client_name'] != '' && $post['client_id_card'] != ''){
                    echo json_encode([
                        'status' => false,
                        'error_msg' => lang('default.00023'),
                        'csrfName' => $this->security->get_csrf_token_name(),
                        'csrfHash' => $this->security->get_csrf_hash()
                    ]);
                    return;
                }else if ($post['client_id_card'] != '' && !is_numeric($post['client_id_card'])){
                    echo json_encode([
                        'status' => false,
                        'error_msg' => lang('default.00023'),
                        'csrfName' => $this->security->get_csrf_token_name(),
                        'csrfHash' => $this->security->get_csrf_hash()
                    ]);
                    return;
                }else{
                    $client = ClientModel::get()->getClientDataByNameOrIDCard($post['client_name'], $post['client_id_card']);
                    if (count($client) > 1){
                        echo json_encode([
                            'status' => false,
                            'error_msg' => lang('default.00025'),
                            'csrfName' => $this->security->get_csrf_token_name(),
                            'csrfHash' => $this->security->get_csrf_hash()
                        ]);
                        return;
                    }else  if (count($client) == 0){
                        echo json_encode([
                            'status' => false,
                            'error_msg' => lang('default.00026'),
                            'csrfName' => $this->security->get_csrf_token_name(),
                            'csrfHash' => $this->security->get_csrf_hash()
                        ]);
                        return;
                    }else{
                        echo json_encode([
                            'status' => true,
                            'html' => $this->load->view('ClientDetails', ['client' => $client], true),
                            'csrfName' => $this->security->get_csrf_token_name(),
                            'csrfHash' => $this->security->get_csrf_hash()
                        ], JSON_UNESCAPED_UNICODE);
                        return;
                    }
                }
            }
        }
        echo json_encode([
            'status' => false,
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        ]);
        return;
    }


    private function checkProjectData()
    {
        ClientModel::get()->checkTable();
        CarModel::get()->checkTable();
        ServiceModel::get()->checkTable();
    }
}
