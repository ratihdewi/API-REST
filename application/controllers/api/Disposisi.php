<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Disposisi extends REST_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('Disposisi_model', 'dispo');
    }

    public function index_get()
    {
        $nomor_surat = $this->get('nomor_surat');
        if($nomor_surat === null){
           $dispo = $this->dispo->getDispo(); 
        }    
        else{
            $dispo = $this->dispo->getDispo($nomor_surat);
        }

        if($dispo){
            $this->response([
                'status' => TRUE,
                'data' => $dispo
            ], REST_Controller::HTTP_OK); 
        } else{
            $this->response([
                'status' => false,
                'message' => 'nomor surat not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}