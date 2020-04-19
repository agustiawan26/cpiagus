<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter_model extends CI_Model
{
    private $_table = "parameter";

    public $parameter_id;
    public $kriteria_id;
    public $nama_parameter;
    public $nilai_parameter;
    // public $image = "default.jpg";
    // public $description;

    public function rules()
    {
        return [
            ['field' => 'nama_parameter',
            'label' => 'Nama_parameter',
            'rules' => 'required'],
            
            ['field' => 'nilai_parameter',
            'label' => 'Nilai_parameter',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
        
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["parameter_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        //$this->parameter_id = uniqid();
        $this->kriteria = $post["kriteria"];
        $this->bobot = $post["bobot"];
        $this->tren = $post["tren"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kriteria_id = $post["id"];
        $this->kriteria = $post["kriteria"];
        $this->bobot = $post["bobot"];
        $this->tren = $post["tren"];
        return $this->db->update($this->_table, $this, array('kriteria_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kriteria_id" => $id));
    }
}