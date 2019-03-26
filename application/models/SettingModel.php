<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingModel extends CI_Model
{
    private $_table ="setting";

    public $id=1;
    public $title;
    public $favicon;
    public $logo;
    public $visi;
    public $misi;
    public $alamat;
    public $email;
    public $no_telpon;



    private function _uploadGambarFavicon()
    {
        $tujuan ="./uploads/settings/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png|ico';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('favicon')) {
            return $nama = $tujuan.$this->upload->data('file_name');
        }
        return "no-image.png";

    }

    private function _hapusGambarFavicon($id)
    {
        $setting = $this->getById($id);
        $filename = explode(".",$setting->title)[0];
        return array_map('unlink', glob(FCPATH."uploads/settings/$filename.icon"));

        
    }



    private function _uploadGambarLogo()
    {
        $tujuan ="./uploads/settings/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            return $nama = $tujuan.$this->upload->data('file_name');
        }
        return "no-image.png";

    }

    private function _hapusGambarLogo($id)
    {
        $setting = $this->getById($id);
        $filename = explode(".",$setting->title)[0];
        return array_map('unlink', glob(FCPATH."uploads/settings/$filename.png"));

        
    }


    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->title=$post["title"];
        // $this->link_maintenance=url_title($post["title"], 'dash', TRUE);

        if (!empty($_FILES["favicon"]["name"])) {
            $this->favicon = $this->_uploadGambarFavicon();
        } else {
            $this->favicon = $post["favicon_lama"];
        }

        if (!empty($_FILES["logo"]["name"])) {
            $this->logo = $this->_uploadGambarLogo();
        } else {
            $this->logo = $post["logo_lama2"];
        }
        

        $this->visi= $post["visi"];
        $this->misi= $post["misi"];
        $this->alamat= $post["alamat"];
        $this->email= $post["email"];
        $this->no_telpon= $post["no_telpon"];
        $this->db->update($this->_table,$this, array('id'=>$post['id']));
    }



    public function rules()
    {
        return[
            ['field'=>'title',
             'label'=>'title',
             'rules'=>'required'],

            ['field'=>'visi',
             'label'=>'visi',
             'rules'=>'required'],

            ['field'=>'misi',
             'label'=>'misi',
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
        $this->title=$post["title"];
        // $this->link_maintenance=url_title($post["title"], 'dash', TRUE);
        $this->favicon=$this->_uploadGambar();
        $this->deskripsi=$post["deskripsi"];

        
        $this->db->insert($this->_table,$this);
    }

    

    public function delete($id)
    {
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array('id'=>$id));
        // echo $id;
    }


}
