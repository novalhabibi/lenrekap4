<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if (! $this->session->userdata('logged')) {
            redirect("admin/auth");
        }
        $this->load->model("newsmodel");
        $this->load->model("maintenancemodel");
        $this->load->model("trainingmodel");
        $this->load->model("servicemodel");
        $this->load->model("clientmodel");
        $this->load->model("settingmodel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data["news"] = $this->newsmodel->getAll();
        $this->load->view("admin/news/list",$data);
    }


    public function show()
    {
        $slug = $this->uri->segment(2);
        $data["setting"]=$this->db->get_where("setting",["id"=>1])->row();
        $data["maintenances"] = $this->maintenancemodel->getAll();
        $data["trainings"] = $this->trainingmodel->getAll();
        $data["clients"] = $this->clientmodel->getAll();
        $data["services"] = $this->servicemodel->getAll();
        $data["news"] = $this->newsmodel->getBySlug($slug);
        $this->load->view('templates/header',$data);
        $this->load->view("pages/single-news",$data);
        $this->load->view('templates/footer');

        if(!$data["news"]) show_404();
    }

    public function add()
    {
        $news = $this->newsmodel;
        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $news->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
        }
        
        // if (isset($_POST["submit"])) {
        //     print_r($_POST);
            
        // } else {
        //     # code...
        //     $this->load->view("admin/sliders/new_form");
        // }
        
        $this->load->view("admin/news/new_form");
        
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        
        $news = $this->newsmodel;
        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $news->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/news');
            
        }
        
        $data["news"]= $news->getById($id);
        if(!$data["news"]) show_404();
        $this->load->view("admin/news/edit_form", $data);

    }
    
    
    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->newsmodel->delete($id);
        $this->session->set_flashdata('successDelete','Berhasil dihapus');
        redirect('admin/news');
    }

}
