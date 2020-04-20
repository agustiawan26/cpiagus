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

    // CREATE
	function create_alternatif($alternatif,$kecamatan,$kriteria){
		$this->db->trans_start();
			//INSERT TO alternatif
			//date_default_timezone_set("Asia/Bangkok");
			$data  = array(
				'alternatif' => $alternatif,
				'kecamatan' => $kecamatan
				//'alternatif_created_at' => date('Y-m-d H:i:s') 
			);
			$this->db->insert('alternatif', $data);
			//GET ID alternatif
			$alternatif_id = $this->db->insert_id();
			$result = array();
			    foreach($kriteria AS $key => $val){
				     $result[] = array(
				      'nilai_alternatif_id'  	=> $alternatif_id,
				      'nilai_kriteria_id'  	=> $_POST['kriteria'][$key]
				     );
			    }      
			//MULTIPLE INSERT TO nilai_tbl TABLE
			$this->db->insert_batch('nilai_tbl', $result);
		$this->db->trans_complete();
	}
	
	// UPDATE
	function update_alternatif($id,$alternatif,$kriteria){
		$this->db->trans_start();
			//UPDATE TO alternatif
			$data  = array(
				'alternatif' => $alternatif
			);
			$this->db->where('alternatif_id',$id);
			$this->db->update('alternatif', $data);
			
			//DELETE nilai_tbl alternatif
			$this->db->delete('nilai_tbl', array('nilai_alternatif_id' => $id));

			$result = array();
			    foreach($kriteria AS $key => $val){
				     $result[] = array(
				      'nilai_alternatif_id'  	=> $id,
				      'nilai_kriteria_id'  	=> $_POST['kriteria_edit'][$key]
				     );
			    }      
			//MULTIPLE INSERT TO nilai_tbl TABLE
			$this->db->insert_batch('nilai_tbl', $result);
		$this->db->trans_complete();
	}

	// DELETE
	function delete_alternatif($id){
		
			$this->db->delete('nilai_tbl', array('nilai_alternatif_id' => $id));
			$this->db->delete('alternatif', array('alternatif_id' => $id));
		
	}
}