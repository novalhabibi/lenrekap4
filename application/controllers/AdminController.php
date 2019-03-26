<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			// redirect(base_url("admin/login"));
        }
        
        
        $this->load->model("settingmodel");
     
    }




    public function index()
    {
        // echo "Ini admin";
        if($this->session->userdata('status') == "login"){
        $this->load->view("admin/dashboard");
        }else{
        $this->load->view("admin/login");
        }
    }


    public function login()
    {
        if($this->session->userdata('status') == "login"){
			redirect(base_url("admin"));
            
        }else{
			redirect(base_url("admin/login"));

        }
        

    }

    public function cek_login()
    {
        $username = $this->input->post('username');
            "<br>";
             $password = $this->input->post('password');
            "<br>";
            //  $remember_me = $this->input->post('remember_me');
            $where = array(
                'username' => $username,
                'password' => md5($password)
            );

            $data = $this->db->get_where("admins",$where)->row();
            $cek = $this->db->get_where("admins",$where)->num_rows();
            		if($cek > 0){
            
                        $data_session = array(
                            'id' => $data->id,
                            'username' => $username,
                            'status' => "login"
                            );
            
                        $this->session->set_userdata($data_session);
                        print_r($data_session);
            
                        redirect(base_url("admin"));
            
                    }else{
                        $this->load->view("admin/login");

                    }

    }

    public function logout() {

    // Destroy session data
    $this->session->sess_destroy();
    
    
    // $this->session->sess_destroy();
	redirect(base_url('admin'));
    
    }


    public function settings()
    {
        $data["setting"]=$this->settingmodel->settingpertama();
        
        // print_r($this->settingmodel->getAll());

        // echo "Data";
        $this->load->view("admin/settings",$data);
    }

    public function update_setting()
    {
        $this->settingmodel->update();
        $this->session->set_flashdata('success','Berhasil disimpan');
        redirect('admin/setting');
    }
    
}
