<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

Class Staff extends REST_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->hris = $this->load->database('hris', TRUE);
        $this->load->model('Staff_model', 'user');
    }

    public function index_get()
    {
        $nip = $this->get('nip');
        if($nip === null){
            $user = $this->user->getStaff(); 
         }    
         else{
             $user = $this->user->getStaff($nip);
         }
 
         if($user){
             
             $this->response([
                 'status' => TRUE,
                 'data' => $user,
             ], REST_Controller::HTTP_OK); 
         } else{
             $this->response([
                 'status' => false,
                 'message' => 'Jabatan not found'
             ], REST_Controller::HTTP_NOT_FOUND);
         }
    }
}