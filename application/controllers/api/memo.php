<?php

// use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class memo extends REST_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('memo_model', 'sima');

        // $this->methods['index_get']['limit'] = 10;
    }
    public function index_get(){

        $nomor_surat = $this->get('nomor_surat', 'klasifikasi_id');
        if($nomor_surat === null){
           $sima = $this->sima->getMemo(); 
        }    
        else{
            $sima = $this->sima->getMemo($nomor_surat);
        } 
        if($klasifikasi_id === null){
           $sima = $this->sima->getMemo(); 
        }    
        else{
            $sima = $this->sima->getMemo($klasifikasi_id);
        }    
        var_dump($mahasiswa);

        if($sima){
            $this->response([
                'status' => TRUE,
                'data' => $sima
            ], REST_Controller::HTTP_OK); 
        } else{
            $this->response([
                'status' => false,
                'message' => 'nomor surat not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete(){
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else{
            if($this->mahasiswa->deleteMemo($id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK); 
            }else{
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if($this->mahasiswa->createMemo($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new Memo has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else{
            $this->response([
                'status' => false,
                'message' => 'failed to create data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // public function index_put()
    // {
    //     $id = $this->put('id');
    //     $data = [
    //         'nrp' => $this->put('nrp'),
    //         'nama' => $this->put('nama'),
    //         'email' => $this->put('email'),
    //         'jurusan' => $this->put('jurusan')
    //     ];

    //     if($this->mahasiswa->updateMahasiswa($data, $id) > 0){            
    //         $this->response([
    //             'status' => true,
    //             'message' => 'Updated.'
    //         ], REST_Controller::HTTP_CREATED);
    //     } else{
    //         $this->response([
    //             'status' => false,
    //             'message' => 'failed to create data'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

}