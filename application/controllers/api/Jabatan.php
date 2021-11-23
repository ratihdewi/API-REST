<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Jabatan extends REST_Controller
{
    private $secretkey = 'njkdsfkdsjfklj43AD4rf';
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('Jabatan_model', 'jabatan');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
           $jabatan = $this->jabatan->getJabatan(); 
        }    
        else{
            $jabatan = $this->jabatan->getJabatan($id);
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