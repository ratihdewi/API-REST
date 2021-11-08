<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Surat extends REST_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('Surat_model', 'surat');
    }

    public function index_get()
    {
        $nomor_surat = $this->get('nomor_surat');
        if($nomor_surat === null){
           $surat = $this->surat->getSurat(); 
        }    
        else{
            $surat = $this->surat->getSurat($nomor_surat);
        }

        if($surat){
            $this->response([
                'status' => TRUE,
                'data' => $surat
            ], REST_Controller::HTTP_OK); 
        } else{
            $this->response([
                'status' => false,
                'message' => 'nomor surat not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}