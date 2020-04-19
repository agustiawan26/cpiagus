<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    private $_table = "kriteria";

    public $kriteria_id;
    public $kriteria;
    public $bobot;
    public $tren;
    // public $image = "default.jpg";
    // public $description;

    public function rules()
    {
        return [
            ['field' => 'kriteria',
            'label' => 'Kriteria',
            'rules' => 'required'],
            
            ['field' => 'bobot',
            'label' => 'Bobot',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kriteria_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->kriteria_id = $post["id"];
        $this->kriteria = $post["kriteria"];
        $this->bobot = $post["bobot"];
        $this->tren = $post["tren"];
        return $this->db->insert($this->_table, $this);

        $this->insertIntoNilai($this->input->post('kriteria_id'));
    }

    public function savePara()
    {
        $jPar = 0;

        $post = $this->input->post();
        // $this->kriteria_id = $post["kriteria_id"];
        $this->kriteria = $post["kriteria"];
        $this->bobot = $post["bobot"];
        $this->tren = $post["tren"];

        for($i=0; $i<$id; $i++){
            if ($this->input->post('par'.$i)!='') {
             $jPar = $i;
           }
          }

          $this->db->insert($this->_table, $this);
          // $this->db->insert('tbl_kriteria',$data);
          
          $this->insertIntoNilai($this->input->post('kriteria_id'));
   
          for($i=0; $i<=$jPar; $i++){
           $this->insertIntoParameter($this->input->post('kriteria_id'), $this->input->post('par'.$i),$i);
          }
        
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
        $this->deleteNilai($id);
        $where = array(
            'kriteria_id' => $id
           );
          $this->db->delete('kriteria',$where);
    }


    //Fungsi Otomatis CRUD Tabel nilai_kriteria//
    private function insertIntoNilai($id)
    {
    $this->db->query("INSERT INTO nilai_tbl(alternatif_id, kriteria_id, nilai) SELECT alternatif_id, '$id', 0  FROM alternatif");
        return;
    }

    private function deleteNilai($id)
    {
    $where = array(
        'kriteria_id' => $id
    );
    $this->db->delete('nilai_tbl',$where);
    }

    private function insertIntoParameter($id,$parameter, $value)
    {
    $data = array(
        'kriteria_id' => $id,
        'nama_parameter' => $parameter,   
        'nilai_parameter' => $value
    );  
    return $this->db->insert('parameter', $data);

    }

    public function getCountKriteria(){
        $query = $this->db->query("SELECT COUNT(*) as jumlah_kriteria FROM kriteria");
        return $query->row();
      }

}