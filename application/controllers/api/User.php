<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller
{
    private $secretkey = 'njkdsfkdsjfklj43AD4rf';
    public function __Construct()
    {
        parent::__Construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $this->load->model('User_model', 'jabatan');
    }

    public function index_post()
    {
        $nip = $this->get('nip');
        if($nip === null){
           $jabatan = $this->jabatan->getJabatan(); 
        }    
        else{
            $jabatan = $this->jabatan->getJabatan($nip);
        }

        if($jabatan){
            
            $this->response([
                'status' => TRUE,
                'data' => $jabatan,
            ], REST_Controller::HTTP_OK); 
        } else{
            $this->response([
                'status' => false,
                'message' => 'Jabatan not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
        
    }
}