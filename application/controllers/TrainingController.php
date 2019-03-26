<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TrainingController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("trainingmodel");
        // $this->load->model("maintenancemodel");
        // $this->load->model("servicemodel");
        // $this->load->model("settingmodel");
        // $this->load->model("clientmodel");
        $this->load->library('form_validation');
    }
    
    
    public function index(){
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        $data["trainings"]=$this->trainingmodel->getAll();
        $this->load->view("admin/trainings/index",$data);
    }

    public function show()
    {
        $link = $this->uri->segment(2);
        
        // for header
        $data["setting"]=$this->db->get_where("setting",["id"=>1])->row();
        $data["trainings"] = $this->trainingmodel->getAll();
        $data["maintenances"] = $this->maintenancemodel->getAll();
        $data["services"] = $this->servicemodel->getAll();
        $data["clients"] = $this->clientmodel->getAll();


        $data["training"] = $this->trainingmodel->getByLink($link);
        $this->load->view('templates/header',$data);
        $this->load->view("pages/single-training",$data);
        $this->load->view('templates/footer');
        if(!$data["training"]) show_404();
    }

    public function edit()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}

        $id = $this->uri->segment(4);
        
        $training = $this->trainingmodel;
        $validation = $this->form_validation;
        $validation->set_rules($training->rules());

        if ($validation->run()) {
            $training->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/trainings');
            
        }
        
        $data["training"]= $training->getById($id);
        if(!$data["training"]) show_404();
        $this->load->view("admin/trainings/edit", $data);

    }

    public function update()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
         $training = $this->trainingmodel;
         $training->update();
         $this->session->set_flashdata('success','Berhasil update');
         redirect('admin/trainings');
    }

    public function hapus()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        
        $id = $this->uri->segment(4);
        $this->trainingmodel->delete($id);
       $this->session->set_flashdata('success','Berhasil Dihapus');
        redirect('admin/trainings');  
    }


    public function tambah(){
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
        }
        
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
    if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        $this->trainingmodel->save();  
        $this->session->set_flashdata('success','Berhasil Disimpan');
        redirect('admin/trainings');  
        
    }



}
