<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FrontendController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('newsmodel');

    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
    }

    public function maintenances()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/maintenances');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/profile');
        $this->load->view('templates/footer');
    }

    public function news()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/news');
        $this->load->view('templates/footer');
    }

    public function singlenews()
    {
        $slug = $this->uri->segment(2);
        $data['news']=$this->newsmodel->getBySlug($slug);
        $this->load->view('templates/header');
        $this->load->view('pages/single-news',$data);
        $this->load->view('templates/footer');
    }
}




