<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if (! $this->session->userdata('logged')) {
            // redirect("admin/auth");
        }
        $this->load->model("clientmodel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data["clients"] = $this->clientmodel->getAll();
        $this->load->view("admin/clients/index",$data);
    }

    public function add()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        $client = $this->clientmodel;
        $validation = $this->form_validation;
        $validation->set_rules($client->rules());

        if ($validation->run()) {
            $client->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
            redirect('admin/clients');
        }
        
        // if (isset($_POST["submit"])) {
        //     print_r($_POST);
            
        // } else {
        //     # code...
        //     $this->load->view("admin/sliders/new_form");
        // }
        
        $this->load->view("admin/clients/tambah");
        
    }

    public function edit()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
        $id = $this->uri->segment(4);
        
        $client = $this->clientmodel;
        $validation = $this->form_validation;
        $validation->set_rules($client->rules());

        if ($validation->run()) {
            $client->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/clients');
            
        }
        
        $data["client"]= $client->getById($id);
        if(!$data["client"]) show_404();
        $this->load->view("admin/clients/edit", $data);

    }

    public function update()
    {
         $client = $this->clientmodel;
         $client->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/clients');
    }
    
    
    public function hapus()
    {
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
        }
        
        $id = $this->uri->segment(4);
        $this->clientmodel->delete($id);
        $this->session->set_flashdata('successDelete','Berhasil dihapus');
        redirect('admin/clients');
    }

}
