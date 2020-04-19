<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_model extends CI_Model
{
    private $_table = "alternatif";

    public $alternatif_id;
    public $alternatif;
    public $kecamatan;
    // public $image = "default.jpg";
    // public $description;

    public function rules()
    {
        return [
            ['field' => 'alternatif',
            'label' => 'Alternatif',
            'rules' => 'required'],
            
            ['field' => 'kecamatan',
            'label' => 'Kecamatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["alternatif_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->alternatif_id = $post["id"];
        $this->alternatif = $post["alternatif"];
        $this->kecamatan = $post["kecamatan"];
        return $this->db->insert($this->_table, $this);
        $this->insertIntoNilai($this->input->post('alternatif_id'));

    }

    public function update()
    {
        $post = $this->input->post();
        $this->alternatif_id = $post["id"];
        $this->alternatif = $post["alternatif"];
        $this->kecamatan = $post["kecamatan"];
        return $this->db->update($this->_table, $this, array('alternatif_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("alternatif_id" => $id));
    }

    public function getParameter()
    {
        return $this->db->get('parameter')->result();
    }

    // private function insertIntoNilai($id)
    // {
    // $this->db->query("INSERT INTO nilai(alternatif_id, kriteria_id) SELECT '$id', kriteria_id FROM kriteria");
    //     return;
    // }

    private function insertIntoRelasi($id)
    {
    $this->db->query("INSERT INTO nilai_tbl(alternatif_id, kriteria_id) SELECT '$id', kriteria_id FROM kriteria");
        return;
    }

    public function getCountAlternatif(){
        $query = $this->db->query("SELECT COUNT(*) as jumlah_alternatif FROM alternatif");
        return $query->row();
      }
}