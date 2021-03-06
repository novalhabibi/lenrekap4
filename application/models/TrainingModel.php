<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrainingModel extends CI_Model
{
    private $_table ="trainings";

    public $nama_training;
    public $deskripsi;
    public $gambar_training;
    public $link_training;

    private function _uploadGambar()
    {
        $tujuan ="./uploads/trainings/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            =$this->link_training;
        $config['overwrite']        = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_training')) {
            # code...
            return $nama = $tujuan.$this->upload->data('file_name');
            // $lokasi = "/uploads/news/".$nama;
        }

        return "no-image.png";
  
    }


    private function _hapusGambar($id)
    {
        $training = $this->getById($id);
        $filename = explode(".",$training->link_training)[0];
        return array_map('unlink', glob(FCPATH."uploads/trainings/$filename.*"));   
    }

    public function rules()
    {
        return[
            ['field'=>'nama_training',
             'label'=>'nama_training',
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

    public function trainingpertama()
    {
        $this->db->order_by('id', 'DESC');
    //    return $this->db->get_where($this->_table,["status"=>1])->row();
       return $this->db->get_where($this->_table)->row();
    }

    public function fortraining()
    {
        return $this->db->get($this->_table,4,0)->result();
        
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }


    public function getByLink($link)
    {
        return $this->db->get_where($this->_table,["link_training"=>$link])->row();
    }

    public function save()
    {

        $post = $this->input->post();
        $this->nama_training=$post["nama_training"];
        $this->link_training=url_title($post["nama_training"], 'dash', TRUE);
        $this->gambar_training=$this->_uploadGambar();
        $this->deskripsi=$post["deskripsi"];

        
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->nama_training=$post["nama_training"];
        $this->link_training=url_title($post["nama_training"], 'dash', TRUE);

        if (!empty($_FILES["gambar_training"]["name"])) {
            $this->gambar_training = $this->_uploadGambar();
        } else {
            $this->gambar_training = $post["gambar_lama"];
        }
        

        $this->deskripsi= $post["deskripsi"];
        $this->db->update($this->_table,$this, array('id'=>$post['id']));
    }

    public function delete($id)
    {
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array('id'=>$id));
        //add flash data 
        //  $this->session->set_flashdata('data','data berhasil di klik.');
        // echo $id;
    }


}
