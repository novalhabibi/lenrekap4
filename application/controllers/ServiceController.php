<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        
        
        $this->load->model("servicemodel");
        $this->load->model("maintenancemodel");
        $this->load->model("clientmodel");
        $this->load->model("trainingmodel");
        $this->load->model("settingmodel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        
        $data["services"] = $this->servicemodel->getAll();

        $this->load->view("admin/services/index",$data);
    }


    public function show()
    {
        $link = $this->uri->segment(2);
        // for header
        $data["setting"]=$this->db->get_where("setting",["id"=>1])->row();
        $data["maintenances"] = $this->maintenancemodel->getAll();
        $data["trainings"] = $this->trainingmodel->getAll();
        $data["services"] = $this->servicemodel->getAll();
        $data["clients"] = $this->clientmodel->getAll();

        $data["service"] = $this->servicemodel->getByLink($link);
        $this->load->view('templates/header',$data);
        $this->load->view("pages/single-service",$data);
        $this->load->view('templates/footer',$data);
        if(!$data["service"]) show_404();
    }

    public function add()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}

        $service = $this->servicemodel;
        $validation = $this->form_validation;
        $validation->set_rules($service->rules());

        if ($validation->run()) {
            $service->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
            redirect('admin/services');
        }
        
        $this->load->view("admin/services/tambah");
        
    }

    public function edit()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}

        $id = $this->uri->segment(4);
        
        $service = $this->servicemodel;
        $validation = $this->form_validation;
        $validation->set_rules($service->rules());

        if ($validation->run()) {
            $service->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/services');
            
        }
        
        $data["service"]= $service->getById($id);
        if(!$data["service"]) show_404();
        $this->load->view("admin/services/edit", $data);

    }

    public function update()
    {
        $service = $this->servicemodel;
        $service->update();
        $this->session->set_flashdata('success','Berhasil update');
        redirect('admin/services');

    }
    
    
    public function delete()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        
        $id = $this->uri->segment(4);
        $this->servicemodel->delete($id);
        $this->session->set_flashdata('successDelete','Berhasil dihapus');
        redirect('admin/services');
    }

}
