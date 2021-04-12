<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST");

        $this->load->database();
        
        $this->load->model('user');

    }

    public function index(){

        $this->load->view('commons/header.php');
        $this->load->view('index.php');
        $this->load->view('commons/footer.php');

    }

    public function show()
    {

        if($_SERVER["REQUEST_METHOD"] === "GET"){

            $email=$this->input->get('email');

            $response['error'] = false;

            if($email){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $response['users'] = $this->user->getByEmail($email);
                }else{
                    $response['error'] = true;
                }
            }else{
                $response['users'] = $this->user->getAll();
            }

            echo  json_encode($response);

        }
    }

}