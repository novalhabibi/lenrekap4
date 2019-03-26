<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TrainingController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("trainingmodel");
    }
    
    
    public function index(){
        $data["trainings"]=$this->trainingmodel->getAll();
        $this->load->view("admin/trainings/index",$data);
    }


    public function tambah(){
        // $data["trainings"]=$this->trainingmodel->getAll();
        if (isset($_POST["submit"])) {
            # code...
            $this->simpan();
        } else {
            # code...
            $this->load->view("admin/trainings/tambah");
        }
        
    }

    public function simpan()
    {
       print_r($post = $this->input->post());
    }
}
