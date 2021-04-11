<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $this->load->database();
        
        $this->load->model('user');

    }

    public function index(){

        $this->load->view('commons/header.php');
        $this->load->view('index.php');
        $this->load->view('commons/footer.php');

    }

    public function show($email='')
    {

        if($_SERVER["REQUEST_METHOD"] === "GET"){

            if(!empty($email)){
                $response = $this->user->getByEmail($email);
            }else{
                $response = $this->user->getAll();
            }

            echo json_encode($response);

        }
    }

}