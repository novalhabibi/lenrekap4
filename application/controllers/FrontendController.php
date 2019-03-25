<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FrontendController extends CI_Controller
{
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
}




