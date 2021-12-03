<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Organisasi extends REST_Controller
{
    private $secretkey = 'Reckless';
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('Organisasi_model', 'jabatan');
    }

    public function index_get()
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