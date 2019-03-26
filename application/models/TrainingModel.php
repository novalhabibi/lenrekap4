<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrainingModel extends CI_Model
{
    public $_table = "trainings";


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
