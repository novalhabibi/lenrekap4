<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model
{
    private $_table ="clients";

    public $nama_client;
    public $icon_client;
    public $link_client;

    private function _uploadGambar()
    {
        $tujuan ="./uploads/clients/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        $nama_client = $this->nama_client;
        $config['file_name']            =url_title($nama_client, 'dash', TRUE);
        // $config['file_name']            =$this->link_client;
        // $handle = ($_FILES["gambar"]["tmp_name"]);
        $config['overwrite']        = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('icon_client')) {
            # code...
            return $nama = $tujuan.$this->upload->data('file_name');
            $lokasi = "/uploads/clients/".$nama;
        }

        return "no-image.png";
    }

    private function _hapusGambar($id)
    {
        $client = $this->getById($id);
        $nama_client = $client->nama_client;
        $filename=explode(".",url_title($nama_client, 'dash', TRUE))[0];
        // $filename = explode(".",url_title($this->judul, 'dash', TRUE))[0];
        return array_map('unlink', glob(FCPATH."uploads/clients/$filename.*"));   
    }


    public function rules()
    {
        return[
            ['field'=>'nama_client',
             'label'=>'nama_client',
             'rules'=>'required'],

            ['field'=>'link_client',
             'label'=>'link_client',
             'rules'=>'required']
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function clientpertama()
    {
        $this->db->order_by('id', 'DESC');
       return $this->db->get_where($this->_table,["status"=>1])->row();
    }

    public function forClient()
    {
        return $this->db->get_where($this->_table,["status"=>1])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_client=$post["nama_client"];
        $this->icon_client=$this->_uploadGambar();
        $this->link_client=$post["link_client"];
        
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->nama_client= $post["nama_client"];

        if (!empty($_FILES["icon_client"]["name"])) {
            $this->icon_client = $this->_uploadGambar();
        } else {
            $this->icon_client = $post["gambar_lama"];
        }
        

        $this->link_client= $post["link_client"];
        $this->db->update($this->_table,$this, array('id'=>$post['id']));
    }

    public function delete($id)
    {
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array('id'=>$id));
    }


}
