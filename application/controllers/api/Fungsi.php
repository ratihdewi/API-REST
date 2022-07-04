<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Fungsi extends REST_Controller
{
    private $secretkey = 'njkdsfkdsjfklj43AD4rf';
    public function __Construct()
    {
        parent::__Construct();
        $this->hris = $this->load->database('hris', TRUE);
        $this->load->model('Fungsi_model', 'unit');
    }

    public function index_post()
    {
        $id = $this->get('id');
        if($id === null){
           $unit = $this->unit->getFungsi(); 
        }    
        else{
            $unit = $this->unit->getFungsi($id);
        }

        if($unit){
            
            $this->response([
                'status' => TRUE,
                'data' => $unit,
            ], REST_Controller::HTTP_OK); 
        } else{
            $this->response([
                'status' => false,
                'message' => 'Unit kerja not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
        
    }
}