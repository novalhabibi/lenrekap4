<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderModel extends CI_Model
{
    private $_table ="slider";

    public $judul;
    public $gambar;
    public $deskripsi;
    public $status;

    private function _uploadGambar()
    {
        $tujuan ="./uploads/sliders/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['file_name']            =$this->judul;
        $judul = $this->judul;
        $config['file_name']            =url_title($judul, 'dash', TRUE);
        $config['overwrite']        = true;
        // $handle = ($_FILES["gambar"]["tmp_name"]);
        // $config['file_name']        = $config['full_path'];
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            
            return $nama = $tujuan.$this->upload->data('file_name');
            // $lokasi = "/uploads/sliders/".$nama;
        }

        return "no-image.png";
    
    
        // print_r($data['upload']=$this->upload->data());
        // $lokasi = $this->upload->data('full_path');
    }

    private function _hapusGambar($id)
    {
        $slider = $this->getByDelete($id);
        // $slider = $this->getById($id);
        $judul = $slider->judul;
        $filename=explode(".",url_title($judul, 'dash', TRUE))[0];
        // $filename = explode(".",url_title($this->judul, 'dash', TRUE))[0];
        return array_map('unlink', glob(FCPATH."uploads/sliders/$filename.*"));   
    }

    public function rules()
    {
        return[
            ['field'=>'judul',
             'label'=>'Judul',
             'rules'=>'required'],

            ['field'=>'deskripsi',
             'label'=>'Deskripsi',
             'rules'=>'required']
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function sliderpertama()
    {
        $this->db->order_by('id', 'DESC');
       return $this->db->get_where($this->_table,["status"=>1])->row();
    }

    public function forSlider()
    {
        return $this->db->get_where($this->_table,["status"=>1])->result();
    }

    public function getByDelete($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->judul=$post["judul"];
        $this->gambar=$this->_uploadGambar();
        $this->deskripsi=$post["deskripsi"];
        if (isset($post["status"])) {
            # code...
            $this->status=$post["status"];
        }

        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->judul= $post["judul"];

        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadGambar();
        } else {
            $this->gambar = $post["gambar_lama"];
        }
        

        $this->deskripsi= $post["deskripsi"];
        if (isset($post["status"])) {
            # code...
            $this->status=$post["status"];
        }
        $this->db->update($this->_table,$this, array('id'=>$post['id']));
    }

    public function delete($id)
    {
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array('id'=>$id));
        // echo $id;
    }


}
