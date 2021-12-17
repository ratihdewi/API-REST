<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use \Firebase\JWT\JWT;

class Jabatan extends REST_Controller
{
    private $secretkey = 'Reckless';
    private $table      = 'timesheets';

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('Jabatan_model', 'organisasi');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
           $organisasi = $this->organisasi->getJabatan(); 
        }    
        else{
            $organisasi = $this->organisasi->getJabatan($id);
        }

        if($organisasi){
            $this->response([
                'status' => TRUE,
                'data' => $organisasi,
            ], REST_Controller::HTTP_OK); 
        } else{
            $this->response([
                'status' => false,
                'message' => 'Jabatan not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
        
    }
}