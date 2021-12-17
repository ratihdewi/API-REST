<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use \Firebase\JWT\JWT;

class Login extends REST_Controller
{
    private $secretkey = 'Reckless';
    private $table      = 'timesheets';

    public function __Construct()
    {
        parent::__Construct();
        $this->hris = $this->load->database('hris', TRUE);
        $this->load->model('Login/Login_model', 'user');
    }

    public function index_post() {
        // Get the post data
        $username = $this->post('username');
        $password = $this->post('password');
        
        // Validate the post data
        if(!empty($username) && !empty($password)){
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'username' => $username,
                'password' => md5($password),
                // 'status' => 1
            );
            $user = $this->user->getRows($con);
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response([
                    'status' => false,
                    'message' => 'Wrong username or password',
                    'data' => $user
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }else{
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Provide username and password',
                'data' => $user
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
?>