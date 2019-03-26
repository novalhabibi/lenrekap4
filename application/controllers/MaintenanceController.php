<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaintenanceController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        

        $this->load->model("maintenancemodel");
        $this->load->model("servicemodel");
        $this->load->model("trainingmodel");
        $this->load->model("clientmodel");
        $this->load->model("settingmodel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        $data["maintenances"] = $this->maintenancemodel->getAll();
        $this->load->view("admin/maintenances/index",$data);
    }


    public function show()
    {
        
        $link = $this->uri->segment(2);
        
        // for header
        $data["maintenances"] = $this->maintenancemodel->getAll();
        $data["services"] = $this->servicemodel->getAll();
        $data["trainings"] = $this->trainingmodel->getAll();
        $data["setting"]=$this->db->get_where("setting",["id"=>1])->row();
        

        $data["clients"] = $this->clientmodel->getAll();
        $data["maintenance"] = $this->maintenancemodel->getByLink($link);
        $this->load->view('templates/header',$data);
        $this->load->view("pages/single-maintenance",$data);
        $this->load->view('templates/footer',$data);
        if(!$data["maintenance"]) show_404();
    }

    public function add()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        $maintenance = $this->maintenancemodel;
        $validation = $this->form_validation;
        $validation->set_rules($maintenance->rules());

        if ($validation->run()) {
            $maintenance->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
            redirect('admin/maintenances');

        }
        
        $this->load->view("admin/maintenances/tambah");
        
    }

    public function edit()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}


        $id = $this->uri->segment(4);
        
        $maintenance = $this->maintenancemodel;
        $validation = $this->form_validation;
        $validation->set_rules($maintenance->rules());

        if ($validation->run()) {
            $maintenance->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/maintenances');
            
        }
        
        $data["maintenance"]= $maintenance->getById($id);
        if(!$data["maintenance"]) show_404();
        $this->load->view("admin/maintenances/edit", $data);

    }

    public function update()
    {
        $maintenance = $this->maintenancemodel;
        $maintenance->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/maintenances');

    }
    
    
    public function hapus()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}

        $id = $this->uri->segment(4);
        $this->maintenancemodel->delete($id);
        $this->session->set_flashdata('success','Berhasil dihapus');
        redirect('admin/maintenances');
    }

}
