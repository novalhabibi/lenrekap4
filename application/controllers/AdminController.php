<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        

    }


    public function index()
    {
        // echo "Ini admin";
        $this->load->view("admin/dashboard");
    }
    
}
