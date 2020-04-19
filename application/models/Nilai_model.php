<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Nilai_model extends CI_Model{
  public function __construct(){
      $this->load->database();
  }

  public function getNilai(){
      $query = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, n.nilai
          FROM nilai_tbl n
          INNER JOIN alternatif a
            ON n.nilai_alternatif_id=a.alternatif_id
          INNER JOIN kriteria k
            ON k.kriteria_id=n.nilai_kriteria_id
          ORDER BY a.alternatif_id, k.kriteria_id");
      $rows = $query->result();
      
      $data = array();
      foreach($rows as $row){
          $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai;
      }

      return $data;
  }

  public function getListParameter()
  {
    $query = $this->db->query("SELECT a.kriteria, b.nama_parameter FROM kriteria as a INNER JOIN parameter as b ON a.kriteria_id = b.kriteria_id");
    return $query->result();
  }

  public function getAlternatif(){
    $this->db->order_by("alternatif_id", "ASC");
    $query = $this->db->get("alternatif");

    return $query->result();
  }

  public function getCountKriteria(){
    $query = $this->db->query("SELECT COUNT(*) as jumlah FROM kriteria");
    return $query->row();
  }

  public function getKriteria()
  {
       $query=$this->db->query("SELECT * FROM kriteria ORDER BY kriteria_id");
       return $query->result();
  }

  public function updateNilai($id, $kriteria, $value)
  {
    //var_dump($id.' == '.$kriteria.'===='.$value);die;


    $where = array('nilai_alternatif_id' => $id, 'nilai_kriteria_id' => $kriteria );
    $data = array(
        'nilai' => $value,
    );
    $this->db->where($where);
    $this->db->update('nilai_tbl',$data);
  }

  public function getMin(){
    $query = $this->db->query("SELECT MIN(nilai) as nilai_minimal FROM nilai_tbl WHERE nilai_kriteria_id = 1");
    return $query->row();
  }

  public function getMinimum(){
    $query = $this->db->query("SELECT MIN (nilai) as nilai_min
        FROM nilai_tbl");
        
    $rows = $query->result();
    
    $data = array();
    foreach($rows as $row){
        $data[$row->alternatif_id][$row->kriteria_id] = $row->nilai_min;
    }

    return $data;
}

public function getNilaikolom(){
  $query = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, n.nilai
      FROM nilai_tbl n
      INNER JOIN alternatif a
        ON n.nilai_alternatif_id=a.alternatif_id
      INNER JOIN kriteria k
        ON k.kriteria_id=n.nilai_kriteria_id
      ORDER BY a.alternatif_id, k.kriteria_id");
  $rows = $query->result();
  
  $data = array();
  foreach($rows as $row){
      $data[$row->kriteria_id][$row->alternatif_id] = $row->nilai;
  }

  

//   $query2 = $this->db->query("SELECT a.alternatif_id, k.kriteria_id, MIN($data.nilai)
//   FROM nilai_tbl n
//   INNER JOIN alternatif a
//     ON n.nilai_alternatif_id=a.alternatif_id
//   INNER JOIN kriteria k
//     ON k.kriteria_id=n.nilai_kriteria_id
//   ORDER BY a.alternatif_id, k.kriteria_id");
// $rows = $query2->result();

// $datamin = array();
//   foreach($rows as $row){
//       $datamin[$row->kriteria_id][$row->alternatif_id] = $row->nilai;
  return $data;


}


public function getMinimums()
{
  $this->db->select('MIN(nilai_tbl.nilai) AS minimum_value');
		$this->db->from('nilai_tbl');
		$this->db->join('kriteria', 'kriteria_id=nilai_kriteria_id');
		$this->db->join('alternatif', 'nilai_alternatif_id=alternatif_id');
		$this->db->group_by('kriteria_id');
		$query = $this->db->get();
		return $query;
$rows = $query->result();

$data = array();
  foreach($rows as $row){
      $data[$row->kriteria_id] = $row->nilai;
  }

  return $data;

}

public function getListForm($id){
  //    $query = $this->db->query("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria,ra.nilai FROM tbl_relasi ra INNER JOIN tbl_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE kode_alternatif='$id' ORDER BY kode_kriteria");
      
  return $this->db->query('SELECT a.nilai_id, a.nilai_kriteria_id, a.nilai_alternatif_id, a.nilai, c.kriteria FROM nilai_tbl as a INNER JOIN kriteria as c  ON a.nilai_kriteria_id=c.kriteria_id WHERE nilai_alternatif_id= "'.$id.'" and c.kriteria_id = a.nilai_kriteria_id ORDER BY nilai_kriteria_id')->result();
    }

    public function getSelectedAlternatif($id){
      $query = $this->db->query("SELECT * FROM alternatif WHERE alternatif_id='$id'");
      return $query->row();
    }

    public function getNilaitabel()
  {
    return $this->db->get('nilai_tbl')->result();
  }

}

