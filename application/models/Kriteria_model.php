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

    //Fungsi Otomatis CRUD Tabel nilai_kriteria//
    private function insertIntoNilai($id)
    {
    $this->db->query("INSERT INTO nilai_tbl(nilai_alternatif_id, nilai_kriteria_id, nilai) SELECT alternatif_id, '$id', 0  FROM alternatif");
        return;
    }

    private function deleteNilai($id)
    {
    $where = array(
        'kriteria_id' => $id
    );
    $this->db->delete('nilai_tbl',$where);
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

        $this->insertIntoNilai($this->input->post('kriteria_id'));

        return $this->db->insert($this->_table, $this);

        
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


    


    public function getCountKriteria(){
        $query = $this->db->query("SELECT COUNT(*) as jumlah_kriteria FROM kriteria");
        return $query->row();
      }

    // GET ALL alternatif
	function get_alternatifs(){
		$query = $this->db->get('alternatif');
		return $query;
	}

	//GET alternatif BY kriteria ID
	function get_alternatif_by_kriteria($kriteria_id){
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->join('nilai_tbl', 'nilai_alternatif_id=alternatif_id');
		$this->db->join('kriteria', 'kriteria_id=nilai_kriteria_id');
		$this->db->where('kriteria_id',$kriteria_id);
		$query = $this->db->get();
		return $query;
	}

	//READ
	function get_kriterias(){
		$this->db->select('kriteria.*,COUNT(alternatif_id) AS item_alternatif');
		$this->db->from('kriteria');
		$this->db->join('nilai_tbl', 'kriteria_id=nilai_kriteria_id');
		$this->db->join('alternatif', 'nilai_alternatif_id=alternatif_id');
		$this->db->group_by('kriteria_id');
		$query = $this->db->get();
		return $query;
	}

	// CREATE
	function create_kriteria($kriteria, $bobot, $tren, $alternatif){
		$this->db->trans_start();
			//INSERT TO kriteria
			//date_default_timezone_set("Asia/Bangkok");
			$data  = array(
				'kriteria' => $kriteria,
				'bobot' => $bobot,
				'tren' => $tren
				//'kriteria_created_at' => date('Y-m-d H:i:s') 
			);
			$this->db->insert('kriteria', $data);
			//GET ID kriteria
			$kriteria_id = $this->db->insert_id();
			$result = array();
			    foreach($alternatif AS $key => $val){
				     $result[] = array(
				      'nilai_kriteria_id'  	=> $kriteria_id,
				      'nilai_alternatif_id'  	=> $_POST['alternatif'][$key]
				     );
			    }      
			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('nilai_tbl', $result);
		$this->db->trans_complete();
	}
	
	// UPDATE
	function update_kriteria($id,$kriteria,$alternatif,$bobot,$tren){        
        $this->db->trans_start();
			//UPDATE TO alternatif
			$data  = array(
                'kriteria' => $kriteria,
                'bobot' => $bobot,
                'tren' => $tren
			);
			$this->db->where('kriteria_id',$id);
			$this->db->update('kriteria', $data);
			
			//DELETE nilai_tbl alternatif
			$this->db->delete('nilai_tbl', array('nilai_kriteria_id' => $id));

			$result = array();
			    foreach($alternatif AS $key => $val){
				     $result[] = array(
				      'nilai_kriteria_id'  	=> $id,
				      'nilai_alternatif_id'  	=> $_POST['alternatif_edit'][$key]
				     );
			    }      
			//MULTIPLE INSERT TO nilai_tbl TABLE
			$this->db->insert_batch('nilai_tbl', $result);
		$this->db->trans_complete();
	}

	// DELETE
	function delete_kriteria($id){
		$this->db->trans_start();
			$this->db->delete('nilai_tbl', array('nilai_kriteria_id' => $id));
			$this->db->delete('kriteria', array('kriteria_id' => $id));
		$this->db->trans_complete();
	}

}