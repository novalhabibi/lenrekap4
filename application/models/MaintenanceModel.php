<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaintenanceModel extends CI_Model
{
    private $_table ="maintenances";

    public $nama_maintenance;
    public $deskripsi;
    public $gambar_maintenance;
    public $link_maintenance;

    private function _uploadGambar()
    {
        $tujuan ="./uploads/maintenances/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            =$this->link_maintenance;
        $config['overwrite']        = true;

        // $handle = ($_FILES["gambar"]["tmp_name"]);
        // $config['file_name']        = $config['full_path'];
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_maintenance')) {
            # code...
            return $nama = $tujuan.$this->upload->data('file_name');
            // $lokasi = "/uploads/news/".$nama;
        }

        return "no-image.png";

    }

    private function _hapusGambar($id)
    {
        $maintenance = $this->getById($id);
        $filename = explode(".",$maintenance->link_maintenance)[0];

        return array_map('unlink', glob(FCPATH."uploads/maintenances/$filename.*"));

        
    }



    public function rules()
    {
        return[
            ['field'=>'nama_maintenance',
             'label'=>'nama_maintenance',
             'rules'=>'required'],

            ['field'=>'deskripsi',
             'label'=>'deskripsi',
             'rules'=>'required']
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function maintenancepertama()
    {
        $this->db->order_by('id', 'DESC');
    //    return $this->db->get_where($this->_table,["status"=>1])->row();
       return $this->db->get_where($this->_table)->row();
    }

    public function forMaintenance()
    {
        return $this->db->get($this->_table,4,0)->result();
        
    }

    public function MaintenanceSingle()
    {
        return $this->db->get($this->_table,4,0)->result();
        
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }


    public function getByLink($link)
    {
        return $this->db->get_where($this->_table,["link_maintenance"=>$link])->row();
    }

    public function save()
    {

        $post = $this->input->post();
        $this->nama_maintenance=$post["nama_maintenance"];
        $this->link_maintenance=url_title($post["nama_maintenance"], 'dash', TRUE);
        $this->gambar_maintenance=$this->_uploadGambar();
        $this->deskripsi=$post["deskripsi"];

        
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->nama_maintenance=$post["nama_maintenance"];
        $this->link_maintenance=url_title($post["nama_maintenance"], 'dash', TRUE);

        if (!empty($_FILES["gambar_maintenance"]["name"])) {
            $this->gambar_maintenance = $this->_uploadGambar();
        } else {
            $this->gambar_maintenance = $post["gambar_lama"];
        }
        

        $this->deskripsi= $post["deskripsi"];
        $this->db->update($this->_table,$this, array('id'=>$post['id']));
    }

    public function delete($id)
    {
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array('id'=>$id));
        // echo $id;
    }


}
