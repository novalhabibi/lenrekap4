<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if (! $this->session->userdata('logged')) {
            redirect("admin/auth");
        }
        $this->load->model("slidermodel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["sliders"] = $this->slidermodel->getAll();
        $this->load->view("admin/sliders/list",$data);
    }

    public function add()
    {
        $slider = $this->slidermodel;
        $validation = $this->form_validation;
        $validation->set_rules($slider->rules());

        if ($validation->run()) {
            $slider->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
        }
        
        // if (isset($_POST["submit"])) {
        //     print_r($_POST);
            
        // } else {
        //     # code...
        //     $this->load->view("admin/sliders/new_form");
        // }
        
        $this->load->view("admin/sliders/new_form");
        
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        
        $slider = $this->slidermodel;
        $validation = $this->form_validation;
        $validation->set_rules($slider->rules());

        if ($validation->run()) {
            $slider->update();
            $this->session->set_flashdata('success','Berhasil update');
            redirect('admin/sliders');
            
        }
        
        $data["slider"]= $slider->getById($id);
        if(!$data["slider"]) show_404();
        $this->load->view("admin/sliders/edit_form", $data);

    }
    
    
    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->slidermodel->delete($id);
        $this->session->set_flashdata('successDelete','Berhasil dihapus');
        redirect('admin/sliders');
    }

}
