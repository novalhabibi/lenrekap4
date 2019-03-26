<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsModel extends CI_Model
{
    private $_table ="news";

    public $judul;
    public $slug;
    public $deskripsi;
    public $gambar;
    public $tgl_posting;
    public $id_admin=1;

    private function _uploadGambar()
    {
        date_default_timezone_set("Asia/Jakarta");
        date_default_timezone_get();

        $tujuan ="./uploads/news/";
        $config['upload_path']          = $tujuan;
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['file_name']            =$tujuan.$data[orig_name] ;
         
        $config['file_name']            =$this->slug;
        $config['overwrite']        = true;
        $this->load->library('upload', $config);
        
        $field_name = "maintenance".date("Y-m-d");

        if ($this->upload->do_upload('gambar')) {
            return $nama = $tujuan.$this->upload->data('file_name');
            
        }

        return "no-image.png";
    }

    private function _hapusGambar($id)
    {
        $news = $this->getById($id);
        $filename = explode(".",$news->slug)[0];
        return array_map('unlink', glob(FCPATH."uploads/news/$filename.*"));
        
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

    function getAllJoin() {

        $this->db->select ( '*' ); 
        $this->db->from ( 'news' );
        $this->db->join ( 'admins', 'admins.id = news.id_admin' , 'left' );
        $query = $this->db->get ();
        return $query->result ();
    }

    public function newspertama()
    {
        $this->db->order_by('id', 'DESC');
    //    return $this->db->get_where($this->_table,["status"=>1])->row();
       return $this->db->get_where($this->_table)->row();
    }

    public function forNews()
    {
        return $this->db->get($this->_table,4,0)->result();
        
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table,["id"=>$id])->row();
    }


    public function getBySlug($slug)
    {
        return $this->db->get_where($this->_table,["slug"=>$slug])->row();
    }

    public function save()
    {
        date_default_timezone_set("Asia/Jakarta");
        date_default_timezone_get();
        $post = $this->input->post();
        $this->judul=$post["judul"];
        $this->slug=url_title($post["judul"], 'dash', TRUE);
        $this->gambar=$this->_uploadGambar();
        $this->deskripsi=$post["deskripsi"];
        $this->tgl_posting=date("Y-m-d H:i:s");
        $id_admin=$this->session->userdata('id');
        $this->id_admin=$id_admin;

        
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->judul= $post["judul"];
        $this->slug=url_title($post["judul"], 'dash', TRUE);

        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadGambar();
        } else {
            $this->gambar = $post["gambar_lama"];
        }
        

        $this->deskripsi= $post["deskripsi"];
        $this->tgl_posting=$post["tgl_posting"];
        $this->id_admin=1;
        $this->db->update($this->_table,$this, array('id'=>$post['id']));
    }

    public function delete($id)
    {
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array('id'=>$id));
        // echo $id;
    }


}
