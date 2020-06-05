<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_model extends CI_Model
{
    // private $_table = "alternatif";

    // public $alternatif_id;
    // public $alternatif;
    // public $kecamatan;

    // public function rules()
    // {
    //     return [
    //         ['field' => 'alternatif',
    //         'label' => 'Alternatif',
    //         'rules' => 'required'],
            
    //         ['field' => 'kecamatan',
    //         'label' => 'Kecamatan',
    //         'rules' => 'required']
    //     ];
    // }

    public function getAll()
    {
        return $this->db->get('alternatif');
    }
    
    // public function getById($id)
    // {
    //     return $this->db->get_where($this->_table, ["alternatif_id" => $id])->row();
    // }

    // public function save()
    // {
    //     $post = $this->input->post();
    //     // $this->alternatif_id = $post["id"];
    //     $this->alternatif = $post["alternatif"];
    //     $this->kecamatan = $post["kecamatan"];
    //     return $this->db->insert($this->_table, $this);
    //     $this->insertIntoNilai($this->input->post('alternatif_id'));

    // }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->alternatif_id = $post["id"];
    //     $this->alternatif = $post["alternatif"];
    //     $this->kecamatan = $post["kecamatan"];
    //     return $this->db->update($this->_table, $this, array('alternatif_id' => $post['id']));
    // }

    

    public function getParameter()
    {
        return $this->db->get('parameter')->result();
	}
	
	// function get_selected_param($id)
    // {
    //     $this->db->select('p.parameter_id, p.kriteria_id, p.nama_parameter, p.nilai_parameter, k.kriteria_id, k.kriteria');
    //     $this->db->from('parameter p');
    //     $this->db->join('kriteria k', 'k.kriteria_id = p.kriteria_id');
    //     $this->db->where('p.kriteria_id =', $id);
    //     $this->db->order_by('p.nilai_parameter');
    //     return $this->db->get();
    // }

    private function insertIntoNilai($id)
    {
    $this->db->query("INSERT INTO nilai_tbl(nilai_alternatif_id, nilai_kriteria_id) SELECT '$id', kriteria_id FROM kriteria");
        return;
    }

    // private function insertIntoRelasi($id)
    // {
    // $this->db->query("INSERT INTO nilai_tbl(alternatif_id, kriteria_id) SELECT '$id', kriteria_id FROM kriteria");
    //     return;
    // }

	public function getCountAlternatif()
	{
        $query = $this->db->query("SELECT COUNT(*) as jumlah_alternatif FROM alternatif");
        return $query->row();
    }

    // START HERE

    // GET ALL kriteria
	// function get_kriterias(){
	// 	$query = $this->db->get('kriteria');
	// 	return $query;
	// }

	//GET kriteria BY alternatif ID
	// function get_kriteria_by_alternatif($alternatif_id){
	// 	$this->db->select('*');
	// 	$this->db->from('kriteria');
	// 	$this->db->join('nilai_tbl', 'nilai_kriteria_id=kriteria_id');
	// 	$this->db->join('alternatif', 'alternatif_id=nilai_alternatif_id');
	// 	$this->db->where('alternatif_id',$alternatif_id);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// //READ
	// function get_alternatifs(){
	// 	$this->db->select('alternatif.*,COUNT(kriteria_id) AS item_kriteria');
	// 	$this->db->from('alternatif');
	// 	$this->db->join('nilai_tbl', 'alternatif_id=nilai_alternatif_id');
	// 	$this->db->join('kriteria', 'nilai_kriteria_id=kriteria_id');
	// 	$this->db->group_by('alternatif_id');
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	public function createalternatif()
    {
      $alternatif_id = $this->input->post('alternatif_id');  
      $data = array(
            'alternatif_id' => $this->input->post('alternatif_id'),
            'alternatif' => $this->input->post('alternatif'),
            'kecamatan' => $this->input->post('kecamatan'),
        );
        
        $this->db->insert('alternatif',$data);
        //$this->db->query("INSERT INTO nilai_tbl(nilai_kriteria_id, nilai_alternatif_id) SELECT '$alternatif_id', kriteria_id FROM kriteria");
        $this->insertIntoNilai($this->input->post('alternatif_id'));
        $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
            <i class="fa fa-info-circle mr-3"></i>
            <span>Data alternatif berhasil ditambahkan!</span>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
			<span aria-hidden="true">×</span>
            </button> </div>');
            
	}
	
	public function getMaxKode()
	{
	$query = $this->db->query("SELECT (MAX(alternatif_id))+1 as max_id FROM alternatif");
	return $query->row();
	}

	public function updatealternatif($id)
	{
	$where = array('alternatif_id' => $id );
	$data = array(
		'alternatif' => $this->input->post('alternatif'),
		'kecamatan' => $this->input->post('kecamatan'),
	);
	$this->db->where($where);
    $this->db->update('alternatif',$data);
    $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
            <i class="fa fa-info-circle mr-3"></i>
            <span>Data alternatif berhasil diedit!</span>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
			<span aria-hidden="true">×</span>
            </button> </div>');
	}

	//DELETE
	public function delete_alternatif($id){
		$this->db->delete('nilai_tbl', array('nilai_alternatif_id' => $id));
        $this->db->delete('alternatif', array('alternatif_id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
            <i class="fa fa-info-circle mr-3"></i>
            <span>Data alternatif berhasil dihapus!</span>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
			<span aria-hidden="true">×</span>
            </button> </div>');
	}
	// public function delete_alternatif($id)
    // {
	// 	// return $this->db->delete($this->_table, array("alternatif_id" => $id));
	// 	$this->db->delete('nilai_tbl', array('nilai_alternatif_id' => $id));
	// 	$this->db->delete('alternatif', array('alternatif_id' => $id));

    // }

	public function getselectedalternatif($id)
	{
		$where = array(
			'alternatif_id' => $id
		);

		$query = $this->db->get_where('alternatif',$where);
		return $query->row();
	}
}