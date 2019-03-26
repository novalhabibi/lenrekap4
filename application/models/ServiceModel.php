<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceModel extends CI_Model
{
    private $_table ="services";

    public $nama_service;
    public $deskripsi;
    public $gambar_service;
    public $link_service;

    private function _uploadGambar()
    {
        $tujuan ="./uploads/services/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            =$this->link_service;
        // $config['overwrite']        = true;

        // $handle = ($_FILES["gambar"]["tmp_name"]);
        // $config['file_name']        = $config['full_path'];
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_service')) {
            # code...
            return $nama = $tujuan.$this->upload->data('file_name');
            // $lokasi = "/uploads/news/".$nama;
        }

        return "no-image.png";

    }

    private function _hapusGambar($id)
    {
        $service = $this->getById($id);
        $filename = explode(".",$service->link_service)[0];

        return array_map('unlink', glob(FCPATH."uploads/services/$filename.*"));

        
    }



    public function rules()
    {
        return[
            ['field'=>'nama_service',
             'label'=>'nama_service',
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

    public function servicepertama()
    {
        $this->db->order_by('id', 'DESC');
    //    return $this->db->get_where($this->_table,["status"=>1])->row();
       return $this->db->get_where($this->_table)->row();
    }

    public function forservice()
    {
        return $this->db->get($this->_table,4,0)->result();
        
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }


    public function getByLink($link)
    {
        return $this->db->get_where($this->_table,["link_service"=>$link])->row();
    }

    public function save()
    {

        $post = $this->input->post();
        $this->nama_service=$post["nama_service"];
        $this->link_service=url_title($post["nama_service"], 'dash', TRUE);
        $this->gambar_service=$this->_uploadGambar();
        $this->deskripsi=$post["deskripsi"];

        
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->nama_service=$post["nama_service"];
        $this->link_service=url_title($post["nama_service"], 'dash', TRUE);

        if (!empty($_FILES["gambar_service"]["name"])) {
            $this->gambar_service = $this->_uploadGambar();
        } else {
            $this->gambar_service = $post["gambar_lama"];
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
