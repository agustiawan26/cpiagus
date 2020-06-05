<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
  public function createkriteriawp($id)
    {
        $jPar = 0;
        $data = array(
            'kriteria_id' => $this->input->post('kriteria_id'),
            'kriteria' => $this->input->post('kriteria'),
            'bobot' => $this->input->post('bobot'),
            'tren' => $this->input->post('tren'),
            'is_para' => '1',
        );
        for($i=0; $i<$id; $i++){
            if ($this->input->post('par'.$i)!='') {
            $jPar = $i;
            }
        }
        $this->db->insert('kriteria',$data);
        $this->insertIntoNilai($this->input->post('kriteria_id'));

        for($i=0; $i<=$jPar; $i++){
            $this->insertIntoParameter($this->input->post('kriteria_id'), $this->input->post('par'.$i),$i+1);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
          <i class="fa fa-info-circle mr-3"></i>
          <span>Data kriteria berhasil ditambahkan!</span>
          <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">×</span>
          </button> </div>');

    }

    public function createkriteria()
    {
      $kriteria_id = $this->input->post('kriteria_id');  
      $data = array(
            'kriteria_id' => $this->input->post('kriteria_id'),
            'kriteria' => $this->input->post('kriteria'),
            'bobot' => $this->input->post('bobot'),
            'tren' => $this->input->post('tren'),
            'is_para' => '0',
        );
        
        $this->db->insert('kriteria',$data);

        // $this->db->query("INSERT INTO nilai_tbl(nilai_kriteria_id, nilai_alternatif_id) 
        //   SELECT '$kriteria_id', alternatif_id 
        //   FROM alternatif");
        $this->insertIntoNilai($this->input->post('kriteria_id'));

        $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
          <i class="fa fa-info-circle mr-3"></i>
          <span>Data kriteria berhasil ditambahkan!</span>
          <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">×</span>
          </button> </div>');

    }
    
    public function updatekriteriawp($id)
    {
      $where = array('kriteria_id' => $id );
      $data = array(
        
        'kriteria' => $this->input->post('kriteria'),
        'bobot' => $this->input->post('bobot'),
        'tren' => $this->input->post('tren'),
        'is_para' => '1',

      );
      $this->db->where($where);
      $this->db->update('kriteria',$data);
      for($i=0; $i< $this->countParameter($id)->jumlahpara; $i++){
        $this->updateParameter($id, $this->input->post('par'.$i),$i);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
            <i class="fa fa-info-circle mr-3"></i>
            <span>Data kriteria berhasil diedit!</span>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
			      <span aria-hidden="true">×</span>
            </button> </div>');
    }

    public function updatekriteria($id)
    {
      $where = array('kriteria_id' => $id );
      $data = array(
        
        'kriteria' => $this->input->post('kriteria'),
        'bobot' => $this->input->post('bobot'),
        'tren' => $this->input->post('tren'),
        'is_para' => '0',

      );
      $this->db->where($where);
      $this->db->update('kriteria',$data);
      $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
            <i class="fa fa-info-circle mr-3"></i>
            <span>Data kriteria berhasil diedit!</span>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
			<span aria-hidden="true">×</span>
            </button> </div>');
    }

    // DELETE
    function delete_kriteria($id)
    {    
      $this->db->delete('nilai_tbl', array('nilai_kriteria_id' => $id));
      $this->db->delete('kriteria', array('kriteria_id' => $id));
      $this->db->delete('parameter', array('kriteria_id' => $id));
      $this->session->set_flashdata('message', '<div class="alert alert-info fade show" role="alert">
        <i class="fa fa-info-circle mr-3"></i>
        <span>Data kriteria berhasil dihapus!</span>
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
        </button> </div>');
    }
  
    //Fungsi Otomatis create Tabel nilai_tbl//
    private function insertIntoNilai($id)
    {
    $this->db->query("INSERT INTO nilai_tbl(nilai_alternatif_id, nilai_kriteria_id, nilai) SELECT alternatif_id, '$id', 1  FROM alternatif");
        return;
    }

    //Fungsi Otomatis CRUD Parameter//
    private function insertIntoParameter($id, $parameter, $value)
    {
      $data = array(
        'kriteria_id' => $id,
        'nama_parameter' => $parameter,   
        'nilai_parameter' => $value
      );  
      return $this->db->insert('parameter', $data);

    }

    //count kriteria untuk beranda
    public function getCountKriteria(){
        $query = $this->db->query("SELECT COUNT(*) as jumlah_kriteria FROM kriteria");
        return $query->row();
      }
    
    //get kriteria tanpa parameter
    public function get_kriterias(){
      $query = $this->db->query("SELECT *
          FROM kriteria k
          WHERE k.is_para = '0'");
      return $query->result();
    }
    
    //get kriteria with parameter
    public function get_kriteriaswp(){
      $query = $this->db->query("SELECT *
          FROM kriteria k
          WHERE k.is_para = '1'");
      return $query->result();
    }

    public function countParameter($id)
      {     
        $query = $this->db->query("SELECT count(parameter_id) as jumlahpara FROM parameter WHERE kriteria_id = '$id'");
        return $query->row();
      }

    public function getselectedParameter($id)
      {
        $where = array(
          'kriteria_id' => $id
        );

        $query = $this->db->from('parameter')->where($where)->order_by('nilai_parameter', 'ASC')->get();
        //  $query = $this->db->query("SELECT * FROM tbl_parameter WHERE $where ORDER BY kode_kriteria");
        return $query->result();
      }

      private function updateParameter($id,$parameter, $value)
      {
        $where = array(
          'kriteria_id' => $id,
          'nilai_parameter' => $value
        );
        
        $data = array(
          'nama_parameter' => $parameter,   
        );  
        $this->db->where($where);
        return $this->db->update('parameter', $data);

      }
    
    public function getMaxKode(){
      $query = $this->db->query("SELECT (MAX(kriteria_id))+1 as max_id FROM kriteria");
      return $query->row();
    }

    public function getselectedkriteria($id)
    {
      $where = array(
        'kriteria_id' => $id
      );

      $query = $this->db->get_where('kriteria',$where);
      return $query->row();
    }
}